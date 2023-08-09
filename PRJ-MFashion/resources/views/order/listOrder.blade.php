@extends('layouts.app')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Order List</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="{{ route('viewCart') }}">Shopping Cart</a>
                            <span>Order List</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- List Order Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Total</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Pay</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__text">
                                            <p>{{ $order->id }}</p>
                                        </div>
                                    </td>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__text">
                                            <p>${{ $order->total }}</p>
                                        </div>
                                    </td>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__text">
                                            <p> @if ($order->paymentMethod == 1)
                                            Payment via vnpay
                                            @elseif($order->paymentMethod == 0)
                                            Payment on delivery
                                            @endif </p>
                                        </div>
                                    </td>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__text">
                                            <p>
                                            @if ($order->status == 1)
                                            New orders
                                            @elseif($order->status == 2)
                                            Orders are being packed
                                            @elseif($order->status == 3)
                                            Order is being shipped
                                            @elseif($order->status == 4)
                                            Order has been delivered
                                            @elseif($order->status == 5)
                                            Delivery failed
                                            @elseif($order->status == 6)
                                            Order has been cancelled
                                            @endif
                                            </p>
                                        </div>
                                    </td>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__text">
                                            <p>
                                                @if ($order->pay == 1)
                                                Paid
                                                @else
                                                Unpaid
                                                @endif
                                            </p>
                                        </div>
                                    </td>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__text">
                                            <a href="{{ route('detailOrder', $order->id) }}"><button type="button" class="primary-btn">Detail</button></a> 
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- List Order Section End -->
@endsection