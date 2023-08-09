@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Add staff</h5>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.account.createStaff') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('username') }}">
                                @error('username')
                                <div id="emailHelp" class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('password')
                                    <div id="emailHelp" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Repeat Password</label>
                                    <input type="password" name="repeat_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('repeat_password')
                                    <div id="emailHelp" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Fullname</label>
                                <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('fullname') }}">
                                @error('fullname')
                                <div id="emailHelp" class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') }}">
                                    @error('email')
                                    <div id="emailHelp" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('phone') }}">
                                    @error('phone')
                                    <div id="emailHelp" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('address') }}">
                                @error('address')
                                <div id="emailHelp" class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Permission</label>
                                <div class="row">
                                    <div class="col-2">
                                        Account <br>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="showAccount">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Show</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="addAccount">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Add</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="updateAccount">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Update</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="deleteAccount">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Delete</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        Category <br>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="showCategory">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Show</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="addCategory">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Add</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="updateCategory"> 
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Update</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="deleteCategory">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Delete</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        Brand <br>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="showBrand">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Show</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="addBrand">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Add</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="updateBrand">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Update</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="deleteBrand">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Delete</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        Product <br>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="showProduct">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Show</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="addProduct">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Add</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="updateProduct">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Update</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="deleteProduct">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Delete</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        Banner <br>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="showBanner">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Show</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="addBanner">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Add</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="updateBanner">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Update</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="deleteBanner">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Delete</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        Voucher <br>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="showVoucher">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Show</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="addVoucher">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Add</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="updateVoucher">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Update</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="deleteVoucher">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Delete</label>
                                        </div>
                                    </div>
                                </div>
                                @error('role')
                                <div id="emailHelp" class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection