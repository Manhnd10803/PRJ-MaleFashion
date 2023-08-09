@extends('layouts.appAdmin')
@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4 mt-5">Detail Order {{ $bill->id }}</h5>
                    <a href="{{ route('invoice', $bill->id) }}"><button type="submit" class="btn btn-success m-1">Invoice</button></a>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Orderer's name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Address</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Phone</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Pay</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Payment method</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $bill->user->fullname }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $bill->user->address }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $bill->user->phone }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">
                                            @if ($bill->pay == 1)
                                            Paid (${{ $bill->total }})
                                            @else
                                            Unpaid
                                            @endif
                                        </p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">
                                            @if ($bill->paymentMethod == 1)
                                            Payment via vnpay
                                            @elseif($bill->paymentMethod == 0)
                                            Payment on delivery
                                            @endif
                                        </p>
                                    </td>
                                    <form action="{{ route('bill.update', $bill->id) }}" method="post">
                                        @csrf
                                        @method('POST')
                                    <td class="border-bottom-0">
                                        <select name="status" id="" class="form-select">
                                            <option value="1">New orders</option>
                                            <option value="2">Orders are being packed</option>
                                            <option value="3">Order is being shipped</option>
                                            <option value="4">Order has been delivered</option>
                                            <option value="5">Delivery failed</option>
                                            <option value="6">Order has been cancelled</option>
                                        </select>
                                    </td>
                                    <td class="border-bottom-0" style="display: flex;">
                                        <button type="submit" class="btn btn-info m-1">Update</button>
                                    </form>
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0"></h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Product name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Image</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Price</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Quantity</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Size</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Total</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $stt = 1;
                                @endphp
                                @foreach ($carts as $cart)
                                <tr>
                                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $stt }}</h6></td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $cart->product->name }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <img src="{{ asset('storage/images/products/'.$cart->product->srcImage) }}" alt="" width="80" height="105">
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">${{ $cart->product->priceSale }} <del style="font-size: 12px">${{ $cart->product->price }}</del></p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $cart->qty }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $cart->size }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">${{ $cart->total }}</p>
                                    </td>
                                </tr> 
                                @php
                                    $stt++;
                                @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">Discounted</td>
                                    <td>${{ $totalBill - $bill->total }}</td>
                                </tr>
                                <tr>
                                    <th colspan="6">Total order</th>
                                    <th>${{ $bill->total }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection