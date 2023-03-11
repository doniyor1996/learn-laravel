<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductPostRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\FileUploaderService;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('products.create', ['categories' => Category::all()]);
    }

    public function list(Category $category)
    {
        return view('products.index', ['list' => $category->products]);
    }


    public function store(ProductPostRequest $request, FileUploaderService $fileUploaderService)
    {
        $validatedData = $request->validated();
        unset($validatedData['image']);
        $product = Product::create($validatedData);

        $product->update([
            'image' => $fileUploaderService->uploadPhoto($request->image, $product),
        ]);

        return redirect()->route('products.list', [$validatedData['category_id']])->with('status', 'Product created successfully');

    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) 
    {
        return view('products.page', ['product' => Product::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
