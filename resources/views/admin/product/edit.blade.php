@extends('admin.layout.default')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Ürünler</a></li>
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
                        <form method="post" action="{{ route('admin.product.save') }}"
                              enctype="multipart/form-data">
                            @csrf
                            @if ($productedit)
                                <input type="hidden" name="id" value="{{ $productedit->id }}">
                            @endif

                            <div class="card-body">

                                <div class="form-group">

                                    <div class="form-group">
                                        <label>Kategoriler</label>
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
                                        <label>Çiftçiler</label>
                                        <select class="form-control" name="farmer_id">
                                            @foreach($farmerproduct as $farmerlist)
                                                <option value="{{$farmerlist->id}}">{{$farmerlist->far_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <label>Ürün Adı</label>
                                    <input type="text" class="form-control" name="prod_name"
                                           value="{{$productedit->prod_name}}" required>

                                    <label>Ürün Fiyatı / TL</label>
                                    <input type="text" class="form-control" name="prod_price"
                                           value="{{$productedit->prod_price}}" required>

                                    <label>Ürün Miktarı / Kg</label>
                                    <input type="text" class="form-control" name="prod_quantity"
                                           value="{{$productedit->prod_quantity}}" required>

                                    <label>Ürün Açıklaması</label>
                                    <input type="text" class="form-control" name="product_desc"
                                           value="{{$productedit->product_desc}}" required>

                                    <div class="form-group">
                                        <label>AKTİF/PASİF</label>
                                        <select class="form-control" name="status">
                                            <option @if($productedit->status === "a") selected
                                                    @else  @endif value="a">
                                                Aktif
                                            </option>
                                            <option @if($productedit->status === "p") selected
                                                    @else  @endif value="p">
                                                Pasif
                                            </option>
                                        </select>
                                    </div>

                                </div>

                                <label>İlk Eklenen Ana Resim</label>
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

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Gönder</button>
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


    {{--<script>
        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });
        });
    </script>--}}
@endsection

