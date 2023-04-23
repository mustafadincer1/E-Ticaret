@extends('admin.layouts.master')
@section('tittle', 'Ürün')
@section('content')
    <h1 class="page-header">Ürün Yönetimi</h1>
    <h1 class="sub-header">
        
        <div class="btn-group pull-right" role="group" aria-label="Basic example">
            <a href="{{route('admin.ürün.add')}}" class="btn btn-primary">Ekle</a>
        </div>
        Table
    </h1>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Slug</th>
                    <th>Ürün Adı</th>    
                    <th>Fiyat</th>
                    <th>Kayıt Tarihi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tmp as $ürün )
                    
                
                <tr>
                    <td>{{$ürün->id}}</td>
                    <td>{{$ürün->slug}}</td>
                    <td>{{$ürün->ürün_adi}}</td>   
                    <td>{{$ürün->fiyat}}</td>   
                    <td>{{$ürün->olusturma_tarihi}}</td>
                    <td style="width: 100px">
                        <a href="{{route('admin.ürün.edit',$ürün->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                            <span class="fa fa-pencil"></span>
                        </a>
                        <a href="{{route('admin.ürün.delete',$ürün->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="return confirm('Are you sure?')">
                            <span class="fa fa-trash"></span>
                        </a>
                    </td>

                    
                </tr>
                @endforeach
            </tbody>
            {{$tmp->links()}}
        </table>

    </div>

@endsection