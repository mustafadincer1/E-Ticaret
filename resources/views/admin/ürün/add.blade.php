@extends('admin.layouts.master')
@section('tittle', 'Ürün')
@section('content')
    <h1 class="page-header">Ürün Yönetimi</h1>
    <h1 class="sub-header">Form</h1>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
                <form method="POST" action="{{route('admin.ürün.save')}}" enctype="multipart/form-data" >
                    
                    @csrf
                    
                    
                        
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ürün Adı</label>
                                <input type="text" name= "ürün_adi" class="form-control" id="ürün_adi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="slug" class="form-control" id="slug" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Fiyat</label>
                                <input type="text" class="form-control" name="fiyat" id="fiyat" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Açıklama</label>
                                <input type="text" class="form-control" name="aciklama" id="aciklama">
                            </div>
                        </div>
                    </div>
                    <div class=checkbox>
                        <label >
                            <input type="checkbox" name="show_slider" value="1"> Sliderda Göster
                        </label>

                    </div>
                    <div class=chechkbox>
                        <label >
                            <input type="checkbox" name="show_opportunity" value="1 "> Günün Fırsatında Göster
                        </label>

                    </div>
                    <div class=checkbox>
                        <label >
                            <input type="checkbox" name="show_featured" value="1"> Öne Çıkanlarda Göster
                        </label>

                    </div>
                    <div class=chechkbox>
                        <label >
                            <input type="checkbox" name="show_bestseller" value="1" > Çok Satanlarda Göster
                        </label>

                    </div>
                    <div class=chechkbox>
                        <label >
                            <input type="checkbox" name="show_discount" value="1" > İndirimli Ürünlerde Göster
                        </label>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kategoriler">Kategoriler</label>
                                <select name="kategoriler" class="form-control" id="kategoriler" multiple>
                                    @foreach ($kategoriler as $kategori )
                                    <option value="{{$kategori->id}}">{{$kategori->kategori_adi}}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ürün_resmi">Ürün Resmi</label>
                                <input type="file" class="form-control" name="ürün_resmi" id="ürün_resmi">
                            </div>
                        </div>
                    </div>
                

                        
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
               
                </form>


@endsection
@section('head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('footer')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function(){
            $('#kategoriler').select2({
                placeholder: "Lütfen Kategori Seçiniz."
            });
        });
    </script>
        
@endsection