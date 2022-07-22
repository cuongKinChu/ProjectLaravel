@extends('layout.main-admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Order Detail</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Order Detail</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content p-1">
            <!-- Default box -->
            <div class="card ">
                <div class="card-body p-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    ID
                                </div>
                                <div class="col-3">
                                    Name
                                </div>
                                <div class="col-3">
                                    Address
                                </div>
                                <div class="col-2">
                                    Phone
                                </div>
                                <div class="col-1">
                                    Status
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($orders as $key=>$cart)
                        <div class="card">
                            <div class="card-header btn" data-toggle="collapse"
                                 data-target="#noidungcard{{ $cart->id }}">
                                <div class="row">
                                    <div class="col-1">
                                        {{ $cart->id }}
                                    </div>
                                    <div class="col-3">
                                        {{ $cart->full_name }}
                                    </div>
                                    <div class="col-3">
                                        {{ $cart->address }}
                                    </div>
                                    <div class="col-3">
                                        {{ $cart->phone }}
                                    </div>
                                    <div class="col-1">
                                        {{ $cart->status }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body collapse" data-toggle="collapse" aria-expanded="false"
                                 id="noidungcard{{ $cart->id }}">
                                <table class="table table-striped projects">
                                    <thead>
                                    <tr>
                                        <th style="width: 5%">ID</th>
                                        <th style="width: 20%">Name</th>
                                        <th style="width: 20%">Image</th>
                                        <th style="width: 13%">Price</th>
                                        <th style="width: 15%">Quantity</th>
                                        <th style="width: 10%">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody id="order-detail">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                    <div class="row p-1">
                        <div class="col-12">
                            <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
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