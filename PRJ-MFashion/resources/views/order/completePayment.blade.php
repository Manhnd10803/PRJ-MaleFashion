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
                            <span>Complete Check Out</span>
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
            <h2 class="text-center">Thank you</h2>
            <br>
            <h3>Payment success</h3>
            <h4>Your order will be delivered to you within 1-2 days</h4>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection