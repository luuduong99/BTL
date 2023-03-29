<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ratings;

class RatingsController extends Controller
{
    public function rating(Request $request)
    {

        $rate = Ratings::where($request->only('product_id', 'customer_id'))->first();
        if (!$rate) {
            Ratings::create($request->only('rating', 'product_id', 'customer_id'));
        } else {
            Ratings::where($request->only('product_id', 'customer_id'))->update($request->only('rating'));
        }
        return redirect()->back();
    }
}
