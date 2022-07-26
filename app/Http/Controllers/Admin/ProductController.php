<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
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
        return ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.product.add',[
            'title' => 'Add new product'
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
        // Kiểm tra xem người dùng có upload file nên không
        if (!$request->hasFile('image')) {
            // Nếu không thì in ra thông báo
            return "Mời chọn file cần upload";
        }
        $request->validate([
            'image'=> 'mimes:jpg,bmg,png'
        ]);
        // Nếu có thì thục hiện lưu trữ file vào public/images
        $image = $request->file('image');
        $storedPath = $image->move('homepage/img', $image->getClientOriginalName());

        $image_name = $image->getClientOriginalName();

        $product = new Products([
            'product_name' => $request->get('product_name'),
            'image' => $image_name,
            'price' => $request->get('price'),
            'description' => $request->get('description'),
        ]);
        $product ->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
