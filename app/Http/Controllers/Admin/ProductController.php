<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderby('id', 'DESC')->paginate(5);
        return view('admin.product.list', [
            'data' => $product,
            'title' => 'List products'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Add new product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'price' => 'required|min:0|not_in:0',
            'description' => 'required',
        ]);

        // Kiểm tra xem người dùng có upload file nên không
        if (!$request->hasFile('image')) {
            // Nếu không thì in ra thông báo
            Session::flash('error', 'Please select the file you want to upload');
            return redirect()->back();
        }
        $request->validate([
            'image' => 'mimes:jpg,bmg,png'
        ]);
        // Nếu có thì thục hiện lưu trữ file vào public/images
        $image = $request->file('image');
        $storedPath = $image->move('homepage/images', $image->getClientOriginalName());

        $image_name = $image->getClientOriginalName();

        $product = new Product([
            'product_name' => $request->get('product_name'),
            'image' => $image_name,
            'price' => $request->get('price'),
            'description' => $request->get('description'),
        ]);
        $product->save();
        Session::flash('success', 'Add product successful');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', [
            'data' => $product,
            'title' => 'Edit products'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'price' => 'required|min:0|not_in:0',
            'description' => 'required',
        ]);

        // Kiểm tra xem người dùng có upload file nên không
        if (!$request->hasFile('image')) {
            // Nếu không thì in ra thông báo
            Session::flash('error', 'Please select the file you want to upload');
            return redirect()->back();
        }
        $request->validate([
            'image' => 'mimes:jpg,bmg,png'
        ]);
        // Nếu có thì thục hiện lưu trữ file vào public/images
        $image = $request->file('image');
        $storedPath = $image->move('homepage/images', $image->getClientOriginalName());

        $image_name = $image->getClientOriginalName();

        $product = Product::find($id);
        $product->product_name = $request->get('product_name');
        $product->image = $image_name;
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->save();
        Session::flash('success', 'Update product successful');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        Session::flash('success', 'Delete product successful');
        return redirect()->back();
    }
}
