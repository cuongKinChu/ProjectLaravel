@extends('layout.main-admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <h1>List customers</h1>
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
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Created date</th>
                            <th>Number of orders</th>
                            <th>Action</th>
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
                                <td class="project_progress">{{ $customer->orders->count() }}</td>
                                <td class="project-actions ">
                                    <form action="{{ route('admin.customer.destroy',$customer->id) }}" method="POST">
                                        <a class="btn btn-info btn-sm "
                                           href="{{ route('admin.customer.edit',$customer->id) }}">
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
