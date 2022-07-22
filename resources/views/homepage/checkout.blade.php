@extends('layout.home-page')
@section('content')

    @include('admin.alert')
    <!-- SECTION -->
    <div class="section mt-5">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-7">
                        @csrf
                        <!-- Billing Details -->
                        <div class="row billing-details">
                            <div class="mb-3">
                                <h3 class="title">Payment Address</h3>
                            </div>
                            <div class="col-8 mb-3">
                                <label for="name" class="form-label">Full name</label>
                                <input class="form-control" type="text" id="name" name="full_name"
                                       placeholder="Your Name" value="{{ session('customer')->full_name }}">
                            </div>
                            <div class="col-8 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input class="form-control" type="text" name="address" placeholder="Your Address"
                                       value="{{ session('customer')->address }}">
                            </div>
                            <div class="col-8 mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input class="form-control" type="tel" name="phone" placeholder="Telephone"
                                       value="{{ session('customer')->phone }}">
                            </div>
                            <div class="col-sm-8 mb-3">
                                <label for="Notes" class="form-label">Order notes</label>
                                <textarea class="form-control" name="order_note" id="Notes"
                                          placeholder="Order Notes"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Order Details -->
                    <div class="col-md-5 order-details mt-5">
                        <div class="section-title text-center ">
                            <h3 class="title">Your Order</h3>
                        </div>
                        <div class="order-summary">
                            <div class="order-col">
                                <div><strong>PRODUCT</strong></div>
                                <div><strong>TOTAL</strong></div>
                            </div>

                            <div class="order-products">
                                @foreach($cart->items as  $item)
                                    <div class="order-col">

                                        <div>{{ $item['quantity'] }}x {{ $item['product_name'] }}</div>
                                        <div>{{ number_format($item['price']*$item['quantity'],0,',','.') }} VND</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="order-col">
                                <div>Delivery charges</div>
                                <div><strong>Free</strong></div>
                            </div>
                            <div class="order-col">
                                <div><strong>Into money</strong></div>
                                <div><strong class="order-total">{{number_format($cart ->total_price,0,',','.')}}
                                        VND</strong></div>
                            </div>
                        </div>
                        @if($cart ->total_price == 0)
                            <button type="submit" class="btn btn-primary order-submit " disabled>Order</button>
                        @else
                            <button type="submit" class="btn btn-primary order-submit ">Order</button>
                        @endif
                    </div>
                </div>
            </form>
            <!-- /Order Details -->

            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection