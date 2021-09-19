@extends('layouts.master')
@section('title','Siparisler')
@section('content')
    <div class="container">
        @include('layouts.partials.alert')
        <div class="bg-content">
            <h2>Siparişler</h2>
            @if(count($allorder)==0)
                <p>Henüz siparişiniz yok</p>
            @else

                <table class="table table-bordererd table-hover">
                    <tr>
                        <th>Sipariş Kodu</th>
                        <th>Tutar</th>
                        <th>Toplam Ürün</th>
                        <th>Durum</th>
                    </tr>
                    @foreach($allorder as $siparis)
                        <tr>
                            <td>SP-{{$siparis->id}}</td>
                            <td>{{$siparis->order_amount *((100+config('cart.tax'))/100)}}</td>
                            <td>{{$siparis->basket->sepet_urun_adet()}}</td>
                            <td><a href="{{ route('order',$siparis->id) }}" class="btn btn-sm btn-success">Detay</a></td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection
