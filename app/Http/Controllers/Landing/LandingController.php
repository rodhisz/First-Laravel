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
        $title = "Beranda - IDN";
        $product = Product::take(8)->orderBy('id', 'desc')->get();
        $category = category::all();
        return view('landing.yield.index', [
            'product' => $product,
            'title' => $title,
            'category' => $category,
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
        $title = "Cart";

        $detail = [];
        $order= Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        if($order){
            $detail = OrderDetail::where('order_id',$order->id)->get();
        }
        return view('landing.yield.cart', compact('title','detail','i','order'));
    }

    public function cartDelete($id)
    {
        $detail = OrderDetail::findOrFail($id);
        $product = Product::where('id', $detail->product_id)->first();

        if(!empty($detail)){
            $order = Order::where('id', $detail->order_id)->first();
            $jumlah_pesanan_detail = OrderDetail::where('order_id', $order->id)->count();
            if ($jumlah_pesanan_detail == 1) {
                $order->delete();
            } else {
                $order->total_price = $order->total_price - $detail->price;
                $order->update();
            }
            $detail->delete();
        }

        return redirect()->back()->with('success', "Berhasil Menghapus Produk $product->name_product Dari Keranjang!");
    }

    public function checkout()
    {
        $order= Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        $user = Auth::user();
        return view('landing.yield.checkout',compact('order','user'));
    }

    public function updateAddress(Request $request)
    {
        if (Auth::user()) {
            // dd($request);
        $user = User::where('id',$request->id)->first();
        $user -> address = $request->address;
        $user -> update();

        $order = Order::where('user_id',Auth::user()->id)->where('status', 0)->first();
        $order->status = 1;
        $order->update();
        }
        return redirect()->route('history');
    }

    public function history()
    {
        $i = 1;
        //Nyari user yang punya pesanan berdasarkan ID
        $order = Order::where('user_id', Auth::user()->id)->where('status', 1, 2)->get();
        if ($order)
        {
            $order = Order::where('user_id', Auth::user()->id)->get();
        }

        return view('landing.yield.history', compact('order','i'));
    }
}
