@extends('layouts.app')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Order Details</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="{{ route('listOrder') }}">Order List</a>
                            <span>Order Details</span>
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
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__text">
                                            <p>{{ $order->id }}</p>
                                        </div>
                                    </td>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__text">
                                            <p>{{ $user->fullname }}</p>
                                        </div>
                                    </td>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__text">
                                            <p>{{ $user->phone }}</p>
                                        </div>
                                    </td>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__text">
                                            <p>{{ $user->address }}</p>
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <h3>List product</h3><br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $stt = 1;
                                @endphp
                                @foreach ($products as $product)
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__text">
                                            <p>{{ $stt }}</p>
                                        </div>
                                    </td>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{ asset('storage/images/products/'.$product->product->srcImage) }}" alt="" width="80">
                                        </div>
                                    </td>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__text">
                                            <p>{{ $product->product->name }}</p>
                                        </div>
                                    </td>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__text">
                                            <p>${{ $product->product->priceSale }} <del style="font-size: 15px" class="text-danger"> ${{ $product->product->price }}</del></p>
                                        </div>
                                    </td>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__text">
                                            <p>{{ $product->qty }}</p>
                                        </div>
                                    </td>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__text">
                                            <p>{{ $product->size }}</p>
                                        </div>
                                    </td>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__text">
                                            <p>${{ $product->product->priceSale * $product->qty }}</p>
                                        </div>
                                    </td>
                                    @php
                                        $stt++;
                                    @endphp
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