<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Customers;
use App\Models\Ratings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        if (session()->has('user_id')) {
            return view('admin.home');
        }
        return redirect()->route('admin.login');
        // return view('admin.layout');
    }

    public function customer() {
        if (session()->has('user_id')) {
            $data = Customers::orderBy('id')->paginate(5);
            return view("admin.customers.customers", compact('data'));
        }
        return redirect()->route('admin.login');
    }

    public function destroyCus(Request $request, $id)
    {
        $cus = Customers::all()->find($id);
        $cus->delete();
        return redirect()->route('home.customer');
    }

    public function rating() {
        if (session()->has('user_id')) {
            $data = Ratings::orderBy('id')->paginate(5);
            return view("admin.rating.rating", compact('data'));
        }
        return redirect()->route('admin.login');
    }

    public function comment() {
        if (session()->has('user_id')) {
            $data = Comments::orderBy('id')->paginate(5);
            return view("admin.comment.comment", compact('data'));
        }
        return redirect()->route('admin.login');
    }
}
