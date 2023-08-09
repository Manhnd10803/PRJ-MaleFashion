@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Add account</h5>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('account.store') }}" method="post">
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
                                <label for="exampleInputEmail1" class="form-label">Role</label>
                                <select name="role" id="" class="form-select">
                                    <option value="0" @selected(old('role') == 0)>Khách hàng</option>
                                </select>
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