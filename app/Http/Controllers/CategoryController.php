<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        if(auth()->user()->role !== 'Admin'){
            abort(403);
            // echo "Terlarang";
            // return;
        }

        $title = "List Category";
        $category = Category::orderBy('id', 'desc')->paginate(5);
        return view('category.index',[
            'title' => $title,
            'category' => $category,
        ]);
    }

    public function addcategory (Request $request)
    {
        // return dd($request);
        Category::create([
            'name_category' => $request -> name_category,
            'slug'          => Str::slug($request -> name_category, '-')
        ]);
        return redirect()->back()-> with('success','Data berhasil ditambahkan');
    }

    public function updateCategory (Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name_category' => $request->name_category,
            'slug'          => Str::slug($request -> name_category, '-')
        ]);
        return redirect() -> back() -> with('success','Data berhasil diedit');
    }

    public function deleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        return redirect() -> back() -> with('success','Data berhasil dihapus');
    }
}
