<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProdukRequest;
use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $product = Product::orderBy('id', 'desc')->paginate(5);
        return view('product.index',[
            'title' => $title,
            'product' => $product,
            'i' => $i,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Product";
        $category = Category::all();
        return view('product.create', compact('title','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // $i = 1;
        // return dd($request);
        // $request->validate([
        //     'name_product' => 'required',
        //     'price' => 'required',
        //     'quantity' => 'required',
        //     'weight' => 'required',
        //     'image' => 'required',
        // ]);
        if(empty($request -> file('image'))){
            Product::create([
                'name_product'  => $request->name_product,
                'price'         => $request->price,
                'status'        => $request->status,
                'quantity'      => $request->quantity,
                'weight'        => $request->weight,
                'category_id'   => $request->category_id,
                'slug'          => Str::slug($request->name_product, '-'),
            ]);
            return redirect()->route('product.index')->with(['success' => 'data berhasil ditambah']);
        }
        else{
            Product::create([
                'name_product'  => $request->name_product,
                'price'         => $request->price,
                'status'        => $request->status,
                'quantity'      => $request->quantity,
                'weight'        => $request->weight,
                'category_id'   => $request->category_id,
                'slug'          => Str::slug($request->name_product, '-'),
                'image'         => $request->file('image')->store('image-product'),
            ]);
            return redirect()->route('product.index')->with(['success' => 'data berhasil ditambah']);
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
        //
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
        $category = Category::all();
        return view('product.edit', compact('title', 'product','category'));
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
        // $i = 1;
        if(empty($request->file('image'))){
            $product = Product::findOrFail($id);
            $product->update([
            'name_product'  => $request->name_product,
            'price'         => $request->price,
            'status'        => $request->status,
            'category_id'   => $request->category_id,
            'quantity'      => $request->quantity,
            'weight'        => $request->weight,
            'slug'          => Str::slug($request->name_product, '-'),
            ]);
            return redirect()->route('product.index')->with(['success' => 'data berhasil terupdate']);
        }
        else{
            $product = Product::findOrFail($id);
            Storage::delete($product->image);
            $product->update([
            'name_product'  => $request->name_product,
            'price'         => $request->price,
            'status'        => $request->status,
            'category_id'   => $request->category_id,
            'quantity'      => $request->quantity,
            'weight'        => $request->weight,
            'slug'          => Str::slug($request->name_product, '-'),
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

    public function search(Request $request)
    {
        $i = 1;
        $title = "Result";
        $keyword = $request->search;
        $product = Product::where('name_product', 'like', "%" . $keyword . "%")->paginate(5);
        return view('product.index', compact('product','title','i'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

}
