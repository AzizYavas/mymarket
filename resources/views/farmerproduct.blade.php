@extends('layouts.master')
@section('title','Ürün Ekle')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-right">
                            {{--TABLONUN SAĞINA BİR ŞEY EKLEMEK İSTERSEN BURAYA YAZ--}}
                        </div>
                        @include('admin.layout.alert')
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-success">Durum</th>
                                    <th class="text-success">id</th>
                                    <th class="text-success">Ürün Kategorisi</th>
                                    <th class="text-success">Ürün Sahibi</th>
                                    <th class="text-success">Ürün Adı</th>
                                    <th class="text-success">Ürün Fiyatı</th>
                                    <th class="text-success">Ürün Miktarı</th>
                                    <th class="text-success">Ürün Resimleri</th>
                                    <th width="115"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($homeproductlist as $allproductlist)

                                    <tr>

                                        <td>
                                            @if($allproductlist->status === "a")
                                                <span class="text-success">Aktif</span>
                                            @else
                                                <span class="text-danger">Pasif</span>
                                            @endif
                                        </td>
                                        <td>{{$allproductlist->id}}</td>
                                        <td>{{$allproductlist->category_name}}</td>
                                        <td>{{$allproductlist->far_name}}</td>
                                        <td>{{$allproductlist->prod_name}}</td>
                                        <td>{{$allproductlist->prod_price}}/TL</td>
                                        <td>{{$allproductlist->prod_quantity}}/kg</td>

                                        <td>
                                            @foreach($farmerproductimage as $image)
                                                @if($image->id == $allproductlist->id)
                                                    @foreach((array)json_decode($image->image_path,true) as $deneme)
                                                        <img src="{{asset('../../img/'.$deneme)}}"
                                                             width="50" height="50">
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </td>

                                        <td style="text-align: right">
                                            <a href="{{ route('admin.product.edit', ['id' => $allproductlist->id]) }}"
                                               class="btn btn-outline-primary btn-md">
                                                <i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.product.delete', ['id' => $allproductlist->id]) }}"
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

