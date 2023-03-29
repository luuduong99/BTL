<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\OrderDetail;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ratings;
use App\Models\Customers;

class HomeController extends Controller
{
    public function index()
    {
        $hotProduct = Products::where('product_hot', '1')->orderByDesc('id')->offset(0)->take(6)->get();
        $category = Categories::all();
        $product = Products::all();
        $rate = Ratings::all();
        return view('frontend.main.product', compact('hotProduct', 'category', 'product', 'rate'));
    }

    // public function autoCompleteAjax(Request $request)
    // {
    //     $data = $request->all();
    //     if ($data['strKey']) {
    //         $product = Products::where('product_status', 1)->where('product_name', 'LIKE', '%'.$data['strKey'].'%')->get();
    //         $output = '<ul>';
    //         foreach ($product as $key => $val) {
    //             $output .= '
    //                 <li><img src='."assets/upload/products/{$val->product_images}".'><a href='."{{ route('front.detail', $val->id) }}".'>'.$val->product_name.'</a></li>
    //             ';
    //         }
    //         $output .= '</ul>';
    //         echo $output;
    //     }
    // }

    public function searchName()
    {
        if (isset($_GET['key'])) {
            $searchKey = $_GET['key'];
            $category = Categories::all();

            $search = Products::where('product_status', 1)->where('product_name', 'LIKE', '%'.$searchKey.'%')->get();

            return view('frontend.main.search', compact('search', 'searchKey', 'category'));
        }
    }

    public function order()
    {
        $category = Categories::all();
        $order = Orders::all();
        $detail = OrderDetail::all();
        return view('frontend.main.order', compact('category', 'order', 'detail'));
    }

}
