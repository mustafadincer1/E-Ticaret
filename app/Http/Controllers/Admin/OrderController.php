<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $tmp = Order::orderByDesc('olusturma_tarihi')->paginate(7);
         return view('admin.sipariş.index',compact('tmp'));
    }
    public function edit($id){
        $order = Order::find($id);
        $order->update([
            'durum' => "Onaylandı"
        ]);
        return redirect()->route('admin.sipariş')
            ->with('message','Sipariş Güncellendi')
            ->with('message_type','success');
    }
    public function delete($id){
        Order::Destroy($id);
        return redirect()->route('admin.sipariş')
            ->with('message','Sipariş Silindi')
            ->with('message_type','success');

    }
}
