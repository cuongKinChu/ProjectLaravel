@extends('layout.main-admin')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mb-5">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Customer</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content p-1">
            <form action="{{ route('admin.customer.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Customer Name</label>
                                    <input type="text" name="full_name" id="inputName" class="form-control"
                                           placeholder="Input customer name">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="text" name="email" id="inputEmail" class="form-control"
                                           placeholder="Input email">
                                </div>

                                <div class="form-group">
                                    <label for="inputAddress">Address</label>
                                    <input type="text" name="address" id="inputAddress" class="form-control"
                                           placeholder="Input address">
                                </div>

                                <div class="form-group">
                                    <label for="inputImg">Phone</label>
                                    <input type="text" name="phone" id="inputPhone" class="form-control"
                                           placeholder="Input phone">
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
                        <input type="submit" value="Create new customer" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
