@extends('admin.layout.default')


@section('breadcrumb')
    <li class="breadcrumb-item active"></li>
@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-right">
                            <a href="{{ route('admin.market.edit') }}" class="btn btn-md btn-outline-secondary">+ Yeni
                                Market Sahibi Ekle</a>
                        </div>
                        @include('admin.layout.alert')
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Durum</th>
                                    <th>Adı</th>
                                    <th>Soyadı</th>
                                    <th>Firma Adı</th>
                                    <th>Telefon Numarası</th>
                                    <th>Mail Adresi</th>
                                    <th>Konum</th>
                                    <th width="115"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($market as $allmarket)
                                    <tr>

                                            <td>{{$allmarket->id}}</td>
                                            <td>
                                                @if($allmarket->mar_status === "a")
                                                    <span class="badge bg-success">Çalışıyor</span>
                                                @else
                                                    <span class="badge bg-primary">Çalışmıyor</span>
                                                @endif
                                            </td>
                                            <td>{{$allmarket->mar_name}}</td>
                                            <td>{{$allmarket->mar_surname}}</td>
                                            <td>{{$allmarket->mar_company}}</td>
                                            <td>{{$allmarket->mar_phonenumber}}</td>
                                            <td>{{$allmarket->mar_email}}</td>
                                            <td>{{$allmarket->mar_location}}</td>

                                            <td style="text-align: right">
                                                <a href="{{route('admin.market.edit',['id' => $allmarket->id])}}"
                                                   class="btn btn-outline-primary btn-md">
                                                    <i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.market.delete', ['id' => $allmarket->id]) }}"
                                                   class="btn btn-outline-danger btn-md">
                                                    <i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>

                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

