@extends('layout.main-admin')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mb-5">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <h1>Edit Customer</h1>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content p-1">
            <form action="{{ route('admin.customer.update',$data->id) }}" method="POST" roles="form"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Customer name</label>
                                    <input type="text" name="full_name" id="inputName" class="form-control"
                                           placeholder="Input customer name" value="{{ $data -> full_name}}">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="text" name="email" id="inputEmail" class="form-control"
                                           placeholder="Input price" value="{{ $data->email  }}">
                                </div>

                                <div class="form-group">
                                    <label for="inputAddress">Address</label>
                                    <input type="text" name="address" id="inputAddress" class="form-control"
                                           placeholder="Input address" value="{{ $data -> address}}">
                                </div>

                                <div class="form-group">
                                    <label for="inputImg">Phone</label>
                                    <input type="text" name="phone" id="inputPhone" class="form-control"
                                           placeholder="Input phone" value="{{ $data -> phone}}">
                                </div>
                                @include('admin.alert')
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="row p-1">
                    <div class="col-12">
                        <a href="{{ route('admin.customer.index') }}" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Update customer" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
