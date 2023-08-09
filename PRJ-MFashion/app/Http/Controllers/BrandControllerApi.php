<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;

class BrandControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        if($brands){
            return response([
                'data' => $brands,
                'status_code' => 200,
                'message' => 'ok',
            ]);
        }
        return response([
            'data' => null,
            'status_code' => 404,
            'message' => 'data not found'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
        ]);
        if($validator->fails()){
            $arr = [
                'success' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors()
            ];
            return response()->json($arr, 200);
        }
        $brand = Brand::create($input);
        $arr = [
            'status' => true,
            'message' => 'Đã thêm brand thành công',
            'data' => $brand
        ];
        return response()->json($arr, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        if($brand){
            return response([
                'data' => $brand,
                'status_code' => 200,
                'message' => 'ok'
            ]);
        }
        return response([
            'data' => null,
            'status_code' => 404,
            'message' => 'Brand not found'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
        ]);
        if($validator->fails()){
            $arr = [
                'success' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors()
            ];
            return response()->json($arr, 200);
        }
        $brand->update($input);
        $arr = [
            'status' => true,
            'message' => 'Đã cập nhật brand thành công',
            'data' => $brand
        ];
        return response()->json($arr, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return response([
            'status' => true,
            'message' => 'Đã xóa brand thành công',
        ], 200);
    }
}
