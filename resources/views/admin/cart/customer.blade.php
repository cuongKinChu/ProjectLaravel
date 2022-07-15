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

            <!-- Default box -->
            @include('admin.alert')
            <div class="card ">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 20%">Full Name</th>
                            <th style="width: 20%">Email</th>
                            <th style="width: 15%">Phone</th>
                            <th style="width: 15%">Order date</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td class="project_progress">{{ $customer->full_name }}</td>
                                <td class="project_progress">{{ $customer->email }}</td>
                                <td class="project_progress">{{ $customer->phone }}</td>
                                <td class="project_progress">{{ $customer->created_at }}</td>
                                <td class="project-actions ">
                                    <a class="btn btn-info btn-sm" href="{{ route('customers.show',['id'=>$customer->id]) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm"
                                       href="{{ route('customers.delete',['id'=>$customer->id]) }}"
                                       onclick="return confirm('Are you sure to delete?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix pt-3 pl-3">
                        {{$customers->links()}}
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