@extends('layouts.master')
@section('title','Anasayfa')
@section('content')

    @include('layouts.partials.alert')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-success">Kategoriler</div>
                    <div class="list-group categories">
                        @foreach($categoryall as $categoryname)
                            <a href="{{ route('category',$categoryname->slug) }}" class="list-group-item text-warning"><i
                                    class="fa fa-arrow-circle-o-right"></i>{{$categoryname->category_name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for($i=0,$iMax = count($product_slider);$i<$iMax;$i++)
                            <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"
                                class="{{$i==0 ? 'active' : ''}}"></li>
                        @endfor
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @foreach($product_slider as $index => $product_view)
                            <div class="item {{$index==0 ? 'active' : ''}}">
                                {{--TODO: BURADADA İLK RESMİ GETİRMEK İSTİYORUM--}}
                                <img src="../../img/patatestarla.jpeg" width="640" height="400" alt="...">
                                <div class="carousel-caption">
                                    {{$product_view->prod_name}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" id="sidebar-product">
                    <div class="panel-heading">Günün Fırsatı</div>
                    <div class="panel-body">
                        <a href="#">
                            <img src="../../img/domates.jpeg" height="400" width="485"
                                 class="img-responsive">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Öne Çıkan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 product">
                            <a href="#"><img src="../../img/kavuntarlası.jpeg"></a>
                            <p><a href="#">Kırkağaç Kavunu</a></p>
                            <p class="price">Kg/2,5 ₺</p>
                        </div>
                        <div class="col-md-3 product">
                            <a href="#"><img src="../../img/portakal.jpeg"></a>
                            <p><a href="#">Finike Portaklı</a></p>
                            <p class="price">Kg/3,5 ₺</p>
                        </div>
                        <div class="col-md-3 product">
                            <a href="#"><img src="../../img/armut.jpeg"></a>
                            <p><a href="#">Armut</a></p>
                            <p class="price">Kg/1,5 ₺</p>
                        </div>
                        <div class="col-md-3 product">
                            <a href="#"><img width="300" height="400" src="../../img/çilek2.jpeg"></a>
                            <p><a href="#">Çilek</a></p>
                            <p class="price">Kg/5,5 ₺</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Çok Satan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 product">
                            <a href="#"><img src="../../img/domates.jpeg"></a>
                            <p><a href="#">Domates</a></p>
                            <p class="price">Kg/1₺</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">İndirime Giren Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 product">
                            <a href="#"><img src="../../img/salatalik.jpeg"></a>
                            <p><a href="#">Salatalık</a></p>
                            <p class="price">Kg/1,5₺</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('.alert').slideUp(500)
            }, 3000);
        });
    </script>
@endsection
