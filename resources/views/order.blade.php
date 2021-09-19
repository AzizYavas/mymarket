@extends('layouts.master')
@section('title','Siparisler')
@section('content')
    <div class="container">
        <div class="bg-content">
            <a href="{{route('siparisler')}}" class="btn btn-xs btn-primary">
                <i class="glyphicon glyphicon-circle-arrow-left"></i> Siparişlere Dön
            </a>
            <h2>Sipariş {{$order->id}}</h2>
            <table class="table table-bordererd table-hover">
                <tr>
                    <th colspan="2">Ürün</th>
                    <th>Tutar</th>
                    <th>Adet</th>
                    <th>Ara Toplam</th>
                    <th>Durum</th>
                </tr>

                @foreach($order->basket->sepet_urunler as $sepet_urun)
                    <tr>
                        <td>
                            <a href="{{route('product',$sepet_urun->urun->slug)}}">
                                <img src="http://via.placeholder.com/120x100?text=UrunResmi">
                            </a>
                        </td>
                        <td>{{$sepet_urun->product->prod_name}}</td>
                        <td>{{$sepet_urun->price}}</td>
                        <td>{{$sepet_urun->quantity}}</td>
                        <td>{{$sepet_urun->price * $sepet_urun->quantity}}</td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="4" class="text-right">Toplam Tutar</th>
                    <th colspan="2">{{$order->siparis_tutari}} ₺</th>
                </tr>

                <tr>
                    <th colspan="4" class="text-right">Toplam Tutar(KDV'li)</th>
                    <th colspan="2">{{$order->siparis_tutari *((100+config('cart.tax'))/100)}} ₺</th>
                </tr>
            </table>
        </div>
    </div>
@endsection
