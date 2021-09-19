@extends('layouts.master')
@section('title',$allproduct->prod_name)
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('homepage')}}">Anasayfa</a></li>

            @foreach($categorypro as $allcategorypro)
                <li><a href="{{route('category',$allcategorypro->slug)}}">{{$allcategorypro->category_name}}</a></li>
            @endforeach
            <li class="active">{{$allproduct->prod_name}}</li>
        </ol>
        <div class="bg-content">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">

                        @foreach($imageupload as $image)
                            @if($image->id == $allproduct->id)
                                @foreach((array)json_decode($image->image_path,true)[0] as $gel)
                                    <img class="thumbnail" style="padding-left: 10px" src="{{asset('../../img/'.$gel)}}" width="400" height="400">
                                @endforeach
                                    <hr>
                                @foreach((array)json_decode($image->image_path,true) as $deneme)
                                    <div class="col-xs-3">
                                        <a href="#" class="thumbnail"><img src="{{asset('../../img/'.$deneme)}}"></a>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    <h1 class="text-success">{{$allproduct->prod_name}}</h1>
                    <p class="price text-warning">{{$allproduct->prod_price}} ₺</p>
                    <form action="{{route('sepet.add')}}" method="post">
                        {{csrf_field()}}
                        @if(empty(request('inprice')))
                        <span class="text-warning">Kaç Kg/(min:500) : </span><input type="text" name="inprice" value="{{$allproduct->prod_quantity}}"><br><br>
                        @endif
                        <input type="hidden" name="id" value="{{$allproduct->id}}">
                        <input type="submit" class="btn btn-success" value="Sepete Ekle">
                    </form>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <img src="{{asset('../../img/user.jpeg')}}" width="100" height="100">
                    </div>
                    <hr>
                    @foreach($productfarmer as $userfarmer)
                        @if($allproduct->farmer_id == $userfarmer->id)
                    <div class="row">
                        <b><span class="text-success">Çifçi Adı : </span></b><a href="">{{$userfarmer->far_name}}</a><br>
                        <b><span class="text-success">Çifçi Soyadı : </span></b><a href="">{{$userfarmer->far_surname}}</a><br>
                        <b><span class="text-success">Çifçi Yaşadığı Yer : </span></b><span>{{$userfarmer->far_location}}</span><br>
                        <b><span class="text-success">Çifçi Mail Adresi : </span></b><span>{{$userfarmer->far_email}}</span>
                    </div>
                        @endif
                    @endforeach
                </div>

            </div>

            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#t1" data-toggle="tab">Ürün Açıklaması</a></li>
                    <li role="presentation"><a href="#t2" data-toggle="tab">Yorumlar</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="t1">{{$allproduct->product_desc}}</div>
                    <div role="tabpanel" class="tab-pane" id="t2">t2</div>
                </div>
            </div>

        </div>
    </div>
@endsection
