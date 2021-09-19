@extends('layouts.master')
@section('title','Kategori')
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('homepage')}}">Anasayfa</a></li>
            <li class="active">{{--{{$kategori->kategori_adi}}--}}</li>
        </ol>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Kategori Adı</div>
                    <div class="panel-body">
                        <h3>Alt Kategoriler</h3>
                        <div class="list-group categories">

                            @foreach($subcategory as $subcategoryurl)
                                <a href="{{route('category',$subcategoryurl->slug)}}" class="list-group-item"><i
                                        class="fa fa-arrow-circle-o-right"></i>{{$subcategoryurl->category_name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="products bg-content">

                    @if(count($productcategory)>0)

                        Sırala
                        <a href="?order=coksatanlar" class="btn btn-default">Çok Satanlar</a>
                        <a href="?order=yeni" class="btn btn-default">Yeni Ürünler</a>
                        <hr>

                    @endif

                    <div class="row">

                        @if(count($productcategory)==0)
                            <div class="col-md-12">Bu kategoride ürün bulunmamaktadır!</div>
                        @endif

                        @foreach($productcategory as $lastproductlist)
                            <div class="col-md-3 product">
                                @foreach($imagecategory as $image)
                                    @if($image->id == $lastproductlist->id)
                                        @foreach((array)json_decode($image->image_path,true)[0] as $gel)
                                            <a href="{{route('product',$lastproductlist->slug)}}"><img width="400" height="400" src="{{asset('../../img/'.$gel)}}"></a>
                                        @endforeach
                                    @endif
                                @endforeach
                                <p>
                                    <a class="text-success" href="{{route('product',$lastproductlist->slug)}}">{{$lastproductlist->prod_name}}</a>
                                </p>
                                <p class="price text-success" >{{$lastproductlist->prod_price}}₺</p>
                            </div>
                        @endforeach

                    </div>
                    {{--
                                        {{request()->has('order') ? $urunler->appends(['order'=>request('order')])->links() : $urunler->links()}}
                    --}}
                </div>
            </div>
        </div>
    </div>
@endsection
