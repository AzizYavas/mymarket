@extends('layouts.master')
@section('title','Oturum-Ac')
@section('content')
    <div class="container">
        @include('admin.layout.alert')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Çiftçi Oturum Aç</div>
                    <div class="panel-body">
                        @include('layouts.partials.errors')
                        <form class="form-horizontal" role="form" method="post" action="{{route('user.loginfarmer')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="far_name" class="col-md-4 control-label">Çiftçi Adı</label>
                                <div class="col-md-6">
                                    <input id="far_name" type="text" class="form-control" name="far_name"  required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Çiftçi Şifre</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Giriş yap
                                    </button>
                                </div>
                            </div>
                        </form>
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
