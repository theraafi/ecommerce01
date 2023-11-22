<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("layouts.dashboard.product.index", [
            'products' => Product::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("layouts.dashboard.product.create", [
            'categories' => Category::get(['id', 'category_name']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create($request->except('_token')+[
            'thumbnail'=> 'null',
        ]);

        // Product Image start
        if ($request->hasFile('thumbnail')) {
            // unlink(base_path('public/uploads/thumbnail/' . Product::find($id)->category_photo) );

            $thumbnail_photo_name = $product->name . "_" . date('Y-m-d') . "." . $request->file('thumbnail')->getClientOriginalExtension();

            $img = Image::make($request->file('thumbnail'))->resize(200, 200);
            $img->save(base_path('public/uploads/thumbnail/' . $thumbnail_photo_name), 80);

            Product::find($product->id)->update([
                "thumbnail" => $thumbnail_photo_name,
            ]);
        };
        // Product Image end

        return back()->with('product_added', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('layouts.dashboard.product.edit',compact('product'),[
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        Product::find($product->id)->update([
            "name" => $request->name,
            "category_id" => $request->category_id,
            "purchase_price" => $request->purchase_price,
            "mrp" => $request->mrp,
            "discounted_price" => $request->discounted_price,
            "short_description" => $request->short_description,
            "long_description" => $request->long_description,
            "additional_information" => $request->additional_information,
        ]);

        if ($request->hasFile('thumbnail')) {
            unlink(base_path('public/uploads/thumbnail/' . Product::find($product->id)->thumbnail) );

            $thumbnail_photo_name = $request->name . "_" . date('Y-m-d') . "." . $request->file('thumbnail')->getClientOriginalExtension();

            $img = Image::make($request->file('thumbnail'))->resize(200, 200);
            $img->save(base_path('public/uploads/thumbnail/' . $thumbnail_photo_name), 80);

            $product->update([
                "thumbnail" => $thumbnail_photo_name,
            ]);
        };
        return back()->with("product_updated","Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::find($product->id)->delete();
        return back();
    }
}
