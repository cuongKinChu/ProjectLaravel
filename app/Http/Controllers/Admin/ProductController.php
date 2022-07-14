<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\product\ProductAdminService;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $productServices;


    //Display a listing of the resource.

    /**
     * @param $productServices
     */
    public function __construct(ProductAdminService $productServices)
    {
        $this->productServices = $productServices;
    }

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
    public function store(ProductRequest $request)
    {
        $this->productServices->insert($request);
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
    public function update(ProductRequest $request, $id)
    {
        $this->productServices->update($request,$id);;
        return redirect()->route('product.index');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        $this->productServices->remove($id);
        return redirect()->route('product.index');
    }
}
