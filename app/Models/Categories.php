<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Categories extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "categories";
    protected $primerikey = 'id';
    protected $fillable = [
        'id',
        'category_name',
        'category_alias',
        'category_status',
        'p_category_id',
    ];

    public function product ()
    {
        return $this->hasMany('App\Models\Products');
    }

    public static function categories()
    {
            return Categories::orderBy('id')->paginate(10);
    }

    // public static function store(Request $request)
    // {
    //     $categories = $request->all();
    //     $request->session()->flash('success');
    //     return Categories::create($categories);
    // }

    // public static function show($id)
    // {
    //     return Categories::find($id);
    // }

    public static function edit($id, Request $request)
    {
        $data = $request->all();
        $record = Categories::find($id);
        $record->category_name = $data['category_name'];
        $record->category_alias = $data['category_alias'];
        $record->category_status = $data['category_status'];
        $record->p_category_id = $data['p_category_id'];

        $record->save();
        $request->session()->flash('update');
    }

    public static function remove($id, Request $request)
    {
        $categories = Categories::find($id);
        $request->session()->flash('delete');
        return $categories->delete();
    }



}
