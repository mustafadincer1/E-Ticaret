@extends('layouts.master')
@section('tittle','Sepet')


    

@section('content')

<div class="container">  


    <div class="bg-content">
        <h2>Sepet</h2>
        @if (session()->has('message'))
        <div class="alert alert-{{ session('message_type') }}">{{ session('message') }}</div>
    @endif
        @if (count(Cart::Getcontent())>0)
        <table class="table table-bordererd table-hover">
            <tr>
                <th colspan="2">Ürün</th>
                <th>Adet Fiyatı</th>
                <th>Adet</th>
                <th>Tutar</th>
            </tr>
            @php
                $fiyat = 0;
            @endphp
            @foreach($ürünler as $urunCartItem)
                <tr>
                    <td style="width: 120px;">
                        <a href="{{ route('ürün', $urunCartItem->name) }}">
                            <img src="http://via.placeholder.com/120x100?text=UrunResmi">
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('ürün', $urunCartItem->name) }}">
                            {{ $urunCartItem->name }}
                        </a>
                        <form action="{{ route('sepet.kaldir', $urunCartItem->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-danger btn-xs" value="Sepetten Kaldır">
                        </form>
                    </td>
                    <td>{{ $urunCartItem->price }} ₺</td>
                    <td >
                        
                      
                        {{-- <div class="container">  --}}
                        
                             
                                   
                              
                                        {{-- <input style="padding: 10px 17px" type="submit" class="btn btn-xs btn-default urun-adet-azalt" value= -  > --}}
                                        <a href="{{route('sepet.azalt', $urunCartItem->id)}}" class="btn btn-xs btn-default urun-adet-azalt" data-id="{{ $urunCartItem->id }}" data-adet= -1>-</a>

                                 
                        
                                
                                    <span style="padding: 10px 20px">{{ $urunCartItem->quantity }}</span>
                                
                                    
                                        {{-- <input style="padding: 10px 17px" type="submit" class="btn btn-xs btn-default urun-adet-arttır" value= +> --}}
                                 
                                    <a href="{{route('sepet.arttır', $urunCartItem->id)}}" class="btn btn-xs btn-default urun-adet-artir" data-id="{{ $urunCartItem->id }}" data-adet=1>+</a>
                               
                            
                            
                            
                            
                            </div>
                        {{-- </div> --}}
                    
                    </td>
                    <td class="text-right">
                        {{ $urunCartItem->quantity * $urunCartItem->price}} ₺
                    </td>
                </tr>

                @php
              
                    $fiyat = $fiyat + $urunCartItem->price;
                @endphp
                @endforeach
          
          
            {{-- <tr>
                <th colspan="4" class="text-right">KDV</th>
                <td class="text-right">{{ Cart::getSubTotal() }} ₺</td>
            </tr> --}}
            <tr>
                <th colspan="4" class="text-right">Genel Toplam</th>
                <td class="text-right">{{ Cart::getTotal(); }} ₺</td>
            </tr>
            
        </table>
         
        <div>
            <form action="{{ route('sepet.boşalt') }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="submit" class="btn btn-info pull-left" value="Sepeti Boşalt">
            </form>
            <a href="{{route('ödeme')}}" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
        </div>
      @endif
    </div>
</div>

@endsection

@section('footer')
    <script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        
$(function () {
    $('.urun-adet-artir, .urun-adet-azalt').on('click', function () {
        var id = $(this).attr('data-id');
        var adet = $(this).attr('data-adet');
        $.ajax({
            type: 'put',
            url: '{{ url('sepet/guncelle') }}/' + id,
            data: {adet: adet},
            success: function (result) {
                window.location.href = '{{ route('sepet.index') }}';
            }
        });
    });
});
    </script>
@endsection