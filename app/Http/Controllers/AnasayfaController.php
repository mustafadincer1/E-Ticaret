<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductDetail;
use App\Models\Product;

class AnasayfaController extends Controller
{
    public function index(){
        $categories = Category::whereRaw('üst_id is null')->get();
        $slider=ProductDetail::with('product')->where('show_slider',1)->take(5)->get();
        // return($slider->product());
        // return $slider;
        $slider = Product::select('product.*')
        ->join('product_detail', 'product_detail.product_id', 'product.id')
        ->where('product_detail.show_slider', 1)->take(5)->get();

        $opportunity =Product::select('product.*')
        ->join('product_detail', 'product_detail.product_id','product.id')
        ->where('product_detail.show_opportunity',1)->first();

        $featured =Product::select('product.*')
        ->join('product_detail', 'product_detail.product_id','product.id')
        ->where('product_detail.show_featured',1)->take(4)->get();
        
        $bestseller= Product::select('product.*')
        ->join('product_detail', 'product_detail.product_id','product.id')
        ->where('product_detail.show_bestseller',1)->take(4)->get();

        $discount=Product::select('product.*')
        ->join('product_detail', 'product_detail.product_id','product.id')
        ->where('product_detail.show_bestseller',1)->take(4)->get();

     

        return view('anasayfa',compact('categories','slider','opportunity','featured','bestseller'));
    }
}
