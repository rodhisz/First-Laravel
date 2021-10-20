<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $title = "Beranda - IDN";
        $product = Product::all();
        return view('landing.yield.index', [
            'product' => $product,
            'title' => $title,
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
}