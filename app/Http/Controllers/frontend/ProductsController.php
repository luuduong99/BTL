<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Customers;
use App\Models\Products;
use App\Models\Ratings;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function detail($id)
    {
        $category = Categories::all();
        $product = Products::all();
        $rate1 = Ratings::where('product_id', $id)->where('rating', '1')->count();
        $rate2 = Ratings::where('product_id', $id)->where('rating', '2')->count();
        $rate3 = Ratings::where('product_id', $id)->where('rating', '3')->count();
        $rate4 = Ratings::where('product_id', $id)->where('rating', '4')->count();
        $rate5 = Ratings::where('product_id', $id)->where('rating', '5')->count();
        $ratingAvg = Ratings::where('product_id', $id)->avg('rating');
        $ratingCount = Ratings::where('product_id', $id)->count();
        $prod = Products::find($id);
        $comment = Comments::all()->where('status', '1');
        $commentCount = Comments::all()->where('product_id', $id)->count();
        $cus = Customers::all();

        return view('frontend.main.detail', compact('category', 'prod', 'ratingAvg', 'ratingCount', 'comment', 'commentCount', 'product', 'rate1', 'rate2', 'rate3', 'rate4', 'rate5', 'cus'));
    }

    public function comment(Request $request)
    {
        $comment = new Comments();
        $comment->product_id = $request->input('product_id');
        $comment->product_name = $request->input('product_name');
        $comment->customer_id = $request->input('customer_id');
        $comment->customer_acc = $request->input('customer_acc');
        $comment->content = $request->input('content');
        $comment->reply_id = $request->input('reply_id');
        $comment->status = "1";
        $comment->save();
        return redirect()->back();
    }
}
