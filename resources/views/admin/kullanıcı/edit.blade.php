@extends('admin.layouts.master')
@section('tittle', 'Kulanıcı')
@section('content')
    <h1 class="page-header">Kullanıcı Yönetimi</h1>
    <h1 class="sub-header">Form</h1>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
                <form method="POST" action="{{route('admin.kullanıcı.update',@$user->id)}}" >
                    
                    @csrf
                    
                    
                        
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ad Soyad</label>
                                <input type="name_surname" name= "name_surname" class="form-control" id="name_surname" value="{{$user->name_surname}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Şifre</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="adress" id="address" placeholder="Adress" value="{{$user->detail->adres}}">
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Telefon</label>
                                <input type="phone" class="form-control" name = "phone" id="phone" placeholder="Telefon" value="{{$user->detail->telefon}}">
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Cep Telefon</label>
                                <input type="mobilephone" class="form-control" name = "mobilephone" id="mobilephone" placeholder="Cep Telefon" value="{{$user->detail->ceptelefonu}}">
                            </div>
                        </div>
                    </div> 


                        <div class=checkbox>
                            <label >
                        <div class="col-md-12">
                                <input type="checkbox" name="activation" value="1 " {{$user->activation ? 'checked' : ''}}> Aktif Mi?
                            </label>

                        </div>
                        <div class=chechkbox>
                            <label >
                                <input type="checkbox" name="is_admin" value="1 " {{$user->is_admin ? 'checked' : ''}}> Admin Mi?
                            </label>

                        </div>

                        
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
               
                </form>


@endsection