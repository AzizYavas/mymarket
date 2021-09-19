@extends('layouts.master')
@section('title','Çifçi Güncelleme')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Çiftçi Güncelleme Sayfası</div>
                    <div class="panel-body">

                        @include('layouts.partials.errors')

                        <form class="form-horizontal" role="form" method="post" action="{{route("user.farmerupdate")}}">
                            @csrf
                            @if ($farmerupdateform)
                                <input type="hidden" name="id" value="{{ $farmerupdateform->id }}">
                            @endif
                            <div class="form-group"> {{--has-error--}}
                                <label for="far_name" class="col-md-4 control-label">Çifçi Adı</label>
                                <div class="col-md-6">
                                    <input id="far_name" type="text" class="form-control" name="far_name" value="{{$farmerupdateform->far_name}}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group"> {{--has-error--}}
                                <label for="far_surname" class="col-md-4 control-label">Çiftçi Soyadı</label>
                                <div class="col-md-6">
                                    <input id="far_surname" type="text" class="form-control" name="far_surname" value="{{$farmerupdateform->far_surname}}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="far_phonenumber" class="col-md-4 control-label">Çifçi Telefon Numarası</label>
                                <div class="col-md-6">
                                    <input id="far_phonenumber" type="text" class="form-control" name="far_phonenumber" value="{{$farmerupdateform->far_phonenumber}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="far_email" class="col-md-4 control-label">Çifçi Mail</label>
                                <div class="col-md-6">
                                    <input id="far_email" type="text" class="form-control" name="far_email" value="{{$farmerupdateform->far_email}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="far_location" class="col-md-4 control-label">Çifçi Yaşadığı Yer</label>
                                <div class="col-md-6">
                                    <input id="far_location" type="text" class="form-control" name="far_location" value="{{$farmerupdateform->far_location}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="far_image" class="col-md-4 control-label">Profil Resmi</label>
                                <div class="col-md-6">
                                    <input id="far_image" type="file" class="form-control" name="far_image" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        Güncelle
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
