@extends('Front.layout.app')

@section('main-content')


        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">product details</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->


        <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row align-items-center product-detail-top">
                            <div class="col-md-5">
                                <div class="product-slider-single">
                                    @forelse (json_decode($product->product_photo) as $image)
                                        <img src="{{ url('Photos/Products/' . $image) }}" alt="Product Image">
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="product-content">
                                    <div class="title"><h2>{{ $product->product_name }}</h2></div>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="price">&#2547;{{ $product->discount_price }} <span>&#2547;{{ $product->price }}</span></div>
                                    <div class="details">
                                        <p>{{ $product->highlight }}</p>
                                    </div>

                                    <div class="quantity">
                                        <h4>Quantity:</h4>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="action">
                                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active"><br>
                                        <h4>Product description</h4>
                                        <p>{{ $product->description }}</p>
                                    </div>
                                    <div id="specification" class="container tab-pane fade"><br>
                                        <h4>Product specification</h4>
                                        <ul>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                        </ul>
                                    </div>
                                    <div id="reviews" class="container tab-pane fade"><br>
                                        <div class="reviews-submitted">
                                            <div class="reviewer">Phasellus Gravida - <span>01 Jan 2020</span></div>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>
                                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                                            </p>
                                        </div>
                                        <div class="reviews-submit">
                                            <h4>Give your Review:</h4>
                                            <div class="ratting">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="row form">
                                                <div class="col-sm-6">
                                                    <input type="text" placeholder="Name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="email" placeholder="Email">
                                                </div>
                                                <div class="col-sm-12">
                                                    <textarea placeholder="Review"></textarea>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button>Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="section-header">
                                <h3>Related Products</h3>
                                <p></p>
                            </div>
                        </div>

                        <div class="row align-items-center product-slider product-slider-3">

                            @forelse( $all_products as $data)
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="{{ route('product-detail.show',$data->id) }}">
                                            <img src="{{ url('Photos/Products/'.json_decode($data->product_photo)[0]) }}" alt="{{ $data->product_name }}">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="title"><a href="#">{{ $data->product_name }}</a></div>
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

                    <div class="col-lg-3">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <ul>
                                <li><a href="#"></a><span>(83)</span></li>
                            </ul>
                        </div>

                        <div class="sidebar-widget image">
                            <h2 class="title">Featured Product</h2>
                            <a href="#">
                                <img src="img/category-1.jpg" alt="Image">
                            </a>
                        </div>

                        <div class="sidebar-widget brands">
                            <h2 class="title">Our Brands</h2>
                            <ul>
                                @forelse ($brand_data as $data)
                                    @php
                                        $brandName = $data->brand_name;
                                        $totalProducts = isset($total_products_in_brand[$brandName]) ? $total_products_in_brand[$brandName] : 0;
                                    @endphp
                                    <li>
                                        <a href="#">{{ $brandName }}</a>
                                        <span>({{ $totalProducts }})</span>
                                    </li>
                                @empty
                                    {{-- Handle the case where there are no brands --}}
                                @endforelse
                            </ul>
                        </div>

                        <div class="sidebar-widget tag">
                            <h2 class="title">Tags Cloud</h2>
                            <a href="#">Lorem ipsum</a>
                            <a href="#">Vivamus</a>
                            <a href="#">Phasellus</a>
                            <a href="#">pulvinar</a>
                            <a href="#">Curabitur</a>
                            <a href="#">Fusce</a>
                            <a href="#">Sem quis</a>
                            <a href="#">Mollis metus</a>
                            <a href="#">Sit amet</a>
                            <a href="#">Vel posuere</a>
                            <a href="#">orci luctus</a>
                            <a href="#">Nam lorem</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Detail End -->


@endsection
