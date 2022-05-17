<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\User;
use App\Models\Webpage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FarmerController extends Controller
{
    public function createAllFarmer()
    {
        $farmers = Farmer::get();
        return view('farmer.farmers', ['farmers' => $farmers]);
    }
    public function createOneFarmer($id)
    {
        $farmer = User::find($id);
        return view('farmer.farmer', ['user' => $farmer]);
    }

    public function createEditWebpage()
    {
        $userId = auth()->id();
        $user = User::find($userId);
        if ($user->farmer == null) {
            return redirect('/');
        }
        $webpage = $user->farmer->webpage;
        return view('farmer.editWebpage', ['webpage' => $webpage]);
    }

    public function storeEditWebpage(Request $request)
    {
        $userId = auth()->id();
        $user = User::find($userId);
        if ($user->farmer == null) {
            return redirect(route('create.login'));
        }

        $webpageData = $request->validate([
            'webpageId' => [],
            'title' => ['min:3', 'max:255'],
            'description' => ['min:3', 'max:255'],
            'webpage_image' => ['image'],
            'webpage_url' => ['min:3', 'max:255'],
        ]);

        $imagePath = Webpage::find($webpageData['webpageId'])->image;
        if (isset($webpageData['webpage_image'])) {
            $path = 'pictures/webpages';
            $imagePath = Storage::disk('public')->put($path, $webpageData['webpage_image']);
        }

        Webpage::updateOrCreate(
            [
                'id' => $webpageData['webpageId'],
            ],
            [
                'title' => $webpageData['title'],
                'description' => $webpageData['description'],
                'image' => $imagePath,
                'webpage_url' => $webpageData['webpage_url'],
            ]
        );

        return redirect('/farmer/' . $userId);
    }
}
