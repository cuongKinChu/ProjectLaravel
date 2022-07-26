@extends('layout.main-admin')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mb-5">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <h1>Add Product</h1>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content p-1">
            @include('admin.alert')
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th><a href="javascript:" class="btn btn-info addRow">+</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="text" name="product_name[]" id="inputName" class="form-control"
                                   placeholder="Input product name"></td>
                        <td><input type="number" name="price[]" id="inputPrice" class="form-control"
                                   placeholder="Input price"></td>
                        <td><input type="text" name="description[]" class="form-control"
                                   placeholder="Input description..."></input></td>
                        <td><a href="javascript:" class="btn btn-danger deleteRow">-</a></td>
                    </tr>
                    </tbody>
                </table>
                <input type="submit" value="Create new product" class="btn btn-success float-right">

            </form>
        </section>
    </div>
    <!-- /.content-wrapper -->

@endsection
