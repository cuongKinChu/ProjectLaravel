@extends('layout.main-admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List orders</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content p-1">
            <div class="row mb-5">
                <div class="col">
                    <form action="" method="GET" class="form-inline" role="form">
                        <div class="form-group">
                            <input type="date" class="form-control" name="date_from">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" name="date_to">
                        </div>
                        <button type="submit" class="btn-primary btn"> Filter</button>
                    </form>
                </div>
                <div class="col">
                    <form action="{{route('admin.order.search')}}" method="POST"
                          class="form-inline mr-auto w-100 navbar-search" role="form">
                        @csrf
                        <div class="input-group">
                            <input type="search" class="form-control" name="search"
                                   placeholder="Search order have product...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 10%">ID</th>
                    <th style="width: 20%">Customer Name</th>
                    <th style="width: 25%">Email</th>
                    <th style="width: 20%">Date order</th>
                    <th style="width: 10%">Status</th>
                    <th style="width: 20%">Action</th>
                </tr>
                </thead>
            </table>
            <!-- Default box -->
            @include('admin.alert')
            <div class="card ">
                <div class="card-body p-0">
                    @foreach($orders as $order)
                        <div class="card">
                            <div class="card-header btn" data-toggle="collapse"
                                 data-target="#noidungcard{{ $order->id }}">
                                <div class="row">
                                    <div class="col-1">
                                        {{ $order->id }}
                                    </div>
                                    <div class="col-2">
                                        {{ $order->customer->full_name }}
                                    </div>
                                    <div class="col-3">
                                        {{ $order->customer->email }}
                                    </div>
                                    <div class="col-3">
                                        {{ $order->created_at }}
                                    </div>
                                    <div class="col-1">
                                        @if($order->status == 0)
                                            <td><span class="badge bg-warning text-white">Chờ xử lí</span></td>
                                        @elseif($order->status == 1)
                                            <td><span class="badge bg-success text-white">Đang giao hàng</span></td>
                                        @elseif($order->status == 2)
                                            <td><span class="badge bg-primary text-white">Đã Nhận Hàng</span></td>
                                        @endif
                                    </div>
                                    <div class="col-2">
                                        <form action="{{ route('admin.order.destroy',$order->id) }}" method="POST">
                                            <a class="btn btn-info btn-sm "
                                               href="{{ route('admin.order.edit',$order->id) }}">
                                                <i class="fas fa-pencil-alt text-white"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure to delete?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body collapse" data-toggle="collapse" aria-expanded="false"
                                 id="noidungcard{{ $order->id }}">
                                <div class="customer mt-3">
                                    <ul>
                                        <li>Customer name: <strong>{{ $order->customer->full_name }}</strong></li>
                                        <li>Phone number: <strong>{{$order->customer->phone}}</strong></li>
                                        <li>Address: <strong>{{$order->customer->address}}</strong></li>
                                        <li>Email: <strong>{{$order->customer->email}}</strong></li>
                                        <li>Content: <strong>{{$order->order_note}}</strong></li>
                                    </ul>
                                </div>
                                <table class="table table-striped projects table-info">
                                    <thead>
                                    <tr>
                                        <th style="width: 10%">Product ID</th>
                                        <th style="width: 20%">Name</th>
                                        <th style="width: 13%">Price</th>
                                        <th style="width: 15%">Quantity</th>
                                        <th style="width: 10%">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody id="order-detail">
                                    @php $total = 0; @endphp
                                    @foreach($order->orderDetails as $order_detail)
                                        @php
                                            $priceEnd = $order_detail->product->price * $order_detail->quantity;
                                            $total += $priceEnd;
                                        @endphp
                                        <tr>
                                            <td>{{ $order_detail->product->id }}</td>
                                            <td>
                                                <a>{{ $order_detail->product->product_name }}</a>
                                            </td>
                                            <td class="project_progress">{{ number_format($order_detail->product->price,0,',','.') }}
                                                VND
                                            </td>
                                            <td>
                                                <a>{{ $order_detail->quantity }}</a>
                                            </td>
                                            <td class="project_progress">{{ number_format($priceEnd,0,',','.') }}VND
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="6" class="hidden-xs text-right">Total:
                                            <strong>{{ number_format($total,0,',','.') }} VND</strong>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
