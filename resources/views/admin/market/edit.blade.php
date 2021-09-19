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
                        <form method="post" action="{{ route('admin.market.save') }}" enctype="multipart/form-data">
                            @csrf
                            @if ($marketedit)
                                <input type="hidden" name="id" value="{{ $marketedit->id }}">
                            @endif

                            <div class="card-body">

                                <div class="form-group">
                                    <label>Market Adı</label>
                                    <input type="text" class="form-control" name="mar_name"
                                           value="{{$marketedit->mar_name}}" required>

                                    <label>Market Soyadı</label>
                                    <input type="text" class="form-control" name="mar_surname"
                                           value="{{$marketedit->mar_surname}}" required>

                                    <label>Firma Adı</label>
                                    <input type="text" class="form-control" name="mar_company"
                                           value="{{$marketedit->mar_company}}" required>

                                    <label>Market Şifre</label>
                                    <input type="text" class="form-control" name="mar_password"
                                           value="{{$marketedit->mar_password}}" required>

                                    <label>Market Telefon Numarası</label>
                                    <input type="text" class="form-control" name="mar_phonenumber"
                                           value="{{$marketedit->mar_phonenumber}}" required>

                                    <label>Market Mail</label>
                                    <input type="text" class="form-control" name="mar_email"
                                           value="{{$marketedit->mar_email}}" required>

                                    <label>Market Konum</label>
                                    <input type="text" class="form-control" name="mar_location"
                                           value="{{$marketedit->mar_location}}" required>

                                    <div class="form-group">
                                        <label>AKTİF/PASİF</label>
                                        <select class="form-control" name="mar_status">
                                            <option @if($marketedit->mar_status === "a") selected @else  @endif value="a">
                                                Aktif
                                            </option>
                                            <option @if($marketedit->mar_status === "p") selected @else  @endif value="p">
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

