@extends('layouts.master')
@section('tittle','Anasayfa') 



    

@section('content')


<div class="container">
    @if (session()->has('message'))
    <div class="alert alert-{{ session('message_type') }}">{{ session('message') }}</div>
@endif
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Kategoriler</div>
                <div class="list-group categories">
 
                    @foreach ($categories as $category)
                    <a href="{{route('kategori', $category->slug)}}" class="list-group-item"><i class="fa fa-television"></i> {{$category -> kategori_adi}}</a>
                    @endforeach
                   
,
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @for($i=0;$i<6;$i++)
                    <li data-target="#carousel-example-generic" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
                @endfor
                </ol>
                <div class="carousel-inner" role="listbox">
                    {{-- @foreach ($slider as $item=> $product)
                        
                  
                   
                    <div class="item active">
                        <a href="{{ route('ürün', $product->slug) }}" class="item">
                        <img src="https://static.birgun.net/resim/haber-detay-resim/2020/12/01/bulgaristan-da-91-bin-lira-olan-araba-turkiye-de-168-bin-lira-811677-5.jpg" alt="...">
                        <div class="carousel-caption">
                                        {{$product->ürün_adi}}         </div>
                        </a>
                     </div>
                    @endforeach --}}
                    
            
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default" id="sidebar-product">
                <div class="panel-heading">Günün Fırsatı</div>
                <div class="panel-body">
                    <a href="{{ route('ürün', $opportunity->slug) }}">
                        <img src="https://static.birgun.net/resim/haber-detay-resim/2020/12/01/bulgaristan-da-91-bin-lira-olan-araba-turkiye-de-168-bin-lira-811677-5.jpg" class="img-responsive">
                        {{$opportunity ->ürün_adi}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="products">
        <div class="panel panel-theme">
            <div class="panel-heading">Öne Çıkan Ürünler</div>
            <div class="panel-body">
                <div class="row">
                    @foreach ($featured as $item)
                        
                    
                    <div class="col-md-3 product">
                        <a href="{{route('ürün',$item->slug)}}"><img src="https://static.birgun.net/resim/haber-detay-resim/2020/12/01/bulgaristan-da-91-bin-lira-olan-araba-turkiye-de-168-bin-lira-811677-5.jpg"></a>
                        <p><a href="#">{{$item->ürün_adi}} adı</a></p>
                        <p class="price">{{$item->fiyat}} ₺</p>
                    </div>
                    @endforeach
  
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="products">
        <div class="panel panel-theme">
            <div class="panel-heading">Çok Satan Ürünler</div>
            <div class="panel-body">
                <div class="row">
                    @foreach ($bestseller as $item)
                    <div class="col-md-3 product">
                       
                            
                        
                        <a href="{{route('ürün',$item->slug)}}"><img src="https://static.birgun.net/resim/haber-detay-resim/2020/12/01/bulgaristan-da-91-bin-lira-olan-araba-turkiye-de-168-bin-lira-811677-5.jpg" > </a>
                        <p><a href="#">{{$item->ürün_adi}} adı</a></p>
                        <p class="price">{{$item->fiyat}} ₺</p>
                    </div>
                    @endforeach
           
                </div>
            </div>
        </div>
    </div>
    <div class="products">
        <div class="panel panel-theme">
            <div class="panel-heading">İndirimli Ürünler</div>
            <div class="panel-body">
                <div class="row">
                    @foreach ($bestseller as $item)
                    <div class="col-md-3 product">
                       
                            
                        
                        <a href="{{route('ürün',$item->slug)}}"><img src="https://static.birgun.net/resim/haber-detay-resim/2020/12/01/bulgaristan-da-91-bin-lira-olan-araba-turkiye-de-168-bin-lira-811677-5.jpg" > </a>
                        <p><a href="#">{{$item->ürün_adi}} adı</a></p>
                        <p class="price">{{$item->fiyat}} ₺</p>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"> --}}
{{-- // <script src="/js/jquery-3.2.1.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  {{-- <script src="/js/popper.min.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  {{-- <script src="/js/bootstrap.min.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 

@endsection
