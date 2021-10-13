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
                'name_product'  => $request->name_product,
                'price'         => $request->price,
                'status'        => $request->status,
                'quantity'      => $request->quantity,
                'weight'        => $request->weight,
            ]);
            return redirect()->route('product.index');
        }
        else{
            Product::create([
                'name_product'  => $request->name_product,
                'price'         => $request->price,
                'status'        => $request->status,
                'quantity'      => $request->quantity,
                'weight'        => $request->weight,
                'image'         => $request->file('image')->store('image-product'),
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
        $title = "Edit Product";
        $product = Product::findOrFail($id);
        return view('product.edit', compact('title', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return dd($request);

        if(empty($request->file('image'))){
            $product = Product::findOrFail($id);
            $product->update([
            'name_product'  => $request->name_product,
            'price'         => $request->price,
            'status'        => $request->status,
            'quantity'      => $request->quantity,
            'weight'        => $request->weight,
            ]);
            return redirect()->route('product.index');
        }
        else{
            $product = Product::findOrFail($id);
            Storage::delete($product->image);
            $product->update([
            'name_product'  => $request->name_product,
            'price'         => $request->price,
            'status'        => $request->status,
            'quantity'      => $request->quantity,
            'weight'        => $request->weight,
            'image'         => $request->file('image')->store('image-product'),
            ]);

            return redirect()->route('product.index')->with(['success' => 'data berhasil terupdate']);
        }
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
