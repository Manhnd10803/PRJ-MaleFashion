@extends('layouts.appAdmin')
@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4 mt-5">Order</h5>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">ID</h6>
                                </th>
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
                                    <h6 class="fw-semibold mb-0">Total</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Pay</h6>
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
                            @foreach ($bills as $bill)
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $bill->id }}</h6></td>
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
                                    <p class="mb-0 fw-normal">${{ $bill->total }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">
                                        @if ($bill->pay == 1)
                                        Paid
                                        @else
                                        Unpaid
                                        @endif
                                    </p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">
                                        @if ($bill->status == 1)
                                        New orders
                                        @elseif($bill->status == 2)
                                        Orders are being packed
                                        @elseif($bill->status == 3)
                                        Order is being shipped
                                        @elseif($bill->status == 4)
                                        Order has been delivered
                                        @elseif($bill->status == 5)
                                        Delivery failed
                                        @elseif($bill->status == 6)
                                        Order has been cancelled
                                        @endif
                                    </p>
                                </td>
                                <td class="border-bottom-0" style="display: flex;">
                                    <a href="{{ route('bill.detail', $bill->id) }}"><button type="submit" class="btn btn-info m-1">Detail</button></a>
                                    <a href="{{ route('invoice', $bill->id) }}"><button type="submit" class="btn btn-success m-1">Invoice</button></a>
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection