<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Services\Product\ProductAdminService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    private $productAdminService;

    /**
     * @param $productAdminService
     */
    public function __construct(ProductAdminService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }

    public function index()
    {
        $product = $this->productAdminService->getAllProduct();
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
        try {
            $this->productAdminService->insert($request);

            Session::flash('success', 'Add product successful');
            return redirect()->route('admin.product.index');
        } catch (\Exception $err) {
            Session::flash('error', 'Add product fail');
            Log::info($err->getMessage());
            return redirect()->route('admin.product.add');
        }

    }

    //Display the specified resource.
    public function show($id)
    {
        //
    }

    //Show the form for editing the specified resource.
    public function edit($id)
    {
        $product = $this->productAdminService->findById($id);
        return view('admin.product.edit', [
            'data' => $product,
            'title' => 'Edit products'
        ]);
    }

    //Update the specified resource in storage.
    public function update(ProductRequest $request, $id)
    {
        try {
            $this->productAdminService->update($request, $id);
            Session::flash('success', 'Update product successful');
            return redirect()->route('admin.product.index');
        } catch (\Exception $err) {
            Session::flash('error', 'Update product fail');
            Log::info($err->getMessage());
            return redirect()->back();
        }
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        $this->productAdminService->deleteById($id);
        return redirect()->route('admin.product.index');
    }
}
