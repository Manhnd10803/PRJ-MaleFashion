@extends('layouts.appAdmin')
@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4 mt-5">Product</h5>
                    @can('addProduct')
                    <a href="{{ route('product.create') }}"><button type="submit" class="btn btn-success m-1">Add</button></a>
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
                                <h6 class="fw-semibold mb-0">Image</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Quantity</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Size</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Price</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Category</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Brand</h6>
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
                            @foreach ($products as $product)
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $stt }}</h6></td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $product->name }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <img src="{{ asset('storage/images/products/'.$product->image->srcImage) }}" width="50" height="68" alt="">
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $product->number  }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $product->sizeShow }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">${{ $product->priceSale }} <del style="font-size: 12px">${{ $product->price }}</del></p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $product->category->name }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $product->brand->name }}</p>
                                </td>
                                <td class="border-bottom-0" style="display: flex;  padding-top:30px;">
                                    @if (is_null($product->deleted_at))
                                    @can('updateProduct')
                                    <a href="{{ route('product.edit', $product->id) }}"><button type="submit" class="btn btn-info m-1">Update</button></a>
                                    @endcan
                                    @can('deleteProduct')
                                    <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger m-1" onclick="return deleteConfirmation()">Delete</button>
                                    </form>
                                    @endcan
                                    @else
                                    @can('deleteProduct')
                                    <a href="{{ route('admin.product.restore', $product->id) }}"><button type="submit" class="btn btn-primary m-1">Restore</button></a>
                                    @endcan
                                    @endif
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