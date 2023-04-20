@extends('admin.layouts.master')
@section('tittle', 'Kulanıcı')
@section('content')
    <h1 class="page-header">Kullanıcı Yönetimi</h1>
    <h1 class="sub-header">
        
        <div class="btn-group pull-right" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary">Print</button>
            <button type="button" class="btn btn-primary">Export</button>
        </div>
        Table
    </h1>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Ad Soyad</th>
                    <th>Email</th>
                    <th>Aktif mi</th>
                    <th>Admin mi</th>
                    <th>Kayıt Tarihi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tmp as $user )
                    
                
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name_surname}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if ($user->activation)
                           <span class="label label-success">Aktif</span>
                            
                        @else
                        <span class="label label-warning">Aktif Değil</span> 
                            
                        @endif
                       
                        
                    </td>
                    <td>
                        @if ($user->is_admin)
                            <span class="label label-success">Aktif</span>
                        @else
                            <span class="label label-warning">Admin Değil</span>   
                        @endif
                    </td>
                    <td>{{$user->olusturma_tarihi}}</td>
                    <td style="width: 100px">
                        <a href="{{route('admin.kullanıcı.edit',$user->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                            <span class="fa fa-pencil"></span>
                        </a>
                        <a href="{{route('admin.kullanıcı.delete',$user->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="return confirm('Are you sure?')">
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