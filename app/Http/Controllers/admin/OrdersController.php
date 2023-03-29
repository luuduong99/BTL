<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\OrderDetail;
use App\Models\Orders;
use App\Helper\CartHelper;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index()
    {
        if (session()->has('user_id')) {
            $cus = Customers::all();
            $order = Orders::orderBy('id', 'desc')->paginate(5);
            return view('admin.order.order', compact('cus', 'order'));
        }
        return redirect()->route('admin.login');
        // $cus = Customers::all();
        // $order = Orders::all();
        // return view('admin.order.order', compact('cus', 'order'));
    }

    public function orderDetail($id)
    {
        $cus = Customers::all();
        $order = Orders::find($id);
        $detail = OrderDetail::all();
        return view('admin.order.orderdetail', compact('cus', 'order', 'detail'));
    }


    public function delivery($id, CartHelper $cart){
        $or = OrderDetail::where('order_id', $id)->get();
        foreach ($or as $item) {
            $pro = Products::where('id', $item->product_id)->first();

            $product_edit = Products::find($item->product_id);
            $product_edit->product_quantity = $pro->product_quantity - $item->quantity;
            $product_edit->save();
        }
        $order = Orders::find($id);
        $order->order_status = "1";
        $order->save();
        return redirect()->back();
	}
    public function delivery1($id){
        $or = OrderDetail::where('order_id', $id)->get();
        foreach ($or as $item) {
            $pro = Products::where('id', $item->product_id)->first();

            $product_edit = Products::find($item->product_id);
            $product_edit->product_cl = $pro->product_cl + $item->quantity;
            $product_edit->save();
        }

        $order = Orders::find($id);
        $order->order_status = "2";
        $order->save();
        return redirect()->back();
	}
}
