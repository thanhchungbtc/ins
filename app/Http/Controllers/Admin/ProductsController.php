<?php

namespace App\Http\Controllers\Admin;

use App\ProductCategory;
use App\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
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
        $products = Product::with('category')->get();
        return view('admins.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->validate($request, ['photo' => 'required']);
        // save product
        $product = new Product($request->all());
        $product->save();

        // upload photos
        $files = $request->file('photo');
        $product->addPhotos($files);


        // redirect
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('photos')->where('id', $id)->firstOrFail();

        return view('admins.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::with('photos')->where('id', $id)->firstOrFail();
        $product->update($request->all());

        // upload photos
        $product->addPhotos($request->file('photo'));

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     * return json, eg: { message: true, id: 2 }
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return response([
            'message' => $product->delete(),
            'id' => $product->id
        ], 200);
    }
}
