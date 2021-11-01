<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    public function index()
    {
        $title = "Beranda - IDN";
        $product = Product::take(8)->orderBy('id', 'desc')->get();
        $category = category::all();
        return view('landing.yield.index', [
            'product' => $product,
            'title' => $title,
            'category' => $category
        ]);
    }

    public function detailProduct($slug)
    {
        $title = "Detail Product";
        $product = Product::where('slug', $slug)->first();
        return view('landing.yield.detail',[
            'product'   => $product,
            'title'     => $title,
        ]);
    }

    public function perCategory($slug)
    {
        $nm_kt = category::where('slug', $slug)->first();
        $title = "Category $nm_kt->name_category";
        $product = product::where('category_id', $nm_kt->id)->get();
        return view('landing.yield.per-category', compact('product','title','nm_kt'));
    }

    public function allproduct()
    {
        $title = "All Product";
        $product = product::orderBy('id', 'desc')->get();
        $category = category::all();
        return view('landing.yield.allproduct',[
            'product' => $product,
            'title'   => $title,
            'category' => $category,
        ]);
    }

    public function searchProduct(Request $request)
    {
        $title = "Search Product";
        $keyword = $request->search;
        $product = product::where('name_product','like',"%". $keyword . "%")->get();
        return view('landing.yield.search-product',[
            'product' => $product,
            'title'   => $title,
            'keyword'   => $keyword,
        ]);
    }
}
