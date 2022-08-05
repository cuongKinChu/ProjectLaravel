@extends('layout.main-admin')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mb-5">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Order</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content p-1">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <strong><label for="cart">Order Detail</label></strong>
                            <div class="container">
                                <table id="cart" class="table table-hover table-condensed" style="max-height: 300px">
                                    <thead>
                                    <tr>
                                        <th style="width:10%">STT</th>
                                        <th style="width:25%">Product name</th>
                                        <th style="width:15%">Price</th>
                                        <th style="width:10%">Amount</th>
                                        <th style="width:15%">Total</th>
                                        <th style="width:10%">Action</th>
                                    </tr>
                                    </thead>
                                    @if($cart->total_price > 0)
                                        <tbody>
                                        <?php $n = 1; ?>
                                        @foreach($cart->items as  $item)
                                            <tr>
                                                <td>{{$n}}</td>
                                                <td data-th="Product">{{ $item['product_name'] }} </td>
                                                <td data-th="Price">{{ number_format($item['price'],0,',','.') }}</td>
                                                <form action="{{ route('admin.cart.update',['id' => $item['id']]) }}"
                                                      method="get">
                                                    <td data-th="Quantity">
                                                        <input type="number" name="quantity" class="form-control"
                                                               min="1"
                                                               value="{{ $item['quantity'] }}">
                                                    </td>
                                                    <td data-th="chanties">{{ number_format($item['price']*$item['quantity'],0,',','.') }}
                                                    </td>
                                                    <td class="actions" data-th="">
                                                        <button type="sumbit" value="Update"
                                                                class="btn  btn-info btn-sm"><i
                                                                    class="fas fa-pencil-alt text-white"></i></button>
                                                </form>
                                                <a href="{{ route('admin.cart.remove',['id' => $item['id']]) }}"
                                                   class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                </td>
                                            </tr>
                                            <?php $n++ ?>
                                        @endforeach
                                        </tbody>
                                    @else
                                        <tbody>
                                        <td colspan="7" class="text-center p-5"><h4>There're no any product in your
                                                cart</h4></td>
                                        </tbody>
                                    @endif
                                    <tfoot>
                                    <tr>
                                        <td colspan="2" class="hidden-xs text-center">Total:
                                            <strong>{{number_format($cart ->total_price,0,',','.')}} VND</strong>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <form action="{{ route('admin.order.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName">Customer Name</label>
                                    <select class="form-select" aria-label="Default select example" name="customer">
                                        <option selected>Select Customer</option>
                                        @foreach($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->full_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group pb-3">
                                    <label for="inputNote">Note</label>
                                    <input type="text" name="order_note" id="inputNote" class="form-control"
                                           placeholder="Input note">
                                </div>
                                @include('admin.alert')
                                <div class="row p-1">
                                    <div class="col-12">
                                        <a href="{{ route('admin.customer.index') }}"
                                           class="btn btn-secondary">Cancel</a>
                                        <input type="submit" value="Create new order"
                                               class="btn btn-success float-right">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="col-md-6">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    {{ $product->product_name }}
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($product->price,0,',','.') }}
                                                    VND
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="{{route('admin.cart.add',['id'=>$product->id])}}"
                                                   class="h5">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
