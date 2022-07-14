@extends('layout.main-admin')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mb-5">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Product Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content p-1">
            <form action="" method="POST" roles="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Product name</label>
                                    <input type="text" name="product_name" id="inputName" class="form-control" placeholder="Input product name" value="{{ $data -> product_name}}">
                                </div>

                                <div class="form-group">
                                    <label for="inputPrice">Price</label>
                                    <input type="number" name="price" id="inputPrice" class="form-control" placeholder="Input price" value="{{ $data -> price}}">
                                </div>

                                <div class="form-group">
                                    <label for="inputImg">Image of product</label>
                                    <input class="form-control " type="file" id="upload-img" name="image">
                                    <div id="image_show" class="pt-2">
                                        <a href="{{ $data->image }}" target="_blank">
                                            <img src="{{ $data->image }}" width="100px" alt="">
                                        </a>
                                    </div>
                                    <input type="hidden" name="file" id="file" value="{{ $data->image }}">
                                </div>

                                <div class="form-group">
                                    <label for="summernote">Description</label>
                                    <textarea id="summernote" name="description" class="form-control" placeholder="Input description...">{{$data->description}} </textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="row p-1">
                    <div class="col-12">
                        <a href="{{ route('product.index') }}" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Update product" class="btn btn-success float-right" >
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection