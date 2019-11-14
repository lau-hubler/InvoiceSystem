<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index', [
            'products' => Product::all()
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
        $validData = $request->validate([
            'name' => 'required | min:3',
            'description' => 'required | min:8',
            'unit_price' => 'required | numeric',
            'stock' => 'numeric',
            
        ]);
        
        $product = new Product();
        $product->name = $validData['name'];
        $product->description = $validData['description'];
        $product->unit_price = $validData['unit_price'];
        $product->stock = $validData['stock'];
        $product->category_id = 0;
        $product->save();
        
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validData = $request->validate([
            'name' => 'required | min:3',
            'description' => 'required | min:8',
            'unit_price' => 'required | numeric',
            'stock' => 'numeric',
    
        ]);
    
        $product->name = $validData['name'];
        $product->description = $validData['description'];
        $product->unit_price = $validData['unit_price'];
        $product->stock = $validData['stock'];
        $product->category_id = 0;
        $product->save();
    
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
