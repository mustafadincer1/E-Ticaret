<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
Use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class ÖdemeController extends Controller
{
    public function index(){
       
        if (!auth()->check()) {
            return redirect()->route('giriş')
                ->with('mesaj_tur', 'info')
                ->with('mesaj', 'Ödeme işlemi için oturum açmanız veye kullanıcı kaydı yapmanız gerekmektedir.');
        } else if (count(Cart::session(Auth::id())->Getcontent()) == 0) {
            return redirect()->route('anasayfa')
                ->with('mesaj_tur', 'info')
                ->with('mesaj', 'Ödeme işlemi için sepetinizde bir ürün bulunmalıdır.');
        }
        
        $user_detail = Auth::user()->detail;

        
        
        return view('ödeme', compact('user_detail'));
    }

    public function ödemeyap(){
        $order = request()->all();
        $order['sepet_id'] = session('aktif_sepet_id');
        $order['banka'] = "Garanti";
        $order['taksit_sayisi'] = 1;
        $order['durum'] = "Siparişiniz alındı";
        $order['siparis_tutari'] = Cart::session(Auth::id())->Gettotal();
        
        Order::create($order);
        Cart::session(Auth::id())->clear();
        session()->forget('aktif_sepet_id');
        
        return redirect()->route('siparisler')
            ->with('mesaj_tur', 'success')
            ->with('mesaj', 'Ödemeniz başarılı bir şekilde gerçekleştirildi.');
    }


}
