@extends('layouts.master')
@section('title','Kayit-Ol')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Market Kaydol</div>
                    <div class="panel-body">

                        @include('layouts.partials.errors')

                        <form class="form-horizontal" role="form" method="POST" action="{{route("user.registermarketform")}}">
                            @csrf
                            <div class="form-group">
                                <label for="mar_name" class="col-md-4 control-label">Market Sahibi İsmi</label>
                                <div class="col-md-6">
                                    <input id="mar_name" type="text" class="form-control" name="mar_name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mar_surname" class="col-md-4 control-label">Market Sahibi Soyismi</label>
                                <div class="col-md-6">
                                    <input id="mar_surname" type="text" class="form-control" name="mar_surname" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mar_company" class="col-md-4 control-label">Firma Adı</label>
                                <div class="col-md-6">
                                    <input id="mar_company" type="text" class="form-control" name="mar_company" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Şifre</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mar_phonenumber" class="col-md-4 control-label">Cep Telefonu</label>
                                <div class="col-md-6">
                                    <input id="mar_phonenumber" type="text" class="form-control" name="mar_phonenumber" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mar_email" class="col-md-4 control-label">Mail Adresiniz</label>
                                <div class="col-md-6">
                                    <input id="mar_email" type="email" class="form-control" name="mar_email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mar_location" class="col-md-4 control-label">Market Bulunduğu Lokasyon</label>
                                <div class="col-md-6">
                                    <input id="mar_location" type="text" class="form-control" name="mar_location" required>
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
