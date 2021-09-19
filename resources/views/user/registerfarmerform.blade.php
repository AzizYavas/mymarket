@extends('layouts.master')
@section('title','Kayit-Ol')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Çiftçi Kaydol</div>
                    <div class="panel-body">

                        @include('layouts.partials.errors')

                        <form class="form-horizontal" role="form" method="POST" action="{{route("user.registerfarmerform")}}">
                            @csrf
                            @if ($registerfarmeredit)
                                <input type="hidden" name="id" value="{{ $registerfarmeredit->id }}">
                            @endif
                            <div class="form-group"> {{--has-error--}}
                                <label for="far_name" class="col-md-4 control-label">Çifçi Adı</label>
                                <div class="col-md-6">
                                    <input id="far_name" type="text" class="form-control" name="far_name" value="{{$registerfarmeredit->far_name}}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group"> {{--has-error--}}
                                <label for="far_surname" class="col-md-4 control-label">Çiftçi Soyadı</label>
                                <div class="col-md-6">
                                    <input id="far_surname" type="text" class="form-control" name="far_surname" value="{{$registerfarmeredit->far_surname}}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Çifçi Şifre</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" value="{{$registerfarmeredit->password}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="far_phonenumber" class="col-md-4 control-label">Çifçi Telefon Numarası</label>
                                <div class="col-md-6">
                                    <input id="far_phonenumber" type="text" class="form-control" name="far_phonenumber" value="{{$registerfarmeredit->far_phonenumber}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="far_email" class="col-md-4 control-label">Çifçi Mail</label>
                                <div class="col-md-6">
                                    <input id="far_email" type="text" class="form-control" name="far_email" value="{{$registerfarmeredit->far_email}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="far_location" class="col-md-4 control-label">Çifçi Yaşadığı Yer</label>
                                <div class="col-md-6">
                                    <input id="far_location" type="text" class="form-control" name="far_location" value="{{$registerfarmeredit->far_location}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Kaydol
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
