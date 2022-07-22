@extends('layout.main-admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List order</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">List order</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content p-1">
            <form action="" method="GET" class="form-inline" role="form">
                <div class="form-group">
                    <input type="date" class="form-control" name="date_from">
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" name="date_to">
                </div>
                <button type="submit" class="btn-primary btn"> Filter </button>
            </form>
            <!-- Default box -->
            @include('admin.alert')
            <div class="card ">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Created date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td class="project_progress">{{ $order->full_name }}</td>
                                <td class="project_progress">{{ $order->address }}</td>
                                <td class="project_progress">{{ $order->phone }}</td>
                                <td class="project_progress">{{ $order->created_at }}</td>
                                <td class="project_progress">{{ $order->status }}</td>
                                <td class="project-actions ">
                                    <a class="btn btn-info btn-sm"
                                       href="{{ route('admin.customers.orderdetail',['id'=>$order->id])  }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm"
                                       href=""
                                       onclick="return confirm('Are you sure to delete?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                                {{--                                    </a>--}}
                                {{--                                <td class="project-actions ">--}}
                                {{--                                    <a class="btn btn-info btn-sm" href="">--}}
                                {{--                                        <i class="fas fa-pencil-alt"></i>--}}
                                {{--                                    </a>--}}

                                {{--                                </td>--}}
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