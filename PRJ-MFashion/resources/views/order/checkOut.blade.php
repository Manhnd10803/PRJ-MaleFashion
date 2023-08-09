@extends('layouts.app')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="{{ route('listProduct') }}">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="{{ route('discountCode') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="text" placeholder="Coupon code" name="code" value="@if(isset($voucher)){{ $voucher->code }}@endif" required>
                        <button type="submit">Apply</button>
                    </form>
                </div>
                <form action="{{ route('checkOut') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Name<span>*</span></p>
                                        <input type="text" name="name" value="{{ $user->fullname }}">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Apartment, suite, unite ect (optinal)" name="address" value="{{ $user->address }}">
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" value="{{ $user->phone }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span></span></p>
                                <input type="text"
                                placeholder="Notes about your order, e.g. special notes for delivery." name="note">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @foreach ($carts as $cart)
                                    <li>{{ $cart->product->name }} x{{ $cart->qty }}<span>$ {{ $cart->qty * $cart->product->priceSale }}</span></li>
                                    @endforeach
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Shipping <span>Free</span></li>
                                    <li>Discount <span>$@if(isset($voucher)){{ $voucher->value }} @else 0 @endif</span></li>
                                    <li>Total <span>$@if(isset($voucher)){{ $totalBill - $voucher->value }} <del style="font-size: 15px; color:black;">${{ $totalBill }}</del> @else {{ $totalBill }} @endif</span></li>
                                    <input type="hidden" name="total" value="@if(isset($voucher)){{ $totalBill - $voucher->value }} @else {{ $totalBill }} @endif">
                                </ul>
                                {{-- <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Payment on delivery
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        VNPay
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> --}}
                                <button type="submit" class="site-btn" name="redirect">PAY WITH VNPAY</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection