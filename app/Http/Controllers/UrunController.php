<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class UrunController extends Controller
{
    public function index($slug){
        $products = Product::where('slug',$slug)->firstOrFail();
        return view ('ürün' ,compact('products'));
    }

    public function deneme(){
        $products = Product::find(1);
        $deneme=$products->detail;
        dd($deneme);
    }

    public function ara(Request $request){
        $arama = Product::where('ürün_adi','like','%'.$request.'%')->get();
        // $arama = DB::table('category')->where('slug','like','%'.$request.'%')
        // ->get();
        // return $request;
        $arama =Product::query();
        $deneme = $arama->where('slug','like','%'.$request ->ara.'%')
        ->orWhere('aciklama','like','%'.$request ->ara.'%')
        ->paginate(8);
        
       //dd($deneme);
        return view('arama',compact('deneme'));
    }
}
