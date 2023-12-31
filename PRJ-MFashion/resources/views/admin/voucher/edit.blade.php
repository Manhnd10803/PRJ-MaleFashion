@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Edit voucher</h5>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('voucher.update', $voucher->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $voucher->name }}">
                                    @error('name')
                                    <div id="emailHelp" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Code</label>
                                    <input type="text" name="code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $voucher->code }}">
                                    @error('code')
                                    <div id="emailHelp" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Date start</label>
                                    <input type="date" name="dateStart" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $voucher->dateStart }}" >
                                    @error('dateStart')
                                    <div id="emailHelp" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Date end</label>
                                    <input type="date" name="dateEnd" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $voucher->dateEnd }}" >
                                    @error('dateEnd')
                                    <div id="emailHelp" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Number</label>
                                    <input type="number" name="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $voucher->number }}" >
                                    @error('number')
                                    <div id="emailHelp" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Value</label>
                                    <input type="text" name="value" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $voucher->value }}">
                                    @error('value')
                                    <div id="emailHelp" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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