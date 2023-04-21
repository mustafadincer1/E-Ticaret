@extends('admin.layouts.master')endsection
@section('tittle', 'Kulanıcı')
@section('content')
    <h1 class="page-header">Kategori Yönetimi</h1>
    <h1 class="sub-header">
        
        <div class="btn-group pull-right" role="group" aria-label="Basic example">
            <a href="{{route('admin.kategori.add')}}" class="btn btn-primary">Ekle</a>
       
        </div>
        Table
    </h1>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Slug</th>
                    <th>Kategori Adı</th>
                    <th>Oluşturma Tarihi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tmp as $category )
                    
                
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->kategori_adi}}</td>
                    
                    <td>{{$category->olusturma_tarihi}}</td>
                    <td style="width: 100px">
                        <a href="{{route('admin.kategori.edit',$category->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                            <span class="fa fa-pencil"></span>
                        </a>
                        <a href="{{route('admin.kategori.delete',$category->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="return confirm('Are you sure?')">
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