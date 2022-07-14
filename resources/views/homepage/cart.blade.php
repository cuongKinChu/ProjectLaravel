@extends('layout.home-page')
@section('content')
    <div id="breadcrumb" class="section ">
        <!-- container -->
        <div class="container-fluid about py-5 ">
            <div class="container">
                <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                    <h2 class="text-primary font-secondary">Kiểm tra & Thanh toán</h2>
                    <h1 class="display-4 text-uppercase">Giỏ Hàng Của Bạn</h1>
                </div>
            </div>
            <!-- /container -->
        </div>
        <!-- /BREADCRUMB -->
        <div class="container">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th style="width:10%">STT</th>
                    <th style="width:10%">Ảnh sản phẩm</th>
                    <th style="width:25%">Tên sản phẩm</th>
                    <th style="width:15%">Giá</th>
                    <th style="width:10%">Số lượng</th>
                    <th style="width:15%">Tổng Tiền</th>
                    <th style="width:10%">Thao Tác</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection