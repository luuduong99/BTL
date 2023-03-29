<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Categories;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class AccountController extends Controller
{
    public function login()
    {
        $category = Categories::all();
        return view('frontend.account.account', compact('category'));
    }

    public function checkLogin(Request $request)
    {
        $customer_acc = $request->customer_acc;
        $customer_password = md5($request->customer_password);

        $result = DB::table('customers')->where('customer_acc', $customer_acc)->where('customer_password', $customer_password)->first();
        if ($result && $result->customer_status == 1) {
            $request->session()->put('customer_id', $result->id);
            $request->session()->put('customer_acc', $result->customer_acc);
            $request->session()->put('customer_name', $result->customer_name);
            $request->session()->put('customer_email', $result->customer_email);
            $request->session()->put('customer_address', $result->customer_address);
            $request->session()->put('customer_phone', $result->customer_phone);
            $request->session()->put('customer_image', $result->customer_image);
            $request->session()->put('customer_gender', $result->customer_gender);
            return redirect()->route('front.home');
        } elseif ($result && $result->customer_status == 0) {
            return redirect()->route('front.login')->with('erro', 'Tài khoản của bạn chưa dc kích hoạt');
        } else {
            return redirect()->route('front.login')->with('error', 'Tài khoản hoặc mật khẩu không đúng vui lòng kiểm tra lại');
        }
    }

    public function res()
    {
        $category = Categories::all();
        return view('frontend.account.resgister', compact('category'));
    }

    public function resgister(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'max:255'],
            'customer_acc' => ['required', 'max:255', 'regex:/^\S*$/u'],
            'customer_email' => ['required', 'email', 'unique:customers,customer_email', 'max:100'],
            'customer_password' => ['required', 'max:255', 'regex:/^\S*$/u'],
            'password_comfirm' => ['required_if:password,!null', 'same:password'],
            'customer_address' => ['max:255'],
            'customer_phone' => ['max:15, integer']
        ]);

        if(!$validated){
            $data = $request->all();
            $token = strtoupper(Str::random());
            $data['customer_token'] = $token;
            $data['customer_password'] = md5($request->customer_password);
            if ($request->hasFile('customer_image')) {
                $file = $request->file('customer_image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('upload/customers', $filename);
                $data['customer_image'] = $filename;
            } else {
                $data['customer_image'] = "";
            }
            if ($customer = Customers::create($data)) {
                Mail::send('frontend.mail.active_account', compact('customer'), function($email) use ($customer)
                {
                    $email->subject('Shop Dien Thoai BTL cua Luu Dinh Duong - Xac Nhan Tai Khoan');
                    $email->to($customer->customer_email, $customer->customer_name);
                    $email->from($customer->customer_email);
                });
                return view('frontend.mail.active');
            } else {
                return redirect()->route('front.res')->with('thatbai', 'Đăng kí không thành công');
            }
        }


    }

    public function actived(Customers $customer, $token)
    {
        if($customer->customer_token == $token) {
            $customer->customer_status = "1";
            $customer->customer_token = NULL;
            $customer->save();
            return redirect()->route('front.login');
        } else {
            return redirect()->route('front.res')->with('thatbai', 'dk ko thanh cong');
        }
    }

    public function profile($id)
    {
        $category = Categories::all();
        $customer = Customers::find($id);
        return view('frontend.account.profile', compact('category', 'customer'));
    }

    public function updateProfile($id, Request $request)
    {
        $customer_image = $request->customer_image;
        $customer_edit = Customers::find($id);
        if ($customer_image) {
            if(isset($customer_edit->customer_image) && file_exists('upload/products/'.$customer_edit->customer_image) && $customer_edit->customer_image != ""){
                unlink('upload/products/'.$customer_edit->customer_image);
            }
            $customer_edit->customer_email = $request->input('customer_email');
            $customer_edit->customer_name = $request->input('customer_name');
            $customer_edit->customer_phone = $request->input('customer_phone');
            $customer_edit->customer_address = $request->input('customer_address');
            $customer_edit->customer_gender = $request->input('customer_gender');
            if ($request->hasFile('customer_image')) {
                $file = $request->file('customer_image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('upload/customers', $filename);
                $customer_edit->customer_image = $filename;
            }
            $customer_edit->save();
        } else {
            $customer_edit->customer_email = $request->input('customer_email');
            $customer_edit->customer_name = $request->input('customer_name');
            $customer_edit->customer_phone = $request->input('customer_phone');
            $customer_edit->customer_address = $request->input('customer_address');
            $customer_edit->customer_gender = $request->input('customer_gender');
            if ($request->hasFile('customer_image')) {
                $file = $request->file('customer_image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('upload/products', $filename);
                $customer_edit->customer_image = $filename;
            } else {
                $customer_edit->customer_image = "";
            }
            $customer_edit->save();
        }

        return redirect()->back();
    }

    public function updatePassword($id, Request $request)
    {
        $customer_edit = Customers::find($id);
        $customer_password = md5($request->customer_password);
        $result = DB::table('customers')->where('customer_password', $customer_password)->first();
        if ($result) {
            $customer_edit->customer_password = md5($request->input('customer_password_new'));
            $customer_edit->save();
            return redirect()->back()->with('dung', 'thay doi mat khau thanh cong');
        } else {
            return redirect()->back()->with('sai', 'mat khau ko dung');
        }
    }

    public function forget()
    {
        $category = Categories::all();
        return view('frontend.account.forget', compact('category'));
    }

    public function recover(Request $request)
    {
        $data = $request->all();
        // $now = Carbon::now('Asia/Ha_Chi_Minh')->format('d-m-y');
        $title_mail = "Shop Dien Thoai BTL cua Luu Dinh Duong";
        $customer = Customers::where('customer_email',$data['email_account'])->first();
        if (!$customer) {
            return redirect()->back()->with('chuadk', 'Email không tồn tại');
        } else {
            $token = strtoupper(Str::random());
            $cus = Customers::find($customer->id);
            $cus->customer_token = $token;
            $cus->save();

            //send email
            $to_email = $data['email_account'];
            $link_reset_password = url('frontend/update-new-pass?email='.$to_email.'&token='.$token);
            $data = array("name" => $title_mail, "body" => $link_reset_password, "email" => $data['email_account']);

            Mail::send('frontend.mail.forget_pass', ['data'=>$data], function($message) use ($title_mail, $data)
            {
                $message->to($data['email'])->subject($title_mail);
                $message->from($data['email'], $title_mail);
            });
            return redirect()->back()->with('suc', 'Gửi email xác nhận thành công, vui lòng kiểm tra lại mail');
        }
    }

    public function updateNewPass()
    {
        $category = Categories::all();
        return view('frontend.mail.new_pass', compact('category'));
    }

    public function resetNewPass(Request $request)
    {
        $data = $request->all();
        $token_random = strtoupper(Str::random());
        $customer = Customers::where('customer_email',$data['email'])->where('customer_token',$data['token'])->first();
        if ($customer) {
            $cus = Customers::find($customer->id);
            $cus->customer_password = md5($request->input('password_account'));
            $cus->customer_token = $token_random;
            $cus->save();

            return redirect()->route('front.forget')->with('dung', 'Mat khau da dc cap nhat');
        } else {
            return redirect()->route('front.forget')->with('sai', 'Mat khau chua dc cap nhat');
        }
    }

    public function logout()
    {
        if (session()->has('customer_id')) {
            session()->pull('customer_id');
        }
        return redirect()->route('front.home');
    }

}
