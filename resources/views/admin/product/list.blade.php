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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <a>{{ $product->product_name }}</a>
                                </td>
                                </td>
                                <td class="project_progress">{{ number_format($product->price,0,',','.') }} VND</td>
                                <td class="project_progress"><?php echo $product->description; ?></td>
                                <td class="project-actions ">
                                    <form action="{{ route('admin.product.destroy',$product->id) }}" method="POST">
                                        <a class="btn btn-info btn-sm "
                                           href="{{ route('admin.product.edit',$product->id) }}">
                                            <i class="fas fa-pencil-alt text-white"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure to delete?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
