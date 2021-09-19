@php

    use Illuminate\Support\Facades\Auth;


@endphp
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('homepage')}}">
                <img src="{{asset('img/logo.png')}}">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" action="{{--{{route('urun_ara')}}--}}" method="post">
                {{csrf_field()}}
                <div class="input-group">
                    <input type="text" id="navbar-search" name="aranan" class="form-control" placeholder="Ara"
                           value="{{old('aranan')}}">
                    <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">

                @if(auth()->guard('farmer')->check())

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Çifçi Profil @if(auth()->guard('farmer')->check()) ({{auth()->guard('farmer')->user()->far_name}}) @endif<span class="caret"></span></a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('farmerproductedit')}}" aria-expanded="false">Ürün Ekle</a>
                            </li>
                            <li>
                                <a href="{{route('farmerproduct')}}" aria-expanded="false">Ürünlerim</a>
                            </li>
                            <li>
                                <a href="{{route('user.registerfarmerform',['id' => auth()->guard('farmer')->user()->id])}}" aria-expanded="false">Profilim</a>
                            </li>
                            <li><a href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Çıkış</a>
                                <form action="{{route('user.farmerout')}}" method="post" id="logout-form"
                                      style="display: none">{{csrf_field()}}</form>
                            </li>
                        </ul>
                    </li>

                @elseif(auth()->guard('market')->check())

                    <li><a href="{{--{{route('sepet')}}--}}"><i class="fa fa-shopping-cart"></i> Sepet <span
                                class="badge badge-theme">{{--{{(Cart::count())}}--}}</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"> Market Profil @if(auth()->guard('market')->check()) ({{auth()->guard('market')->user()->mar_name}}) @endif<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{--{{route('siparisler')}}--}}">Siparişlerim</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"
                                   onclick="event.preventDefault(); document.getElementById('marketlogout-form').submit()">Çıkış</a>
                                <form action="{{route('user.marketout')}}" method="post" id="marketlogout-form"
                                      style="display: none">{{csrf_field()}}</form>
                            </li>
                        </ul>
                    </li>

                @else

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Kaydol<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('user.registerfarmerform')}}">Çiftçi Kaydol</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('user.registermarketform')}}">Market Kaydol</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"> Girişler <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('user.loginfarmerform')}}">Çiftçi Giriş</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('user.loginmarketform')}}">Market Giriş</a></li>
                        </ul>
                    </li>


                @endif

            </ul>
        </div>
    </div>
</nav>

