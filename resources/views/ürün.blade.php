@extends('layouts.master')
@section('tittle','Ürün')


    

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{route('anasayfa')}}">Anasayfa</a></li>
        @foreach ($products->categories()->distinct()->get() as $category)
            
        
        <li><a href="{{route('kategori',$category->slug)}}">{{$category->kategori_adi}}</a></li>
        @endforeach
        <li class="active">{{$products->ürün_adi}}</li>
    </ol>
    <div class="bg-content">
        <div class="row">
            <div class="col-md-5">
                
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSi8Xwx_4wgx_aQphBZeg3GfLL1mZ1ZhSFvDw&usqp=CAU">
                <hr>
                <div class="row">
                    <div class="col-xs-3">
                        <a href="#" class="thumbnail"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSi8Xwx_4wgx_aQphBZeg3GfLL1mZ1ZhSFvDw&usqp=CAU"></a>
                    </div>
                    <div class="col-xs-3">
                        <a href="#" class="thumbnail"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSi8Xwx_4wgx_aQphBZeg3GfLL1mZ1ZhSFvDw&usqp=CAU"></a>
                    </div>
                    <div class="col-xs-3">
                        <a href="#" class="thumbnail"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSi8Xwx_4wgx_aQphBZeg3GfLL1mZ1ZhSFvDw&usqp=CAU"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <h1>{{$products->ürün_adi}}</h1>
                <p class="price">{{$products->fiyat}} ₺</p>
                <form action="{{ route('sepet.ekle') }}" method="post">
                   @csrf
                                        >
                    <input type="hidden" name="id" value="{{ $products->id }}">
                    <input type="submit" class="btn btn-theme" value="Sepete Ekle">
                </form>
            </div>
        </div>

        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#t1" data-toggle="tab">Ürün Açıklaması</a></li>
                <li role="presentation"><a href="#t2" data-toggle="tab">Yorumlar</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="t1">{{$products->aciklama}}</div>
                <div role="tabpanel" class="tab-pane" id="t2">t2</div>
            </div>
        </div>

    </div>
@endsection