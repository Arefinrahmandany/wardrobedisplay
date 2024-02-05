@extends('Front.layout.app')

@section('main-content')



        <div class="container">

            <!-- Main Slider Start -->
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @forelse( $mainSlide as $data)
                    <div class="carousel-item active" data-bs-interval="2000">
                        <img src="{{ url('Photos/Slides/MainSlide/'.json_decode($data->slide_image)[0]) }}" alt="{{ $data->slide_title }}" class="d-block w-100" alt="...">
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <!-- Main Slider End -->
        </div>

{{--
        <!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-shield"></i>
                            <h2>Trusted Shopping</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-shopping-bag"></i>
                            <h2>Quality Product</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <h2>Worldwide Delivery</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-phone"></i>
                            <h2>Telephone Support</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End-->
--}}

{{--
        <!-- Category Start-->
        <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="category-img">
                            <img src="{{ url('Assets/Front/img/category-1.jpg') }}" />
                            <a class="category-name" href="">
                                <h2>Category Name</h2>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="category-img">
                            <img src="{{ url('Assets/Front/img/category-3.jpg') }}" />
                            <a class="category-name" href="">
                                <h2>Category Name</h2>
                            </a>
                        </div>
                        <div class="category-img">
                            <img src="{{ url('Assets/Front/img/category-4.jpg') }}" />
                            <a class="category-name" href="">
                                <h2>Category Name</h2>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="category-img">
                            <img src="{{ url('Assets/Front/img/category-2.jpg') }}" />
                            <a class="category-name" href="">
                                <h2>Category Name</h2>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End-->
--}}

        <!-- Featured Product Start -->
        <div class="featured-product">
            <div class="container">
                <div class="section-header" style="background-color: red;">
                    <h3>Featured Product</h3>
                </div>
                <div class="row align-items-center product-slider product-slider-4">

                    @forelse ( $product as $data )
                        <div class="col-lg-3">
                            <div class="product-item">
                                <div class="product-image">
                                    <a href="{{ route('product-detail.show',$data->id) }}">
                                        <img class="img-fluid" src="{{ url('Photos/Products/'.json_decode($data->product_photo)[0]) }}" alt="{{ $data->product_name }}">
                                    </a>
                                    <div class="product-action d-flex justify-content-center">
                                        <div>
                                            <a href="{{ route('cart.addCart',$data->id) }}"><i class="fa fa-cart-plus"></i></a>
                                        </div>
                                        <div>
                                            <a href="{{ route('cart.addCart',$data->id) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="title"><a href="#">{{ Illuminate\Support\Str::limit($data->product_name, $limit = 35, $end = '...') }}</a></div>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="price">&#2547;{{ $data->discount_price }} <span>&#2547;{{ $data->price }}</span></div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </div>
        <!-- Featured Product End -->



<div class="contaier">
    <div class="section-header" style="background-color: red;">
        <h3>Category</h3>
    </div>
</div>



        <!-- Recent Product Start -->
        <div class="recent-product">
            <div class="container">
                <div class="section-header" style="background-color: red;">
                    <h3>Recent Product</h3>
                    <p></p>
                </div>

                <div class="row align-items-center product-slider product-slider-4">

                    @forelse ( $product as $data )
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="{{ url('Photos/Products/'.json_decode($data->product_photo)[0]) }}" alt="{{ $data->product_name }}">
                                </a>
                                <div class="product-action">
                                    <a href="{{ route('cart.addCart',$data->id) }}"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="title"><a href="#">{{ Illuminate\Support\Str::limit($data->product_name, $limit = 35, $end = '...') }}</a></div>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price">&#2547;{{ $data->discount_price }} <span>&#2547;{{ $data->price }}</span></div>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </div>
        <!-- Recent Product End -->


        <!-- Brand Start -->
        <div class="brand">
            <div class="container">
                <div class="section-header">
                    <h3>Our Brands</h3>
                    <p></p>
                </div>
                <div class="brand-slider">
                    @foreach ( $brand as $brand_data )
                    <div class="brand-item"><img src="{{ url('Photos/Brand_logo/'.json_decode($brand_data->image)[0]) }}" alt="{{ $brand_data->brand_name }}" style="width: 100px; height: auto;"></div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Brand End -->





@endsection
