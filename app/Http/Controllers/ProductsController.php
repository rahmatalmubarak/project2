<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Product = product::all();
        return view('product.index', compact('Product'));
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
        // dd($request->all());
        $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'capital_price' => ['required'],
            'sell_price' => ['required'],
            'stock_last' => ['required']
        ]);


        $product = new product;
        $product->name = $request->name;
        $product->type = $request->type;
        $product->capital_price = $request->capital_price;
        $product->sell_price = $request->sell_price;
        $product->stock_last = $request->stock_last;
        $product->save();

        // product::created($request->all());
        
        return redirect('/product')->with('statis', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return view('product.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
      
        // $request->validate([
        //     'name' => ['required'],
        //     'type' => ['required'],
        //     'capital_price' => ['required'],
        //     'sell_price' => ['required'],
        //     'stock_last' => ['required']
        // ]);
        // dd($product);
         $product->update([
                            'name' => $request->name,
                            'type' => $request->type,
                            'capital_price' => $request->capital_price,
                            'sell_price' => $request->sell_price,
                            'stock_last' => $request->stock_last
                        ]);
        return redirect('/product')->with('status','Data Berhasil Diubah!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        product::destroy($product->id);
        return redirect('/product')->with('status','Data berhasil dihapus');
    }
}
