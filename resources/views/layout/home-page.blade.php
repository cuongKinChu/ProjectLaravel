<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Site Metas -->
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>

    <meta name="author" content=""/>
    <link rel="shortcut icon" href="{{ asset('/homepage/images/favicon.png') }}" type="image/x-icon"/>


    <title>Bubble Tea</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('homepage/css/bootstrap.css') }}"/>

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <!-- nice select  -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
          integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
          crossorigin="anonymous"/>
    <!-- font awesome style -->
    <link href="{{ asset('fontawesome-free/css/all.css') }} " rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('homepage/css/style.css') }}" rel="stylesheet"/>
    <!-- responsive style -->
    <link href="{{ asset('homepage/css/responsive.css') }}" rel="stylesheet"/>

</head>

<body>
<!-- header section starts -->
<header class="header_section bg-dark">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
            <span>
              Bubble Tea
            </span>
            </a>
            <button class="btn btn-outline-warning" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                +
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mx-auto ">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('homepage.index') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <div class="user_option">
                    <a href="" class="user_link">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                    <a class="cart_link" href="{{ route('cart.index') }}">
                        <i class="fa-solid fa-cart-shopping text-white px-1"></i>
                        <span class="badge bg-warning text-white ">{{$cart ->total_quantity}}</span>
                    </a>
                    <form class="form-inline">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded" placeholder="Search"
                                   aria-label="Search" aria-describedby="search-addon"/>
                            <button class="input-group-text border-0 bg-warning" id="search-addon">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- end header section -->
<!-- food section -->

@yield('content');

<!-- footer section -->
<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer-col">
                <div class="footer_contact">
                    <h4>
                        Contact Us
                    </h4>
                    <div class="contact_link_box">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                  Location
                </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                  Call +01 1234567890
                </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                  demo@gmail.com
                </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 footer-col">
                <div class="footer_detail">
                    <a href="" class="footer-logo">
                        Bubble Tea
                    </a>
                    <p>
                        Necessary, making this the first true generator on the Internet. It uses a dictionary of
                        over 200 Latin words, combined with
                    </p>
                </div>
            </div>
            <div class="col-md-4 footer-col">
                <h4>
                    Opening Hours
                </h4>
                <p>
                    Everyday
                </p>
                <p>
                    10.00 Am -10.00 Pm
                </p>
            </div>
        </div>
        <div class="footer-info">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="https://html.design/">Free Html Templates</a>
            </p>
        </div>
    </div>
</footer>
<!-- footer section -->

<!-- jQuery -->
<script src="{{ asset('homepage/js/jquery-3.4.1.min.js') }}"></script>
<!-- popper js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<!-- bootstrap js -->
<script src="{{ asset('homepage/js/bootstrap.js') }}"></script>
<!-- owl slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<!-- isotope js -->
<script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
<!-- nice select -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<!-- custom js -->
<script src="{{ asset('homepage/js/custom.js') }}"></script>
</div>
</body>

</html>
