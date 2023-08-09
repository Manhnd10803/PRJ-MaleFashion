@extends('layouts.appAdmin')
@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4 mt-5">Category</h5>
                    @can('addCategory')
                    <a href="{{ route('category.create') }}"><button type="submit" class="btn btn-success m-1">Add</button></a>
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
                                <h6 class="fw-semibold mb-0">Quantity</h6>
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
                            @foreach ($categories as $category)
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $stt }}</h6></td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $category->name }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $category->qty }}</p>
                                </td>
                                <td class="border-bottom-0" style="display: flex;">
                                    @if (is_null($category->deleted_at))
                                    @can('updateCategory')
                                    <a href="{{ route('category.edit', $category->id) }}"><button type="submit" class="btn btn-info m-1">Update</button></a>
                                    @endcan
                                    @can('deleteCategory')
                                    <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger m-1" onclick="return deleteConfirmation()">Delete</button>
                                    </form>
                                    @endcan
                                    @else
                                    @can('deleteCategory')
                                    <a href="{{ route('admin.category.restore', $category->id) }}"><button type="submit" class="btn btn-primary m-1">Restore</button></a>
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