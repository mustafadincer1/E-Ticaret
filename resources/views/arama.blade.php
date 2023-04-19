@extends('layouts.master')
@section('content')

    <div class="container">

        <ol class="breadcrumb">
            <li><a href="{{ route('anasayfa') }}">Anasayfa</a></li>
            <li class="active">Arama Sonucu</li>
        </ol>

        <div class="products bg-content">
            <div class="row">
                @if (count($deneme)==0)
                    <div class="col-md-12 text-center">
                        Bir ürün bulunamadı!
                    </div>
                @endif
                @foreach($deneme as $urun)
                    <div class="col-md-3 product">
                        <a href="{{ route('ürün', $urun->slug) }}">
                            <img src="http://via.placeholder.com/640x400?text=UrunResmi" alt="{{ $urun->ürün_adi }}">
                       
                        </a>
                        <p>
                            <a href="{{ route('ürün', $urun->slug) }}">
                                {{ $urun->ürün_adi }}
                            </a>
                        </p>
                        <p class="price">{{ $urun->fiyat }} ₺</p>
                    </div>
                @endforeach
            
            </div>
            
        </div>
        {{ $deneme->links('pagination::bootstrap-4') }}
    
     

    </div>

@endsection