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
                            <a href="{{ route('admin.category.edit') }}" class="btn btn-md btn-outline-secondary">+ Yeni
                                Kategory Oluştur</a>
                        </div>
                        @include('admin.layout.alert')
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th width="10">Durum</th>
                                    <th>Üst Kategoriler</th>
                                    <th>Alt Kategoriler</th>
                                    <th width="115"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($category as $hotelgen)
                                    <tr>
                                        <td>
                                            <span>{{$hotelgen->id}}</span>
                                        </td>
                                        <td>
                                        @if($hotelgen->status === "a")
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-primary">Pasif</span>
                                        @endif
                                        </td>
                                        <td>{{ $hotelgen->category_name }}</td>

                                        <td>
                                            @foreach ($subcategory as $hotel)

                                                @if($hotel->top_id !== null and $hotelgen->id == $hotel->top_id)

                                                    {{ $hotel->category_name }}
                                                    <a href="{{ route('admin.category.subdelete', ['id' => $hotel->id]) }}"
                                                       class="btn btn-outline-danger btn-md">
                                                        <i class="fa fa-trash"></i></a>

                                                @endif

                                            @endforeach

                                            <a href="{{route('admin.category.subedit',['id' => $hotelgen->id])}}"
                                               class="btn btn-outline-primary btn-md btn float-right">
                                                <i class="fa fa-edit"></i></a>

                                                <a href="{{route('admin.category.subcategoryedit',['id' => $hotelgen->id])}}"
                                                   class="btn btn-outline-primary btn-md btn float-right">
                                                    <i class="fa fa-plus"></i></a>

                                        </td>

                                        <td style="text-align: right">
                                            <a href="{{route('admin.category.edit',['id' => $hotelgen->id])}}"
                                               class="btn btn-outline-primary btn-md">
                                                <i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.category.delete', ['id' => $hotelgen->id]) }}"
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

