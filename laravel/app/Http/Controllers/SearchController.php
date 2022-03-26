<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use \App\Models\Main_category;
use \App\Models\Sub_category;

class SearchController extends Controller
{
    public function livesearch(Request $request){
        $q=strtolower($request->q);
        if(strlen($q)>0){
            $hint=array();
            foreach(Product::all() as $product){
                if(str_contains(strtolower($product->name),$q)){
                    array_push($hint,$product->name);
                }
            }
            foreach(Main_category::all() as $main_category){
                if(str_contains(strtolower($main_category->descripton),$q)){
                    array_push($hint,$main_category->description);
                }
            }
            foreach(Sub_category::all() as $sub_category){
                if(str_contains(strtolower($sub_category->description),$q)){
                    array_push($hint,$sub_category->description);
                }
            }
        }

        return response()->json(['result'=>$hint]);
    }



}
