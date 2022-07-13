<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $product = Product::orderby('id', 'DESC')->paginate(5);
        return view('admin.product.list', [
            'data' => $product,
            'title' => 'List products'
        ]);
    }

    //Show the form for creating a new resource.
    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Add new product'
        ]);
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'product_name' => 'required',
            'price' => 'required|min:0|not_in:0',
            'description' => 'required',
        ]);
        $image_name = $this->uploadImage($request);

        Product::saveProduct($data['product_name'],$image_name, $data['price'],$data['description']);

        Session::flash('success', 'Add product successful');
        return redirect()->route('product.index');
    }

    //Display the specified resource.
    public function show($id)
    {
        //
    }

    //Show the form for editing the specified resource.
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', [
            'data' => $product,
            'title' => 'Edit products'
        ]);
    }

    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'product_name' => 'required',
            'price' => 'required|min:0|not_in:0',
            'description' => 'required',
        ]);
        //Image will be handled by function uploadImage
        $image_name = $this->uploadImage($request);

        Product::updateProduct($id,$data['product_name'],$image_name, $data['price'],$data['description']);
        Session::flash('success', 'Update product successful');
        return redirect()->route('product.index');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        if (Product::find($id)){
            Product::find($id)->delete();
            Session::flash('success', 'Delete product successful');
            return redirect()->back();
        }
        else{
            Session::flash('error', 'Delete product error');
            return redirect()->route('product.index');
        }
    }

    //Upload Image
    public function uploadImage($image_path)
    {
        //Check if the user has uploaded the file
        if (!$image_path->hasFile('image')) {
            // If not, print out the message
            Session::flash('error', 'Please select the file you want to upload');
            return redirect()->back();
        }
        $image_path->validate([
            'image' => 'mimes:jpg,bmg,png'
        ]);
        // If yes, then store the file in public/images
        $image = $image_path->file('image');
        $storedPath = $image->move('product-img', $image->getClientOriginalName());
        // Returns the value of the image name
        return $image_name = $image->getClientOriginalName();
    }

}
