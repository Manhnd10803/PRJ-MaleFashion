@extends('layouts.appAdmin')
@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4 mt-5">Banner</h5>
                    @can('addBanner')
                    <a href="{{ route('banner.create') }}"><button type="submit" class="btn btn-success m-1">Add</button></a>
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
                                <h6 class="fw-semibold mb-0">Action</h6>
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 1;
                            @endphp
                            @foreach ($banners as $banner)
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $stt }}</h6></td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $banner->name }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <img src="{{ asset('storage/images/banners/'.$banner->srcImage) }}" width="60" alt="">
                                </td>
                                <td class="border-bottom-0" style="display: flex;">
                                    @can('updateBanner')
                                    <a href="{{ route('banner.edit', $banner->id) }}"><button type="submit" class="btn btn-info m-1">Update</button></a>
                                    @endcan
                                    @can('deleteBanner')
                                    <form action="{{ route('banner.destroy', $banner->id) }}" method="post">
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