@extends('admin.layouts.master')
@section('tittle', 'Kulanıcı')
@section('content')
    <h1 class="page-header">Kullanıcı Yönetimi</h1>
    <h1 class="sub-header">Form</h1>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
                <form method="POST" action="{{route('admin.kategori.update',@$category->id)}}" >
                    
                    @csrf
                    
                        
                    
                    <div class="row">
                       
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="üst_id">Üst Kategori</label>
                               
                                <select name="üst_id" id="üst_id" class="form_control">
                                    @foreach ($categories as $item)
                                    <option value="{{$item->id}}"> {{$item->kategori_adi}}</option>
                                    @endforeach
                                </select>
                                
                                
                               
                            </div>
                          
                        </div>
                    </div> 
                
                    
                        
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kategori Adı</label>
                                <input type="text" name= "category_name" class="form-control" id="category_name" value="{{$category->kategori_adi}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="slug" class="form-control" id="slug" value="{{$category->slug}}">
                            </div>
                        </div>
                       
                    </div>
                    

                    
                    <button type="submit" class="btn btn-primary">Submit</button>
               
                </form>


@endsection