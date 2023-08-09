@extends('layouts.app')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="{{ route('listProduct') }}">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            @if (isset($carts[0]->id))
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('updateCart') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    @foreach ($carts as $cart)
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="{{ asset('storage/images/products/'.$cart->product->srcImage) }}" alt="" width="80">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $cart->product->name }}</h6>
                                            <h5>${{ $cart->product->priceSale }} <del style="font-size: 15px" class="text-danger"> ${{ $cart->product->price }}</del></h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input type="text" value="{{ $cart->qty }}" name="{{ $cart->id }}" min="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">{{ $cart->size }}</td>
                                    <td class="cart__price">$ {{ $cart->total }}</td>
                                    <td class="cart__close"><a href="{{ route('deleteInCart', $cart->id) }}"><i class="fa fa-close"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{ route('listProduct') }}">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <button type="submit">Update cart</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{-- <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="{{ route('discountCode') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="text" placeholder="Coupon code" name="code" value="@if(isset($voucher)){{ $voucher->code }}@endif" required>
                            <button type="submit">Apply</button>
                        </form>
                    </div> --}}
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Shipping <span>Free</span></li>
                            <li>Total <span>$@if(isset($voucher)){{ $totalBill - $voucher->value }} <del style="font-size: 15px; color:black;">${{ $totalBill }}</del> @else {{ $totalBill }} @endif</span></li>
                        </ul>
                        <a href="{{ route('checkOut') }}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
            @else
            <h3>You do not have any products in your cart</h3>
            @endif
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection