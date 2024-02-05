@extends('Front.layout.app')
@section('main-content')


        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->


        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @forelse( $cart_data as $data )
                                    <tr>
                                        <td class="col-md-2"><a href="#"><img src="{{ url('Photos/Products/'.json_decode($data->product->product_photo)[0]) }}" alt="Image"></a></td>
                                        <td class="col-md-4"><a href="#">{{ $data->product->product_name }}</a></td>
                                        <td class="col-md-2">
                                            @if ($data->product->discount_price == false)
                                            &#2547; {{ $data->product->price }}
                                            @else
                                            &#2547;{{ $data->product->discount_price }}
                                            @endif
                                        </td>
                                        <td class="col-md-2">
                                            <div class="row qty d-flex justify-content-center">
                                                <div class="col-md-2">
                                                    <a href="{{ route('cart.minusQuantity',$data->id) }}"><i class="fa fa-minus"></i></a>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="quantity" value="{{ $data->quantity }}">
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="{{ route('cart.addQuantity',$data->id) }}"><i class="fa fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-md-2">
                                            &#2547; {{ $data->quantity * ($data->product->discount_price ?: $data->product->price) }}
                                        </td>
                                        <td>
                                            <form method="post" action="{{ route('cart.destroy',$data->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="coupon">
                            <input type="text" placeholder="Coupon Code">
                            <button>Apply Code</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-summary">
                            <div class="cart-content">
                                <h3>Cart Summary</h3>
                                <p>Sub Total<span>&#2547; {{ $subtotal }}</span></p>
                            </div>
                            <div class="cart-btn d-flex justify-between m-1">
                                <div class="m-1">
                                    <a class="btn btn-lg btn-outline-primary" href="{{ route('home.index') }}">Back To Shopping</a>
                                </div>
                                <div class="m-1">
                                    <a class="btn btn-lg btn-outline-primary" href="{{ route('checkout.index') }}">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->

@endsection
