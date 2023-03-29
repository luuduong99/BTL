<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        if (session()->has('user_id')) {
            $category = Categories::all();
            $data = Products::products();

            $cn = isset($_GET["cn"]) ? $_GET["cn"] : 3;
            $searchCn = Products::where('product_cn', $cn)->orderBy('id')->paginate(10);

            $searchKey = isset($_GET['key']) ? $_GET['key'] : "";
            $search = Products::where('product_name', 'LIKE', '%'.$searchKey.'%')->paginate(20);

            return view('admin.product.products', compact('data', 'category', 'cn', 'searchCn', 'search', 'searchKey'));

            //$searchCn = DB::select("select * from products where product_cn = $cn order by id desc");
        }
        return redirect()->route('admin.login');
        // $category = Categories::all();
        // $data = Products::products();
        // return view('admin.product.products', compact('data', 'category'));
    }

    public function create()
    {
        $category = Categories::all();
        return view('admin.product.create', compact('category'));
    }

    public function store(Request $request)
    {
        $product = new Products();
        $product->product_name = $request->input('product_name');
        $product->product_hot = $request->input('product_hot');
        $product->product_color = $request->input('product_color');
        $product->product_price = $request->input('product_price');
        $product->product_discount = $request->input('product_discount');
        $product->product_quantity = $request->input('product_quantity');
        $product->product_ram = $request->input('product_ram');
        $product->product_content = $request->input('product_content');
        $product->product_description = $request->input('product_description');
        // $product->product_chip = $request->input('product_chip');
        // $product->product_mh = $request->input('product_mh');
        // $product->product_cs = $request->input('product_cs');
        // $product->product_ct = $request->input('product_ct');
        // $product->product_hdh = $request->input('product_hdh');
        // $product->product_pin = $request->input('product_pin');
        // $product->product_sim = $request->input('product_sim');
        $product->product_cn = $request->input('product_cn');
        $product->product_status = $request->input('product_status');
        $product->product_alias = $request->input('product_alias');
        $product->category_id = $request->input('category_id');
        if ($request->hasFile('product_images')) {
            $file = $request->file('product_images');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('upload/products', $filename);
            $product->product_images = $filename;
        }
        $product->save();

        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $category = Categories::all();
        $product_edit = Products::find($id);
        return view('admin.product.edit', compact('category', 'product_edit'));
    }

    public function edit(Request $request, $id)
    {
        $image = $request->product_images;
        $product_edit = Products::find($id);
        if ($image) {
            if(isset($product_edit->product_images) && file_exists('upload/products/'.$product_edit->product_images) && $product_edit->product_images != ""){
                unlink('upload/products/'.$product_edit->product_images);
            }
            $product_edit->product_name = $request->input('product_name');
            $product_edit->product_hot = $request->input('product_hot');
            $product_edit->product_color = $request->input('product_color');
            $product_edit->product_price = $request->input('product_price');
            $product_edit->product_discount = $request->input('product_discount');
            $product_edit->product_quantity = $request->input('product_quantity');
            $product_edit->product_ram = $request->input('product_ram');
            $product_edit->product_content = $request->input('product_content');
            $product_edit->product_description = $request->input('product_description');
            $product_edit->product_memory = $request->input('product_memory');
            $product_edit->product_chip = $request->input('product_chip');
            // $product_edit->product_mh = $request->input('product_mh');
            // $product_edit->product_cs = $request->input('product_cs');
            // $product_edit->product_ct = $request->input('product_ct');
            // $product_edit->product_hdh = $request->input('product_hdh');
            // $product_edit->product_pin = $request->input('product_pin');
            // $product_edit->product_sim = $request->input('product_sim');
            $product_edit->product_cn = $request->input('product_cn');
            $product_edit->product_status = $request->input('product_status');
            $product_edit->product_alias = $request->input('product_alias');
            $product_edit->category_id = $request->input('category_id');
            if ($request->hasFile('product_images')) {
                $file = $request->file('product_images');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('upload/products', $filename);
                $product_edit->product_images = $filename;
            }
            $product_edit->save();
        } else {
            $product_edit->product_name = $request->input('product_name');
            $product_edit->product_hot = $request->input('product_hot');
            $product_edit->product_color = $request->input('product_color');
            $product_edit->product_price = $request->input('product_price');
            $product_edit->product_discount = $request->input('product_discount');
            $product_edit->product_quantity = $request->input('product_quantity');
            $product_edit->product_ram = $request->input('product_ram');
            $product_edit->product_content = $request->input('product_content');
            $product_edit->product_description = $request->input('product_description');
            $product_edit->product_memory = $request->input('product_memory');
            $product_edit->product_chip = $request->input('product_chip');
            // $product_edit->product_mh = $request->input('product_mh');
            // $product_edit->product_cs = $request->input('product_cs');
            // $product_edit->product_ct = $request->input('product_ct');
            // $product_edit->product_hdh = $request->input('product_hdh');
            // $product_edit->product_pin = $request->input('product_pin');
            // $product_edit->product_sim = $request->input('product_sim');
            $product_edit->product_cn = $request->input('product_cn');
            $product_edit->product_status = $request->input('product_status');
            $product_edit->product_alias = $request->input('product_alias');
            $product_edit->category_id = $request->input('category_id');
            if ($request->hasFile('product_images')) {
                $file = $request->file('product_images');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('upload/products', $filename);
                $product_edit->product_images = $filename;
            }
            $product_edit->save();
        }

        return redirect()->route('products.index');
    }

    public function destroy(Request $request, $id)
    {
        $product_delete = Products::find($id);
        if(isset($product_delete->product_images) && file_exists('upload/products/'.$product_delete->product_images) && $product_delete->product_images != "") {
                unlink('upload/products/'.$product_delete->product_images);
        }
        $product_delete->delete();
        return redirect()->route('products.index');
    }
}
