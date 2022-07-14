@extends('layout.home-page')
@section('content')
    <section class="food_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center pt-5">
                <h2>
                    Our Menu
                </h2>
            </div>

            <div class="filters-content">
                <div class="row grid">
                    @foreach($data as $product)
                    <div class="col-sm-6 col-lg-4 all pizza">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img src="{{ $product->image }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        {{ $product->product_name }}
                                    </h5>
                                    <p>
                                        {{ $product->description }}
                                    </p>
                                    <div class="options">
                                        <h6>
                                           {{ number_format($product->price,0,',','.') }} VND
                                        </h6>
                                        <a href="{{route('cart.add',['id'=>$product->id])}}">
                                            <i class="fa-solid fa-cart-shopping text-white"></i>
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
    <!-- end food section -->
@endsection