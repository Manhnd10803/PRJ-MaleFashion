@extends('layouts.appAdmin')
@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4 mt-5">Voucher</h5>
                    @can('addVoucher')
                    <a href="{{ route('voucher.create') }}"><button type="submit" class="btn btn-success m-1">Add</button></a>
                    @endcan
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"></h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Code</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Date Start</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Date End</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Number</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Value</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Action</h6>
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 1;
                            @endphp
                            @foreach ($vouchers as $voucher)
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $stt }}</h6></td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $voucher->name }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $voucher->code }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $voucher->dateStart }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $voucher->dateEnd }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $voucher->number }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">${{ $voucher->value }}</p>
                                </td>
                                <td class="border-bottom-0" style="display: flex;">
                                    @can('updateVoucher')
                                    <a href="{{ route('voucher.edit', $voucher->id) }}"><button type="submit" class="btn btn-info m-1">Update</button></a>
                                    @endcan
                                @can('deleteVoucher')
                                <form action="{{ route('voucher.destroy', $voucher->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger m-1" onclick="return deleteConfirmation()">Delete</button>
                                </form>
                                @endcan
                                </td>
                            </tr> 
                            @php
                                $stt++;
                            @endphp
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