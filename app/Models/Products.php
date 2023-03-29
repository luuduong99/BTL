<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'product_images',
        'product_name',
        'product_color',
        'product_content',
        'product_description',
        'product_price',
        'product_discount',
        'product_ram',
        'product_memory',
        'product_hot',
        'product_cn',
        'product_status',
        'product_alias',
        'category_id',
        'product_cl',
        // 'product_chip',
        // 'product_mh',
        // 'product_cs',
        // 'product_ct',
        // 'product_hdh',
        // 'product_pin',
        // 'product_sim'
    ];

    public function category ()
    {
        return $this->belongsTo('App\Models\Categories', 'category_id');
    }

    public function rating ()
    {
        return $this->hasMany('App\Models\Ratings');
    }

    public function orderDetail ()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }

    public function comment ()
    {
        return $this->hasMany('App\Models\Comments');
    }


    public static function products()
    {
        return Products::orderBy('id')->paginate(10);
    }

    // public function scopeSearch($query)
    // {
    //     if ($key = request()->key) {
    //         $query = $query->where('name', 'like', '%'.$key.'%');
    //     }
    //     return $query;
    // }
    // public static function sort()
    // {
    //     if (isset($_GET['sort_by']))
    //     {
    //         $sort_by = $_GET['sort_by'];
    //         if ($sort_by = 'priceAsc') {
    //             $sort = Products::orderBy('product_price')->paginate(10);
    //         } elseif ($sort_by = 'priceDesc') {
    //             $sort = Products::orderByDesc('product_price')->paginate(10);
    //         } elseif ($sort_by = 'nameAsc') {
    //             $sort = Products::orderBy('product_name')->paginate(10);
    //         } elseif ($sort_by = 'nameDesc') {
    //             $sort = Products::orderByDesc('product_name')->paginate(10);
    //         } else {
    //             $sort = Products::orderBy('id')->paginate(10);
    //         }
    //     }
    // }
    // public static function cats()
    // {
    //     $users = DB::table('categories')->join('products', 'categories.id', '=', 'products.category_id')->get();
    // }

    // public static function store(Request $request)
    // {
    //     if ($request->has('image')) {
    //         $file = $request->image;
    //         $file_name = $file->getClientoriginalName();
    //         $file->move(public_path('upload/products'), $file_name);
    //     }

    //     $request->merge(['image' => $file_name]);
    //     $products = $request->all();
    //     $request->session()->flash('success');
    //     return Products::create($products);
    // }

    // public static function show($id)
    // {
    //     return Products::all()->find($id);
    // }

    // public static function edit($id, Request $request)
    // {
    //     $data = $request->all();
    //     $record = Products::find($id);
    //     $record->name = $data['name'];
    //     $record->parent_id = $data['parent_id'];

    //     $record->save();
    //     $request->session()->flash('update');
    // }

    // public static function remove($id, Request $request)
    // {
    //     $products = Products::all()->find($id);
    //     $request->session()->flash('delete');
    //     return $products->delete();
    // }

    // public static function category()
    // {
    //     return Categories::where('parent_id', '0')->orderByDesc('id')->get();
    // }

    // public static function subCategory()
    // {
    //     return Categories::where('parent_id', '<>', '0')->orderByDesc('id')->get();
    // }
}
