@extends('admin.layouts.master')
@section('tittle', 'Sipariş')
@section('content')
    <h1 class="page-header">Sipariş Yönetimi</h1>
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
               
                    <th>Toplam Fiyat</th>
                    <th>Durum</th>
                    <th>Sipariş Tarihi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tmp as $order )
                    
                
                <tr>
                    <td>{{$order->id}}</td>
                
                    <td>{{$order->siparis_tutari * ((100 + config('cart.task')))/100}}</td>
                    <td>{{$order->durum}}</td>
                    <td>{{$order->olusturma_tarihi}}</td>
                    <td style="width: 100px">
                        <a href="{{route('admin.sipariş.onayla',$order->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                            <span class="fa fa-pencil"></span>
                        </a>
                        <a href="{{route('admin.sipariş.delete',$order->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="return confirm('Are you sure?')">
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