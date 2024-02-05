@extends('Front.layout.app')
@section('main-content')



        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->


        <!-- Checkout Start -->
        <div class="checkout">
            <div class="container">
                <form method="post" action="{{ route('checkout.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-7">
                            <div class="billing-address">
                                <h2>Billing Address</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control" type="text" name="fName" value="{{ $user->fName }}" placeholder="Name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" name="email" value="{{ $user->email }}" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control" type="text" name="cell" value="{{ $user->cell }}" placeholder="Mobile No" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <input class="form-control" type="text" name="address" value="{{ $user->address }}" placeholder="Address" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="checkout-summary">
                                <h2>Cart Total</h2>
                                <div class="checkout-content">
                                    <table class="table-hover">
                                        <thead>
                                            <tr></tr>
                                            <tr><h3>Products</h3></tr>
                                            <tr></tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $totalPrice = 0;
                                            @endphp
                                            @foreach( $cart_data as $data )
                                            <tr>
                                                <td class="text-light text-center">{{ $data->quantity }}</td>
                                                <td class="text-light">
                                                    {{ $data->product->product_name }}</td>
                                                <td class="text-light">
                                                    @if ($data->product->discount_price == false)
                                                    &#2547; {{ $data->product->price * $data->quantity }}
                                                    @php
                                                        $totalPrice += $data->product->price * $data->quantity;
                                                    @endphp
                                                    @else
                                                    &#2547;{{ $data->product->discount_price * $data->quantity }}
                                                    @php
                                                        $totalPrice += $data->product->discount_price * $data->quantity ;
                                                    @endphp
                                                    @endif
                                                    <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <p class="sub-total">Sub Total<span>&#2547;{{ $totalPrice }}</span></p>
                                    @php
                                        $shippingCost = (stripos($user->address, 'Dhaka') !== false) ? 80 : 130;
                                    @endphp
                                    <input type="hidden" name="shippingCost" value="{{ $shippingCost }}">
                                    <p class="ship-cost">Shipping Cost<span>&#2547;{{ $shippingCost }}</span></p>
                                    <h4>Grand Total<span>&#2547;{{ $totalPrice + $shippingCost }}</span></h4>
                                    <input type="hidden" name="grandTotal" value="{{ $totalPrice + $shippingCost }}">
                                </div>
                            </div>

                            <div class="checkout-payment">
                                <h2>Payment Methods</h2>
                                <div class="payment-methods">
                                <!--
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-1" name="payment">
                                            <label class="custom-control-label" for="payment-1">Paypal</label>
                                        </div>
                                        <div class="payment-content" id="payment-1-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-2" name="payment">
                                            <label class="custom-control-label" for="payment-2">Payoneer</label>
                                        </div>
                                        <div class="payment-content" id="payment-2-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-3" name="payment">
                                            <label class="custom-control-label" for="payment-3">Check Payment</label>
                                        </div>
                                        <div class="payment-content" id="payment-3-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-4" name="payment">
                                            <label class="custom-control-label" for="payment-4">Direct Bank Transfer</label>
                                        </div>
                                        <div class="payment-content" id="payment-4-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                -->
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-5" name="payment" value="cod">
                                            <label class="custom-control-label" for="payment-5">Cash on Delivery</label>
                                        </div>
                                        <div class="payment-content" id="payment-5-show">
                                            <p>
                                                Thank You!!!<br>
                                                You will get your product with in 3/4 Days !!!
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="products" value="{{ json_encode($cart_data) }}">
                                <div class="checkout-btn">
                                    <button type="submit">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- Checkout End -->


@endsection
