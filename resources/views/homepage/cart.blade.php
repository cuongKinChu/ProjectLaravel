@extends('layout.home-page')
@section('content')
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container-fluid about py-5 ">
            <div class="container">
                <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                    <h2 class="text-primary font-secondary">Check & Pay</h2>
                    <h1 class="display-4 text-uppercase">YOUR CART</h1>
                </div>
            </div>
            <!-- /container -->
        </div>
        <!-- /BREADCRUMB -->

        <div class="container">
            @include('admin.alert')
            <div class="row">

                <div class="col-8">
                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th style="width:10%">STT</th>
                            <th style="width:10%">Image</th>
                            <th style="width:25%">Product name</th>
                            <th style="width:15%">Price</th>
                            <th style="width:10%">Amount</th>
                            <th style="width:15%">Total</th>
                            <th style="width:10%">Action</th>
                        </tr>
                        </thead>
                        @if($cart ->total_price > 0)
                            <tbody>
                            <?php $n = 1; ?>
                            @foreach($cart->items as  $item)
                                <tr>
                                    <td>{{$n}}</td>
                                    <td data-th="Image">
                                        <div class="col-sm-2 hidden-xs"><img src="{{ $item['image'] }}"
                                                                             style="width: 100px"
                                                                             alt="">
                                        </div>
                                    </td>
                                    <td data-th="Product">{{ $item['product_name'] }} </td>
                                    <td data-th="Price">{{ number_format($item['price'],0,',','.') }}</td>
                                    <td data-th="Quantity">
                                        <form action="{{ route('cart.update',['id' => $item['id']]) }}"
                                              method="get">
                                            <input type="number" name="quantity" class="form-control"
                                                   value="{{ $item['quantity'] }}">
                                    </td>

                                    <td data-th="chanties">{{ number_format($item['price']*$item['quantity'],0,',','.') }}
                                    </td>
                                    <td class="actions" data-th="">
                                        <button type="sumbit" value="Update" class="btn  btn-info btn-sm"><i
                                                    class="fas fa-pencil-alt text-white"></i></button>
                                        </form>
                                        <a href="{{ route('cart.remove',['id' => $item['id']]) }}">
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <?php $n++ ?>
                            @endforeach
                            </tbody>
                        @else
                            <tbody>
                            <td colspan="7" class="text-center p-5"><h4>There're no any product in your cart</h4></td>
                            </tbody>
                        @endif
                        <tfoot>
                        <tr>
                            <td colspan="3"><a href="{{ route('homepage.index') }}" class="btn btn-warning"><i
                                            class="fa fa-angle-left"></i> Buy More</a>
                            </td>
                            <td colspan="4" class="hidden-xs text-center">Total:
                                <strong>{{number_format($cart ->total_price,0,',','.')}} VND</strong>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="col-4 ">
                    <form method="POST" action="">
                        @csrf
                    <div class="row border border-secondary">
                        <div class="mb-3 pt-2 px-3">
                            <h3 class="title"><strong>Check out</strong></h3>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="name" class="form-label">Customer Name</label>
                            <input class="form-control" type="text" id="name" name="full_name"
                                   placeholder="Your Name"
                                   value="">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="email" id="email" name="email"
                                   placeholder="exam@email.com" value="">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input class="form-control" type="text" name="address" placeholder="Your Address"
                                   value="">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="phone" class="form-label">Phone number</label>
                            <input class="form-control" type="text" name="phone" placeholder="Telephone" value="">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="content" class="form-label">Content</label>
                            <input class="form-control" type="text" name="content" placeholder="Telephone" value="">
                        </div>
                        <div class="d-grid gap-2 col-4 mx-auto pb-2">
                            @if($cart ->total_price == 0)
                                <button type="submit" class="btn btn-primary order-submit "  disabled>Order</button>
                            @else
                                <button type="submit" class="btn btn-primary order-submit">Order</button>
                            @endif
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection