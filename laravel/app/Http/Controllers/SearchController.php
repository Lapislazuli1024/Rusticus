<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use \App\Models\Main_category;
use \App\Models\Sub_category;

class SearchController extends Controller
{
    public function livesearch(Request $request)
    {
        $q = strtolower($request->q);
        if (strlen($q) > 0) {
            $hint = array();
            foreach (Product::all() as $product) {
                if (str_contains(strtolower($product->name), $q)) {
                    array_push($hint, $product->name);
                }
            }
            foreach (Main_category::all() as $main_category) {
                if (str_contains(strtolower($main_category->description), $q)) {
                    array_push($hint, $main_category->description);
                }
            }
            foreach (Sub_category::all() as $sub_category) {
                if (str_contains(strtolower($sub_category->description), $q)) {
                    array_push($hint, $sub_category->description);
                }
            }
        }

        return response()->json(['result' => $hint]);
    }

    public function index(Request $request)
    {
        $input = strtolower($request->searchinput);
        if (strlen($input) > 0) {
            $hint = array();
            foreach (Product::all() as $product) {
                if (str_contains(strtolower($product->name), $input)) {
                    array_push($hint, $product);
                }
            }
            foreach (Main_category::all() as $main_category) {
                if (str_contains(strtolower($main_category->description), $input)) {
                    $m_subcategories = Main_category::find($main_category->id)->sub_category;
                    foreach ($m_subcategories as $m_subcategory) {
                        foreach ($m_subcategory->product as $product) {
                            array_push($hint, $product);
                        }
                    }
                }
            }
            foreach (Sub_category::all() as $sub_category) {
                if (str_contains(strtolower($sub_category->description), $input)) {
                    foreach ($sub_category->product as $sproduct)
                        array_push($hint, $sproduct);
                }
            }
        }

        return view('search.search', [
            'result' => $hint,
            'search' => $input
        ]);
    }


}
