@extends('layouts.master')
@section('title','Ürün Ekle ve Düzenleme Sayfası')

@section('content')

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-10">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title text-success text-center">{{$title}}</h3>
                        </div>
                        <form method="post" action="#"
                              enctype="multipart/form-data">
                            @csrf

                            @if ($farmerproductedit)
                                <input type="hidden" name="id" value="{{ $farmerproductedit->id }}">
                            @endif

                            <div class="card-body">

                                <div class="form-group">

                                    <div class="form-group">
                                        <label class="text-success">Kategoriler</label>
                                        <select class="form-control" name="category_wayid">
                                            @foreach($categoryproduct as $categorylist)
                                                @if($categorylist->top_id == null)
                                                    <option
                                                        value="{{$categorylist->id}}">{{$categorylist->category_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="text-success">Çiftçiler</label>
                                        <select class="form-control" name="farmer_id">
                                            @foreach($farmerproduct as $farmerlist)
                                                <option value="{{$farmerlist->id}}">{{$farmerlist->far_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <label class="text-success">Ürün Adı</label>
                                    <input type="text" class="form-control" name="prod_name"
                                           value="{{$farmerproductedit->prod_name}}" required>

                                    <label class="text-success">Ürün Fiyatı / TL</label>
                                    <input type="text" class="form-control" name="prod_price"
                                           value="{{$farmerproductedit->prod_price}}" required>

                                    <label class="text-success">Ürün Miktarı / Kg</label>
                                    <input type="text" class="form-control" name="prod_quantity"
                                           value="{{$farmerproductedit->prod_quantity}}" required>

                                    <label class="text-success">Ürün Açıklaması</label>
                                    <input type="text" class="form-control" name="product_desc"
                                           value="{{$farmerproductedit->product_desc}}" required>

                                    <div class="form-group">
                                        <label class="text-success">AKTİF/PASİF</label>
                                        <select class="form-control" name="status">
                                            <option @if($farmerproductedit->status === "a") selected
                                                    @else  @endif value="a">
                                                Aktif
                                            </option>
                                            <option @if($farmerproductedit->status === "p") selected
                                                    @else  @endif value="p">
                                                Pasif
                                            </option>
                                        </select>
                                    </div>

                                </div>

                                <label class="text-success">İlk Eklenen Ana Resim</label>
                                <div class="input-group hdtuto control-group lst increment">
                                    <input type="file" name="filenames[]" class="myfrm form-control">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success" type="button"><i
                                                class="fldemo glyphicon glyphicon-plus"></i>Ekle
                                        </button>
                                    </div>
                                </div>
                                <div class="clone hide">
                                    <div class="hdtuto control-group lst input-group deneme" style="margin-top:10px">
                                        <input type="file" name="filenames[]" class="myfrm form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger" type="button"><i
                                                    class="fldemo glyphicon glyphicon-remove"></i> Sil
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success col-md-3"><b>Gönder</b></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection

@section('footer')
    <script>
        $(document).ready(function () {
            $(".btn-success").click(function () {
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });
            $("body").on("click", ".btn-danger", function () {
                $(this).parents(".hdtuto").remove();
            });
        });
    </script>
@endsection

