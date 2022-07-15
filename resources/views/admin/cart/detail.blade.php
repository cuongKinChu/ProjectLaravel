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

        <div class="customer mt-3">
            <ul>
                <li>Customer name: <strong>{{$customer->full_name}}</strong></li>
                <li>Phone number: <strong>{{$customer->phone}}</strong></li>
                <li>Address: <strong>{{$customer->address}}</strong></li>
                <li>Email: <strong>{{$customer->email}}</strong></li>
                <li>Content: <strong>{{$customer->content}}</strong></li>
            </ul>
        </div>

        <!-- Main content -->
        <section class="content p-1">
            <!-- Default box -->
            @php
                $total = 0;
            @endphp
            <div class="card ">
                <div class="card-body p-0">
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
                        <tbody>
                        @foreach($carts as $key=>$cart)
                            @php
                                $priceEnd = $cart->price * $cart->qty;
                                $total += $priceEnd;
                            @endphp
                            <tr>
                                <td>{{ $cart->id }}</td>
                                <td>
                                    <a>{{ $cart->product->product_name }}</a>
                                </td>
                                <td><img src="{{ $cart->product->image }}" style="width: 150px" alt="">
                                </td>
                                <td class="project_progress">{{ number_format($cart->product->price,0,',','.') }} VND</td>
                                <td>
                                    <a>{{ $cart->qty }}</a>
                                </td>
                                <td class="project_progress">{{ number_format($priceEnd,0,',','.') }} VND</td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    <div class="row p-1">
                        <div class="col-12">
                            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
                            <p class=" float-right"><strong>Total:</strong> {{ number_format($total,0,',','.') }} VND</p>
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