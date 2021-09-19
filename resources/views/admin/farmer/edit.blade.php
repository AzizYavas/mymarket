@extends('admin.layout.default')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Kategori</a></li>
    <li class="breadcrumb-item active">{{$title}}</li>
@endsection

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{$title}}</h3>
                        </div>
                        <form method="post" action="{{ route('admin.farmer.save') }}" enctype="multipart/form-data">
                            @csrf
                            @if ($farmeredit)
                                <input type="hidden" name="id" value="{{ $farmeredit->id }}">
                            @endif

                            <div class="card-body">

                                <div class="form-group">
                                    <label>Çiftçi Adı</label>
                                    <input type="text" class="form-control" name="far_name"
                                           value="{{$farmeredit->far_name}}" required>

                                    <label>Çiftçi Soyadı</label>
                                    <input type="text" class="form-control" name="far_surname"
                                           value="{{$farmeredit->far_surname}}" required>

                                    <label>Çiftçi Şifre</label>
                                    <input type="text" class="form-control" name="password"
                                           value="{{$farmeredit->password}}" required>

                                    <label>Çiftçi Telefon Numarası</label>
                                    <input type="text" class="form-control" name="far_phonenumber"
                                           value="{{$farmeredit->far_phonenumber}}" required>

                                    <label>Çiftçi Mail</label>
                                    <input type="text" class="form-control" name="far_email"
                                           value="{{$farmeredit->far_email}}" required>

                                    <label>Çiftçi Konum</label>
                                    <input type="text" class="form-control" name="far_location"
                                           value="{{$farmeredit->far_location}}" required>

                                    <div class="form-group">
                                        <label>AKTİF/PASİF</label>
                                        <select class="form-control" name="far_status">
                                            <option @if($farmeredit->far_status === "a") selected @else  @endif value="a">
                                                Aktif
                                            </option>
                                            <option @if($farmeredit->far_status === "p") selected @else  @endif value="p">
                                                Pasif
                                            </option>
                                        </select>
                                    </div>

                                </div>


                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Gönder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection

