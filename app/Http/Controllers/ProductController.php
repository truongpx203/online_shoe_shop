<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.content.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Category::all();
        return view('admin.content.add-product', compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $product = new Product();
        $product->fill($request->all());
        if ($request->hasFile('image')) {
            $file =  $request->file('image');
            $fileName = time().'-image.' . $file->getClientOriginalExtension();
            $file->storeAs('public/image', $fileName);
            $product['image'] = $fileName;
        }
        $product->save();
        return redirect()->route('product.index');
    }

    public function show($id)
    {
        $product = Product::find($id);
        $cate = Category::all();
        return view('admin.content.edit-product', compact('product', 'cate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $product = Product::find($request->id);
        $product->fill($request->all());
        if ($request->hasFile('image')) {
            if(!empty($product->image)){
                Storage::disk('public')->delete('image/'.$product->image);
            }
            $file =  $request->file('image');
            $fileName = time().'-image.' . $file->getClientOriginalExtension();
            $file->storeAs('public/image', $fileName);
            $product['image'] = $fileName;
        }
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

    }


    public function destroy($id)
    {
       $product = Product::find($id);
        if(!empty($product->image)){
            Storage::disk('public')->delete('image/'.$product->image);
        }
        $product->delete();
        return redirect()->route('product.index');
    }
}
