<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        if (session()->has('user_id')) {
            $data = Categories::categories();
            return view('admin.categories.categories', compact('data'));
        }
        return redirect()->route('admin.login');
        // $data = Categories::categories();
        // return view('admin.categories.categories', compact('data'));
    }
    public function create()
    {
        $category = Categories::all();
        return view('admin.categories.create', compact('category'));
    }

    public function store(Request $request)
    {
        $category = $request->all();
        Categories::create($category);

        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $category = Categories::all();
        $category_edit = Categories::find($id);
        return view('admin.categories.edit', compact('category', 'category_edit'));
    }

    public function edit(Request $request, $id)
    {
        Categories::edit($id, $request);
        return redirect()->route('categories.index');
    }

    public function destroy(Request $request, $id)
    {
        Categories::remove($id, $request);
        return redirect()->route('categories.index');
    }
}
