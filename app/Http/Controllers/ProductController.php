<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role !== 'Admin'){
            abort(403);
            // echo "Terlarang";
            // return;
        }

        $i = 1;
        $title = "Product List";
        $product = Product::all();
        return view('product.index',[
            'title' => $title,
            'product' => $product,
            'i' => $i
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request -> file('image'))){
            Product::create([
                'name_product' => $request->name_product,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'weight' => $request->weight,
            ]);
            return redirect()->route('product.index');
        }
        else{
            Product::create([
                'name_product' => $request->name_product,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'weight' => $request->weight,
                'image' => $request->file('image')->store('image-product'),
            ]);
            return redirect()->route('product.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name_product)
    {
        return dd($request->all);
        $title = "Edit Product";

        if (empty($request->file('image'))) {
            $product = Product::where('name_product', $name_product)->first();
            $product->update([
                'name_product' => $request->name_product,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'weight' => $request->weight,
            ]);
        } else {
            $product = Product::where('name_product', $name_product)->first();
            Storage::delete($product->image);
            $product->update([
                'name_product' => $request->name_product,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'weight' => $request->weight,
                'image' => $request->file('image')->store('image-product'),
            ]);
        }


        return view('product.update', [
            'product'  => $product,
            'title' => $title
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::where('id', $id)->first();
        Storage::delete($product->image);
        Product::findOrFail($id)->delete();
        return redirect() -> route('product.index')-> with('success','Data berhasil dihapus.');
    }
}
