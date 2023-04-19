<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;





class Kategori_Controller extends Controller
{
    public function index($slug_category){
        $category = Category::where('slug',$slug_category)->firstorFail();
        $alt_category = Category::where('üst_id', $category->id)->get();
        $products = $category->products;
        // $a = \App\Models\Product::find(2)->categories()->get();

        // dd($products);
        // return $products;
        return view ('kategori', compact('category','alt_category','products'));
       
    }

    public function deneme(){
        $deneme = Category::get();
        $id = DB::table('category')->where('kategori_adi', 'Elektronik')->value('id');
        return $id;

    }
}
