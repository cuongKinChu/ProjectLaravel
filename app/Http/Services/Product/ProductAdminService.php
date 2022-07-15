<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ProductAdminService
{
    public function insert($request)
    {
        try {
            $request->except('_token');
            Product::create([
                'product_name' => $request->input('product_name'),
                'price' => $request->input('price'),
                'image' => $request->input('file'),
                'description' => $request->input('description'),
            ]);
            Session::flash('success', 'Add product successful');
        }catch (\Exception $err){
            Session::flash('error', 'Add product fail');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request,$id)
    {
        try {
            $request->except('_token');
            $product = Product::find($id);
            $product->product_name = $request->product_name;
            $product->image = $request->file;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->save();
            Session::flash('success', 'Update product successful');
        }catch (\Exception $err){
            Session::flash('error', 'Update product fail');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function remove($id)
    {
        $product = Product::find($id);
        if ($product){
            $product->delete();
            return Session::flash('success', 'Delete product successful');
        }
        else{
            return Session::flash('error', 'Delete product error');
        }
    }
}