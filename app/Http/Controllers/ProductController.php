<?php

namespace App\Http\Controllers;

use App\Product;
use App\Location;
use App\Category;
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
        $products = Product::where('state',1)->orderBy('location_id')->get();
        return view('product.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        $categories = Category::all();

        return view('product.create',[
            'locations'=>$locations,
            'categories'=>$categories
        ]);
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
            'name' => 'required|min:3',
            'place' => 'required|min:3',
            'image' => 'nullable',
            'description'=>'min:1',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'category_id' => 'integer',
            'location_id' => 'integer',

        ]);

        $product = new Product();
        $product->name = $validData['name'];
        $product->place = $validData['place'];  
        $product->image = $validData['image'];
        $product->start_date = $validData['start_date'];
        $product->end_date = $validData['end_date'];
        $product->category_id = $validData['category_id'];
        $product->location_id = $validData['location_id'];
        $product->description = $validData['description'];
        $product->state = 1;
        $product->save();

        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //mostrar una vista ya relacionada con category y location
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product = product::findOrFail($id);

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
        $product = product::find($id);
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->save();

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/product');
    }
}
