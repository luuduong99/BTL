<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Customers;
use App\Models\Products;
use App\Models\Ratings;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function cate($id)
    {
        $category = Categories::all();
        $cat = Categories::find($id);
        $product = Products::all();
        $ratingAvg = Ratings::where('product_id', $id)->avg('rating');

        $sqlOrder = "";
        $order = isset($_GET["sort_by"]) ? $_GET["sort_by"] : "";
        switch ($order) {
            case 'priceAsc':
                $sqlOrder = "order by product_price asc";
                break;
            case 'priceDesc':
                $sqlOrder = "order by product_price desc";
                break;
            case 'nameAsc':
                $sqlOrder = "order by product_name asc";
                break;
            case 'nameDesc':
                $sqlOrder = "order by product_name desc";
                break;
            default:
                $sqlOrder = "order by id desc";
                break;
        }
        $sort = DB::select("select * from products $sqlOrder");

        $fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : 0;
		$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : 0;

        $price = DB::select("select * from products where product_price >= $fromPrice and product_price <= $toPrice order by id desc");

        $ram = isset($_GET["ram"]) ? $_GET["ram"] : 0;

        $searchRam = DB::select("select * from products where product_ram = $ram  order by id desc");

        $memory = isset($_GET["memory"]) ? $_GET["memory"] : 0;

        $searchMemory = DB::select("select * from products where product_memory = $memory  order by id desc");

        $cn = isset($_GET["cn"]) ? $_GET["cn"] : 3;

        $searchCn = DB::select("select * from products where product_cn = $cn order by id desc");

        return view('frontend.main.category', compact('category', 'cat', 'sort', 'product', 'price', 'fromPrice', 'toPrice', 'order', 'ratingAvg', 'searchRam', 'ram', 'memory', 'searchMemory', 'cn', 'searchCn'));
    }
}
