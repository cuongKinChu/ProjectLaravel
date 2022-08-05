@extends('layout.main-admin')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mb-5">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Order</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Order Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content p-1">
            <form action="{{ route('admin.order.update',$order->id) }}" method="POST" roles="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Status</label>
                                    <select class="form-control " aria-label=".form-select-lg example"
                                            name="status">
                                        <option selected value="{{ $order -> status}}">Select status</option>
                                        <option value="0">Chờ xử lí</option>
                                        <option value="1">Đang giao hàng</option>
                                        <option value="2">Đã nhận hàng</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <input type="submit" value="Update status" class="btn btn-success float-right" >
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
