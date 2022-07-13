@extends('layout.main-admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <link rel="stylesheet">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List of products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">List of products</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content p-1">

            <!-- Default box -->
            @include('admin.alert')
            <div class="card ">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 20%">Name</th>
                            <th style="width: 20%">Image</th>
                            <th style="width: 13%">Price</th>
                            <th style="width: 25%">Description</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <a>{{ $product->product_name }}</a>
                                </td>
                                <td><img src="../../homepage/images/{{ $product->image }}" style="width: 150px" alt="">
                                </td>
                                <td class="project_progress">{{ number_format($product->price,0,',','.') }} VND</td>
                                <td class="project_progress"><?php echo $product->description; ?></td>
                                <td class="project-actions ">
                                    <a class="btn btn-info btn-sm" href="{{ route('product.edit',['id'=>$product->id]) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('product.delete',['id'=>$product->id]) }}"
                                       onclick="return confirm('Are you sure to delete?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix pt-3 pl-3">
                        {{$data->links()}}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection