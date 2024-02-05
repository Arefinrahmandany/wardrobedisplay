@extends('Front.layout.app')

@section('main-content')
@php
    use Illuminate\Support\Str;
@endphp

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">product list</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->


        <!-- Product List Start -->
        <div class="product-view">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="product-search">
                                            <form method="GET" action="{{ route('home.all-products') }}">
                                                <div class="row d-flex">
                                                    <div class="col-md-5">
                                                        <input type="text" name="search" placeholder="Search" value="{{ $searchQuery }}">
                                                        <button type="submit"><i class="fa fa-search"></i></button>
                                                    </div>
                                                    <div class="col-md-4">
                                                        @if($searchQuery || $sortBy)
                                                            <a href="{{ route('home.all-products') }}" class="btn btn-outline-secondary">Clear All</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="product-short">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Product short by: {{ ucfirst($sortBy) }}</a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{ route('home.all-products', ['sort_by' => 'newest']) }}" class="dropdown-item {{ $sortBy === 'newest' ? 'active' : '' }}">Newest</a>
                                                    <a href="{{ route('home.all-products', ['sort_by' => 'popular']) }}" class="dropdown-item {{ $sortBy === 'popular' ? 'active' : '' }}">Popular</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @forelse( $all_products as $data )
                            <div class="col-sm-3">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="{{ route('product-detail.show',$data->id) }}">
                                            <img src="{{ url('Photos/Products/'.json_decode($data->product_photo)[0]) }}" alt="{{ $data->product_name }}" class="img-fluid">
                                        </a>
                                        <div class="product-action">
                                            <a href="{{ route('cart.addCart',$data->id) }}"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="title"><a href="{{ route('product-detail.show',$data->id) }}">{{ Illuminate\Support\Str::limit($data->product_name, $limit = 35, $end = '...') }}</a></div>
                                        <div class="price">&#2547;{{ $data->discount_price }} <span>&#2547;{{ $data->price }}</span></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse

                        </div>

                        <div class="col-lg-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>



                    <div class="col-md-3">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('home.all-products', ['category' => $category]) }}">{{ $category }}</a>
                                        <span>({{ $categoryCounts[$category] ?? 0 }})</span>
                                    </li>
                                @endforeach
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
                        <!--
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
                        -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Product List End -->



@endsection
