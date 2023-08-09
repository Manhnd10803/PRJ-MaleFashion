<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function home(){
        $banners = Banner::get();
        $products = Product::orderByDesc('view')->limit(8)->get();
        $images = Image::all();
        //Lấy ra ảnh đầu tiên làm ảnh đại diện cho sản phẩm
        foreach($products as $product){
            foreach($images as $image){
                if($image->idProduct == $product->id){
                    $product->image = $image;
                    break;
                }
            }
        }
        return view('index', compact('banners', 'products'));
    }
    public function listProduct(){
        $categories = Category::get();
        $brands = Brand::get();
        $products = Product::get();
        $images = Image::all();
        //Lấy ra ảnh đầu tiên làm ảnh đại diện cho sản phẩm
        foreach($products as $product){
            foreach($images as $image){
                if($image->idProduct == $product->id){
                    $product->image = $image;
                    break;
                }
            }
        }
        return view('product.productList', compact('products', 'categories', 'brands'));
    }
    public function detailProduct($id){
        $product = Product::where('id', $id)->first(); 
        $product->load('size', 'category', 'brand');
        $images = Image::where('idProduct', $id)->get();
        $relatedProducts = Product::where('idCategory', $product->idCategory)->where('idBrand', $product->idBrand)->where('id', '<>', $product->id)->get();
        //gán ảnh
        foreach($relatedProducts as $relatedProduct ){
            $relatedProduct->srcImage = Image::where('idProduct', $relatedProduct->id)->first()->srcImage;
        }
        // dd($relatedProducts);
        //tăng lượt xem 
        Product::where('id', $id)->update(['view' => $product->view + 1]);
        return view('product.productDetail', compact('product', 'images', 'relatedProducts'));
    }
    public function listProductByCategory($id){
        $categories = Category::get();
        $brands = Brand::get();
        $products = Product::where('idCategory', $id)->get();
        $images = Image::all();
        //Lấy ra ảnh đầu tiên làm ảnh đại diện cho sản phẩm
        foreach($products as $product){
            foreach($images as $image){
                if($image->idProduct == $product->id){
                    $product->image = $image;
                    break;
                }
            }
        }
        return view('product.productList', compact('products', 'categories', 'brands'));
    }
    public function listProductByBrand($id){
        $categories = Category::get();
        $brands = Brand::get();
        $products = Product::where('idBrand', $id)->get();
        $images = Image::all();
        //Lấy ra ảnh đầu tiên làm ảnh đại diện cho sản phẩm
        foreach($products as $product){
            foreach($images as $image){
                if($image->idProduct == $product->id){
                    $product->image = $image;
                    break;
                }
            }
        }
        return view('product.productList', compact('products', 'categories', 'brands'));
    }
    public function searchProduct(Request $request){
        $categories = Category::get();
        $brands = Brand::get();
        $products = Product::where('name', 'like', '%'.$request->kyw.'%')->get();
        $images = Image::all();
        //Lấy ra ảnh đầu tiên làm ảnh đại diện cho sản phẩm
        foreach($products as $product){
            foreach($images as $image){
                if($image->idProduct == $product->id){
                    $product->image = $image;
                    break;
                }
            }
        }
        return view('product.productList', compact('products', 'categories', 'brands'));
    }
}
