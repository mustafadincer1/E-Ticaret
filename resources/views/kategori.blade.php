@extends('layouts.master')
@section('tittle', $category->kategori_adi)

@section('content')

<div class="container">
    <ol class="breadcrumb">
       <li><a href="{{route('anasayfa')}}">Anasayfa</a></li>
       <li><a href="#">{{$category->kategori_adi}}</a></li>
       
   </ol>
   <div class="row">
       <div class="col-md-3">
           <div class="panel panel-default">
               <div class="panel-heading">{{$category->kategori_adi}}</div>
               <div class="panel-body">
                   <h3>Alt Kategoriler</h3>
                   <div class="list-group categories">
                        @foreach ($alt_category as $alt)
                            
                        
                       <a href="{{route('kategori',$alt->kategori_adi)}}" class="list-group-item"><i class="fa fa-television"></i> {{$alt->kategori_adi}}</a>
                        @endforeach
                   </div>
                   <h3>Fiyat Aralığı</h3>
                   <form>
                       <div class="form-group">
                           <div class="checkbox">
                               <label>
                                   <input type="checkbox"> 100-200
                               </label>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="checkbox">
                               <label>
                                   <input type="checkbox"> 200-300
                               </label>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
       <div class="col-md-9">
           <div class="products bg-content">
                @if (empty($products))
                    
                
               Sırala
               <a href="#" class="btn btn-default">Çok Satanlar</a>
               <a href="#" class="btn btn-default">Yeni Ürünler</a>
               <hr>
               @endif
           
               
                   
           
               <div class="row">
                @if (empty($products))
                <br>
                <br>
                <div class="col-md-6">Bu Kategoride Henüz Ürün Bulunmamaktadır</div>
                    
                @endif
                @foreach ($products as $product)
                   <div class="col-md-3 product">
                       <a href="{{route('ürün',$product->slug)}}"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT44fQm9LCSLbClmOBdoh_93Hlmho52xd8T0g&usqp=CAU"></a>
                       <p><a href="{{route('ürün',$product->slug)}}">{{$product->ürün_adi}}</a></p>
                       <p class="price">{{$product->fiyat}} ₺</p>
                       <p><a href="#" class="btn btn-theme">Sepete Ekle</a></p>
                   </div>
                   @endforeach

               </div>
           </div>
       </div>
   </div>
@endsection