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
        <div class="row">
            <div class ="col-8">
                <div class="container">
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
                                        <div class="col-sm-2 hidden-xs"><img src="{{ $item['image'] }}" style="width: 100px"
                                                                             alt="">
                                        </div>
                                    </td>
                                    <td data-th="Product">{{ $item['product_name'] }} </td>
                                    <td data-th="Price">{{ number_format($item['price'],0,',','.') }} VND</td>
                                    <td data-th="Quantity">
                                        <form action="{{ route('cart.update',['id' => $item['id']]) }}" method="get">
                                            <input type="number" name="quantity" class="form-control"
                                                   value="{{ $item['quantity'] }}">
                                    </td>

                                    <td data-th="chanties">{{ number_format($item['price']*$item['quantity'],0,',','.') }}
                                        VND
                                    </td>
                                    <td class="actions" data-th="">
                                        <button type="sumbit" value="Update" class="btn  btn-info btn-sm"><i
                                                    class="fas fa-pencil-alt text-white"></i></button>
                                        </form>
                                        <a href="{{ route('cart.remove',['id' => $item['id']]) }}">
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
                            <td></td>
                            <td colspan="2"><a href="{{ route('homepage.index') }}" class="btn btn-warning"><i
                                            class="fa fa-angle-left"></i> Mua tiếp</a>
                            </td>
                            <td colspan="2" class="hidden-xs text-center">Total:
                                <strong>{{number_format($cart ->total_price,0,',','.')}} VND</strong>
                            </td>
                            {{--                    <td colspan="2"><a href="{{ route('checkout') }}" class="btn btn-success btn-block">Thanh toán <i--}}
                            {{--                                    class="fa fa-angle-right"></i></a>--}}
                            {{--                    </td>--}}
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col"></div>
        </div>

    </div>
@endsection