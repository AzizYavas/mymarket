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
                        <form method="post" action="{{ route('admin.category.subsave') }}" id="form"
                              enctype="multipart/form-data">
                            @csrf
                            @if ($subcategoryedit)
                                <input type="hidden" name="id" value="{{ $subcategoryedit->id }}">
                            @endif

                            <div class="card-body">
                                <div class="form-group">
                                @foreach($denemekanka as $key=>$allsubedit)
                                        <label>Alt Kategori</label>
                                        <input type="text" class="form-control" name="category_name[{{$allsubedit->id}}]"
                                               value="{{$allsubedit->category_name}}" required>
                                        <input type="hidden" name="id" value="{{ $allsubedit->id }}">
                                    @endforeach
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

