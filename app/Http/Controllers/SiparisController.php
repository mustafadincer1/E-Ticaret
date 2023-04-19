<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class SiparisController extends Controller
{

    
    public function index(){
            $siparisler = Order::with('cart')->orderByDesc('olusturma_tarihi')->get();
            
            // dd ( $siparisler->carts->carts_product_adet());
            
            return view('siparisler' , compact('siparisler'));
        }
    

    public function show($id){
        return view('siparis_detay');
    }

}
