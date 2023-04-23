<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use App\Models\Carts;
use App\Models\CartsProduct;
Use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index(){
        // Cart::session(auth()->id());
        if(Auth::check()){
            Cart::session(Auth::id());
        }
        $ürünler = Cart::Getcontent();
        //return $ürünler;
        return view('sepet',compact('ürünler'));
    }

    public function ekle(Request $request){
        $ürün = Product::find($request->id);
        // Cart::session($ürün);
       
     
        // $cartItem= Cart::add($ürün->id,$ürün->ürün_adi,$ürün->fiyat,1);
        if(Auth::check()){
          
            Cart::session(Auth::id())->add($ürün->id,$ürün->ürün_adi,$ürün->fiyat,1)->associate('App\Models\Carts');
            // $cartItem = Cart::session(Auth::id())->get($id);
            $aktif_sepet_id = session('aktif_sepet_id');
            if(!isset($aktif_sepet_id)){
                $aktif_sepet= Carts::create([
                    'user_id' => auth()->id()
                ]); 
                
                $aktif_sepet_id = $aktif_sepet->id;
               
                session()->put('aktif_sepet_id', $aktif_sepet_id);
            }
            // $item = CartsProduct::where('cart_id',$aktif_sepet_id)->where('product_id', $cartItem->id)->get();
            $adet=Cart::session(Auth::id())->get($ürün->id);

            
            CartsProduct::updateOrCreate(
                ['cart_id' => $aktif_sepet_id, 'product_id' => $ürün->id],
                ['adet' => $adet->quantity, 'fiyati' => $ürün->fiyat, 'durum' => 'Beklemede']
               
            );

        }else {
            Cart::add($ürün->id,$ürün->ürün_adi,$ürün->fiyat,1);
        }
    
    


        return redirect()->route('sepet.index')
            ->with('message_type','succes')
            ->with('message','Ürün Sepete Eklendi');


    }

    public function kaldir($id){
        if (auth()->check()) {
            $aktif_sepet_id = session('aktif_sepet_id');
            $cartItem = Cart::session(Auth::id())->get($id);
        
            CartsProduct::where('cart_id', $aktif_sepet_id)->where('product_id', $cartItem->id)->delete();
            Cart::session(Auth::id())->remove($id);
        }else {
            Cart::remove($id);
        }
        
       

        return redirect()->route('sepet.index')
            ->with('mesaj_tur', 'success')
            ->with('mesaj', 'Ürün sepetten kaldırıldı.');
    }
    public function boşalt(){
        if (Auth::check()) {
            $aktif_sepet_id = session('aktif_sepet_id');
            CartsProduct::where('cart_id', $aktif_sepet_id)->delete();
            Cart::session(Auth::id())->clear();
        }else {
            Cart::clear();
        }
        
       

        return redirect()->route('sepet.index')
            ->with('mesaj_tur', 'success')
            ->with('mesaj', 'Sepet Boşaltıldı.');
    }

    public function azalt($id){
        
        
        if (Auth::check()) {
            
            $aktif_sepet_id = session('aktif_sepet_id');
            $cartItem = Cart::session(Auth::id())->get($id);

            // return $cartItem;
            $a =  $cartItem->quantity - 1;
            
     
            
            
            CartsProduct::where('cart_id', $aktif_sepet_id)->where('product_id', $cartItem->id)
            ->update(['adet' => $a]);

            Cart::session(Auth::id())->update($id, array(
                'quantity' => -1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
            ));;


          
          
                
        }else {
        //     Cart::update($id,[
        //       'quantity' => $request->value,
           
        // ]);
        $cartItem = Cart::get($id);

            // return $cartItem;
            $a =  $cartItem->quantity - 1;
     
            Cart::update($id, array(
                'quantity' => -1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
            ));

      }

      return redirect()->route('sepet.index')
            ->with('mesaj_tur', 'success')
            ->with('mesaj', 'Sepet Güncellendi.');



    }

    public function arttır($id){
        
        
        if (Auth::check()) {
            
            $aktif_sepet_id = session('aktif_sepet_id');
            $cartItem = Cart::session(Auth::id())->get($id);

            // return $cartItem;
            $a =  $cartItem->quantity + 1;
            
     
            
            
            CartsProduct::where('cart_id', $aktif_sepet_id)->where('product_id', $cartItem->id)
            ->update(['adet' => $a]);

            Cart::session(Auth::id())->update($id, array(
                'quantity' => +1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
            ));;


          
          
                
        }else {
        //     Cart::update($id,[
        //       'quantity' => $request->value,
           
        // ]);
        $cartItem = Cart::get($id);

            // return $cartItem;
            $a =  $cartItem->quantity - 1;
     
            Cart::update($id, array(
                'quantity' => +1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
            ));

      }

      return redirect()->route('sepet.index')
            ->with('mesaj_tur', 'success')
            ->with('mesaj', 'Sepet Güncellendi.');



    }

    public function guncelle($id, Request $request){
        // return $request;
        // Cart::update($id,[
        //     'quantity' => $request->value,
            
        // ]);

        if (Auth::check()) {
            
            $aktif_sepet_id = session('aktif_sepet_id');
            $cartItem = Cart::session(Auth::id())->get($id);
            
            
            CartsProduct::where('cart_id', $aktif_sepet_id)->where('product_id', $cartItem->id)
            ->update(['adet' => $request->adet + $cart_item->adet ]);
            Cart::update($id,[
                'quantity' => $request->adet,
                
            ]);
                
        }else {
             Cart::update($id,[
               'quantity' => $request->value,
            
         ]);
        }
        
        return redirect()->route('sepet.index')
            ->with('mesaj_tur', 'success')
            ->with('mesaj', 'Sepet Boşaltıldı.');
        
        
        session()->flash('mesaj_tur', 'success');
        session()->flash('mesaj', 'Adet bilgisi güncellendi');

   
        
        return response()->json(['success' => true]);
    }

    public function deneme(){
        if (Auth::check()) {
            
            return "başarılı";
        }
        else{
            return "başarısızz";
        }
    }

}
