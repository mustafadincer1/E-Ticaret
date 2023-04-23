<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $tmp = Product::orderByDesc('olusturma_tarihi')->paginate(7);
        return view('admin.ürün.index',compact('tmp'));
    }

    public function edit($id){
        $product = Product::find($id);
        $kategoriler = Category::all();

        return view('admin.ürün.edit',compact('product','kategoriler'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'ürün_adi' => 'required',
            'aciklama' => 'required',
            'slug' => 'required',
            'fiyat'=> 'required'

        ]);
     
        $product = Product::find($id);
        
 
        $product->update(['ürün_adi' => $request->ürün_adi,'slug' => $request->slug,
        'aciklama' => $request->aciklama,'fiyat'=>$request->fiyat]);

        $ProductDetail = ProductDetail::where('product_id',$id);
        if($request->has('show_slider')){
            $data['show_slider'] = 1;
        }
        else{
            $data['show_slider'] = 0;
        
        }
        if($request->has('show_opportunity')){
            $data['show_opportunity'] = 1;
        }
        else{
            $data['show_opportunity'] = 0;
        
        }
        if($request->has('show_featured')){
            $data['show_featured'] = 1;
        }
        else{
            $data['show_featured'] = 0;
        
        }
        if($request->has('show_bestseller')){
            $data['show_bestseller'] = 1;
        }
        else{
            $data['show_bestseller'] = 0;
        
        }
        if($request->has('show_discount')){
            $data['show_discount'] = 1;
        }
        else{
            $data['show_discount'] = 0;
        
        }
        

        $ProductDetail->update([
            'show_slider' =>  $data['show_slider'],'show_opportunity' => $data['show_opportunity'],
            'show_featured' => $data['show_featured'],'show_bestseller' => $data['show_bestseller'],
            'show_discount' => $data['show_discount']
        ]);
        $product->categories()->attach($request->kategoriler);
        if($request->has('ürün_resmi')){
            $request->validate([
                'ürün_resmi' => 'image|mimes:png,jpg,jpeg,gif|max:2048'
    
            ]);
            $ürün_resmi = $request->ürün_resmi;
            $dosya_adi = $product->id."-".time().".".$ürün_resmi->extension();
            if($ürün_resmi->isValid()){
                $ürün_resmi->move('upload/ürünler',$dosya_adi);
                $ProductDetail->update([
                    'ürün_resmi'=>$dosya_adi
                
                ]);
            }
        }

        return redirect()->route('admin.ürün.edit',$id)
            ->with('message','Ürün Güncellendi')
            ->with('message_type','success');
    }
    public function add(){
        $kategoriler = Category::all();
        return view('admin.ürün.add',compact('kategoriler'));

    }
    
    public function save(Request $request){
        $request->validate([
            'ürün_adi' => 'required',
            'aciklama' => 'required',
            'slug' => 'required',
            'fiyat'=> 'required'

        ]);
        $Product= Product::create([
            'ürün_adi' => $request->ürün_adi,'slug' => $request->slug,
            'aciklama' => $request->aciklama,'fiyat'=>$request->fiyat

        ]);
        if($request->has('show_slider')){
            $data['show_slider'] = 1;
        }
        else{
            $data['show_slider'] = 0;
        
        }
        if($request->has('show_opportunity')){
            $data['show_opportunity'] = 1;
        }
        else{
            $data['show_opportunity'] = 0;
        
        }
        if($request->has('show_featured')){
            $data['show_featured'] = 1;
        }
        else{
            $data['show_featured'] = 0;
        
        }
        if($request->has('show_bestseller')){
            $data['show_bestseller'] = 1;
        }
        else{
            $data['show_bestseller'] = 0;
        
        }
        if($request->has('show_discount')){
            $data['show_discount'] = 1;
        }
        else{
            $data['show_discount'] = 0;
        
        }
        //$Product->detail()->create($data);
        $Product->detail()->create([
            'show_slider' =>  $data['show_slider'],'show_opportunity' => $data['show_opportunity'],
            'show_featured' => $data['show_featured'],'show_bestseller' => $data['show_bestseller'],
            'show_discount' => $data['show_discount']
        ]);
        $Product->categories()->attach($request->kategoriler);

        if($request->has('ürün_resmi')){
            $request->validate([
                'ürün_resmi' => 'image|mimes:png,jpg,jpeg,gif|max:2048'
    
            ]);
            $ürün_resmi = $request->ürün_resmi;
            $dosya_adi = $product->id."-".time().".".$ürün_resmi->extension();
            if($ürün_resmi->isValid()){
                $ürün_resmi->move('upload/ürünler',$dosya_adi);
                $ProductDetail->update([
                    'ürün_resmi'=>$dosya_adi
                
                ]);
            }
        }


        return redirect()->route('admin.ürün')
            ->with('message','Ürün Eklendi')
            ->with('message_type','success');


    }

    public function delete($id){
        $product = Product::find($id);
        $product->categories()->detach();
        $product->detail()->delete();
        $product->delete();
        return redirect()->route('admin.ürün')
            ->with('message','Ürün Silindi')
            ->with('message_type','success');
    }


}
