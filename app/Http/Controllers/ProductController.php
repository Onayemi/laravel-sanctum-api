<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return Product::all();
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required',
        ]);
        return Product::create($request->all());
    }

    public function show($id){
        return Product::find($id);
    }
    
    public function update(Request $request, $id){
        $products = Product::find($id);
        $products->update($request->all());
        return $products;
    }

    public function destroy($id){
        return Product::destroy($id);
    }

    // Search for a name
    public function search($name){
        return Product::where('name', 'like', '%'.$name.'%')->get();
    }
}
