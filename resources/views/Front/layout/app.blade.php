@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\Front\Cart\CartController;
    use App\Models\Cart;
    $user = Auth::guard('user')->user();
    if ($user) {
        $user_id = $user->id;
        $total = Cart::where('user_id', $user_id)->count();
    } else {
        $total = 0;
    }
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Wardrobe Display</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap Ecommerce Template" name="keywords">
        <meta content="Bootstrap Ecommerce Template Free Download" name="description">

        <!-- Favicon -->
        <link href="{{ asset('Assets/Front/img/logo.png') }}" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{ asset('Assets/Front/lib/slick/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('Assets/Front/lib/slick/slick-theme.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('Assets/Front/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('Assets/Front/css/main.css') }}" rel="stylesheet">
    </head>

    <body>
        <!-- Top Header Start -->
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="logo">
                            <a href="{{ route('home.index') }}">
                                WARDROBE DISPLAY
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <div class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account</a>
                                <div class="dropdown-menu">
                                    @auth('user')
                                    <ul style="list-style: none">
                                        <li><a class="nav-link" href="{{ route('register.show', Auth::guard('user')->user()->id) }}"><b>{{ Auth::guard('user')->user()->fName  }}</b></a></li>
                                        <li><a class="nav-link" href="{{ route('user.logout') }}">Logout</a></li>
                                    @else
                                        <li class="menu-item"><a title="Login" href="{{ route('admin.login.form') }}">Login/Registration</a></li>
                                    @endauth
                                    </ul>
                                </div>

                            </div>
                            <div class="cart">
                                <a href="{{ route('cart.index') }}"><i class="fa fa-cart-plus"></i><span>{{ $total }}</span></a>
                            </div>
                            <div class="cart">
                                <a href="{{ route('cart.index') }}"><i class="fa fa-heart-o"></i><span>{{ $total }}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Header End -->


        <!-- Header Start -->
        <div class="header">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav m-auto">
                            <a href="{{ route('home.index') }}" class="nav-item nav-link active">Home</a>
                            <a href="{{ route('home.all-products') }}" class="nav-item nav-link">Products</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                                <div class="dropdown-menu">
                                    <a href="product-list.html" class="dropdown-item">Gents</a>
                                    <a href="product-detail.html" class="dropdown-item">Women's</a>
                                    <a href="cart.html" class="dropdown-item">Babys</a>
                                    <a href="cart.html" class="dropdown-item">Calculetor</a>
                                    <a href="cart.html" class="dropdown-item">Table Watch</a>
                                    <a href="cart.html" class="dropdown-item">Wall Clock's</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Header End -->

        @section('main-content')



        @show




        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h1>WARDROBE DISPLAY</h1>
                            <p>
                                At WARDROBE DISPLAY, we are more than just a watch retailer — we're your style companion, your fashion statement, and your timepiece curator. Step into a world where elegance meets functionality, where every tick of the clock is a reminder of your unique style.
                            </p>
                        </div>
                    </div>

                    <!-- Newsletter Start -->
                    <div class="col-lg-3 col-md-6">
                        <div class="newsletter">
                                <div class="section-header">
                                    <h3>Subscribe Our Newsletter</h3>
                                    <p></p>
                                </div>
                                <div class="form">
                                    <input type="email" value="Your email here">
                                    <button>Submit</button>
                                </div>
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Quick Links</h3>
                            <ul>
                                <li><a href="{{ route('home.all-products') }}">Product</a></li>
                                <li><a href="{{ route('cart.index') }}">Cart</a></li>
                                <li><a href="{{ route('Privacy-Policy.show') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('admin.login.form') }}">Login & Register</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="{{ route('contact.formShow') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Get in Touch</h3>
                            <div class="contact-info">
                                <p><i class="fa fa-envelope"></i>wardrobedisplay.og@gmail.com</p>
                                <p><i class="fa fa-phone"></i>+880-151-1369287</p>
                                <div class="social">
                                    <a href="{{ url('https://www.facebook.com/wardrobedisplay.bd/') }}"><i class="fa fa-facebook"></i></a>
                                    <a href="{{ url('https://www.instagram.com/wardrobedisplay?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==') }}"><i class="fa fa-instagram"></i></a>
                                    <a href="{{ url('https://www.youtube.com/channel/UCBUhY8FTfob9H8xREfnkuTQ') }}"><i class="fa fa-youtube"></i></a>
                                    <a href="{{ url('https://wa.me/+8801511369287') }}"><i class="fa fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row payment">
                    <div class="col-md-6">
                        <div class="payment-method">
                            <p>We Accept:</p>
                            <img src="{{ url('Assets/Front/img/payment-method.png') }}" alt="Payment Method" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-security">
                            <p>Secured By:</p>
                            <img src="{{ url('Assets/Front/img/godaddy.svg') }}" alt="Payment Security" />
                            <img src="{{ url('Assets/Front/img/norton.svg') }}" alt="Payment Security" />
                            <img src="{{ url('Assets/Front/img/ssl.svg') }}" alt="Payment Security" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="{{ url('https://www.linkedin.com/in/md-arefin-rahman-939136154/') }}">AREFIN RAHMAN</a>. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->


        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('Assets/Front/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('Assets/Front/lib/slick/slick.min.js') }}"></script>


        <!-- Template Javascript -->
        <script src="{{ asset('Assets/Front/js/main.js') }}"></script>
    </body>
</html>
