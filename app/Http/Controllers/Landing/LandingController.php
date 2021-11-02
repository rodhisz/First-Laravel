<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{

    public function index()
    {
        $order= Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        if($order){
            $jumlah = OrderDetail::where('order_id', $order->id)->count();
        }
        $title = "Beranda - IDN";
        $product = Product::take(8)->orderBy('id', 'desc')->get();
        $category = category::all();
        return view('landing.yield.index', [
            'product' => $product,
            'title' => $title,
            'category' => $category,
            'jumlah'    => $jumlah
        ]);
    }

    public function detailProduct($slug)
    {
        $order= Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        if($order){
            $jumlah = OrderDetail::where('order_id', $order->id)->count();
        }
        $title = "Detail Product";
        $product = Product::where('slug', $slug)->first();
        return view('landing.yield.detail',[
            'product'   => $product,
            'title'     => $title,
            'jumlah'    => $jumlah
        ]);
    }

    public function perCategory($slug)
    {
        $order= Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        if($order){
            $jumlah = OrderDetail::where('order_id', $order->id)->count();
        }
        $nm_kt = category::where('slug', $slug)->first();
        $title = "Category $nm_kt->name_category";
        $product = product::where('category_id', $nm_kt->id)->get();
        return view('landing.yield.per-category', compact('product','title','nm_kt','jumlah'));
    }

    public function allproduct()
    {
        $order= Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        if($order){
            $jumlah = OrderDetail::where('order_id', $order->id)->count();
        }
        $title = "All Product";
        $product = product::orderBy('id', 'desc')->get();
        $category = category::all();
        return view('landing.yield.allproduct',[
            'product' => $product,
            'title'   => $title,
            'category' => $category,
            'jumlah'    => $jumlah
        ]);
    }

    public function searchProduct(Request $request)
    {
        $order= Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        if($order){
            $jumlah = OrderDetail::where('order_id', $order->id)->count();
        }
        $title = "Search Product";
        $keyword = $request->search;
        $product = product::where('name_product','like',"%". $keyword . "%")->get();
        return view('landing.yield.search-product',[
            'product' => $product,
            'title'   => $title,
            'keyword'   => $keyword,
            'jumlah'    => $jumlah
        ]);
    }

    public function addtoCart(Request $request)
    {
        // return dd($request);

        $price_detail = $request->price * $request->quantity;

        //cek user punya pesanan utama
        $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

        //save atau update pesanan
        if(empty($order)){
            Order::create([
                'user_id'      => Auth::user()->id,
                'status'       => 0,
                'order_code'   => "Null",
                'total_price'  => $price_detail,
                'unique_code'  => mt_rand(100,999)
            ]);
            $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
            $char_code = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $order->order_code = substr(str_shuffle($char_code),0 ,12);
            $order->update();
        }else{
            $order->total_price = $order->total_price + $price_detail;
            $order->update();
        }

        //menyimpan data detail pesanan
        if(empty($request->note)){
            OrderDetail::create([
                'product_id'    => $request->id,
                'order_id'      => $order->id,
                'total_order'   => $request->quantity,
                'price'         => $price_detail,
                'note'          => "Catatan Kosong",
            ]);

            return redirect()->back()->with('success', 'Berhasil Menambahkan Produk!');
        }
        else{
            OrderDetail::create([
                'product_id'    => $request->id,
                'order_id'      => $order->id,
                'total_order'   => $request->quantity,
                'price'         => $price_detail,
                'note'          => $request->note,
            ]);

            return redirect()->back()->with('success', 'Berhasil Menambahkan Produk!');
        }
    }

    public function cart()
    {
        $i = 1;
        $order= Order::where('user_id', Auth::user()->id)->where('status',0)->first();

        if($order){
            $jumlah = OrderDetail::where('order_id', $order->id)->count();
        }
        $title = "Cart";

        if($order){
            $detail = OrderDetail::where('order_id',$order->id)->get();
        }
        return view('landing.yield.cart', compact('jumlah','title','detail','i'));
    }
}
