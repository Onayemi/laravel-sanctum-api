<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Mail\SignupEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function email(){
        $data = [
            'name' => 'Samuel kay',
            'verification_code' => 'hdfsf786878fdas'
        ];
        Mail::to('onayemi18@gmail.com')->send(new SignupEmail($data));
    }

    public function sendmail(Request $request){
        $data = [
            'name' => 'Samuel kay',
            'token' => 'hdfsf786878fdas'
        ];
        Mail::to('onayemi18@gmail.com')->send(new SignupEmail($data));
    }
}
