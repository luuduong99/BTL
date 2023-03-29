<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    // public function search(){

    //     $category = Categories::all();
    //     $fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : 0;
	// 	$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : 0;

    //     $search = DB::select("select * from products where product_price >= $fromPrice and product_price <= $toPrice order by id desc");
    //     return view('frontend.main.search', compact('search', 'category'));
    // }
    // public function searchName($id)
    // {
    //     $category = Categories::all();
    //     $cat = Categories::find($id);
    //     $product = Products::all();
    //     $key = isset($_GET["key"]) ? $_GET["key"] : "";
    //     $search = DB::select("select * from products where name like '%$key%' order by id desc ");
    //     return view('frontend.main.search', compact('category', 'cat', 'product', 'search'));
    // }

    // public function search()
    // {
    //     $key = isset($_GET["key"]) ? $_GET["key"] : "";
    //     $data = DB::select("select * from products where where name like '%$key%' ");
    //     $strResult = "";
	// 		foreach($data as $rows){
	// 			$strResult = $strResult."<li><img src='assets/upload/products/{{ $rows->photo }}'> <a href='{{ route('front.detail', $rows->id) }}'>{{ $rows->name }}</a></li>";
	// 		}
	// 		echo $strResult;
    // }
}
