<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use App\Helper\CartHelper;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Ratings;
use App\Models\Categories;

use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cart()
    {
        $category = Categories::all();
        return view('frontend.main.cart', compact('category'));
    }

    public function add(CartHelper $cart, $id)
    {
        $product = Products::find($id);
        $cart->add($product);
        return redirect()->back();
    }

    public function remove(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return redirect()->back();
    }

    public function update(CartHelper $cart, $id, Request $request)
    {
        // $quantity = request()->quantity ? request()->quantity : 1;
        $quantity = ($request->quantity && $request->quantity) > 0 ? floor($request->quantity) : 1;
        $cart->update($id, $quantity);
        return redirect()->back();
    }

    public function clear(CartHelper $cart)
    {
        $cart->clear();
        return redirect()->back();
    }

}
