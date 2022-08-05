<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    private $productService;

    /**
     * @param $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $product = $this->productService->getAllProduct();
        return view('admin.product.list', [
            'data' => $product,
        ]);
    }

    //Show the form for creating a new resource.
    public function create()
    {
        return view('admin.product.add');
    }

    //Store a newly created resource in storage.
    public function store(ProductRequest $request)
    {
        try {
            $this->productService->insert($request);

            Session::flash('success', 'Add product success');
            return redirect()->route('admin.product.index');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->route('admin.product.create');
        }
    }

    //Show the form for editing the specified resource.
    public function edit($id)
    {
        $product = $this->productService->findById($id);
        return view('admin.product.edit', [
            'data' => $product,
        ]);
    }

    //Update the specified resource in storage.
    public function update(ProductRequest $request, $id)
    {
        try {
            $this->productService->updateById($request, $id);
            Session::flash('success', 'Update product successful');
            return redirect()->route('admin.product.index');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->back();
        }
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        $this->productService->deleteById($id);
        return redirect()->route('admin.product.index');
    }
}
