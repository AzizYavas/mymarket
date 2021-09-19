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
                        <form method="post" action="{{ route('admin.category.save') }}" enctype="multipart/form-data">
                            @csrf
                            @if ($categoryedit)
                                <input type="hidden" name="id" value="{{ $categoryedit->id }}">
                            @endif

                            <div class="card-body">

                                <div class="form-group">
                                    <label>Ana Kategori Ekle</label>
                                    <input type="text" class="form-control" name="category_name"
                                           value="{{$categoryedit->category_name}}" required>

                                    <div class="form-group">
                                        <label>AKTİF/PASİF</label>
                                        <select class="form-control" name="status">
                                            <option @if($categoryedit->status === "a") selected @else  @endif value="a">Aktif</option>
                                            <option @if($categoryedit->status === "p") selected @else  @endif value="p">Pasif</option>
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

{{--@section('custom_js')
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection--}}
