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
                        <form method="post" action="{{ route('admin.category.subcategorysave') }}" id="form"
                              enctype="multipart/form-data">
                            @csrf
                            @if ($subcategoryedit)
                                <input type="hidden" name="id" value="{{ $subcategoryedit->id }}">
                            @endif

                            <div id="firstproduct">
                                <div class="productdiv">
                                    <label for="" class="col-md-2">Alt Kategori İsmi</label>
                                    <div class="col-md-8">
                                        <input type="text" name="sub_category[]" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div id="moreproduct"></div>

                            <button type="button" class="btn btn-info" onclick="addProduct();">Alt Kategori Kutucuk Ekle</button>
                            <button type="button" class="btn btn-info" onclick="removeProduct();">Kutucuk Sil</button>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Gönder</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection

{{--@section('custom_js')
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection--}}

<script type="text/javascript">
    function addProduct() {
        // body...
        $('#firstproduct .productdiv').clone().find('input').val('').end().find('text').val('').end().appendTo('#moreproduct');
    }
    function removeProduct()
    {
        $('#moreproduct .productdiv').last().remove();
    }
</script>

