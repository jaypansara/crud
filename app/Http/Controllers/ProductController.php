<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate data
        $request->validate([
            'name'=> 'required',
            'description' => 'required',
            'image' =>'required|mimes:png,jpg,jpeg,gif'
        ]);
        //upload image
         $imageName = time().'.'.$request->image->extension();
         $request->image->move(public_path('products'),$imageName);

        Product::create([
            'image'=>$imageName,
            'name'=>$request->name,
            'description' => $request->description,

        ]);

        $request->session()->flash('alert-success','Product Added Successfully.');
         return to_route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      //validate data
      $request->validate([
        'name'=> 'required',
        'description' => 'required',
        'image' =>'nullable|mimes:png,jpg,jpeg,gif'
    ]);

    $product = Product::where('id',$id)->first();

    if(isset($request->image)){

        //upload image
         $imageName = time().'.'.$request->image->extension();
         $request->image->move(public_path('products'),$imageName);
         $product->image = $imageName;
    }



     $product->save();

    $request->session()->flash('alert-info','Product Updated Successfully.');
     return to_route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();

        request()->session()->flash('alert-danger','Product Delete Successfully');
        return to_route('home');

    }
}
