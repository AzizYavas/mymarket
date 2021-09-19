<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('admin/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{route('admin.index')}}" class="h1"><b>MY</b>MARKET</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="username" value="azizim45" placeholder="Kullanıcı Adı">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" value="5845" placeholder="Şifre">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-block">Giriş</button>
                    </div>
                        <a href="{{route('admin.register')}}" class="btn btn-md btn-outline-secondary">Yeni Kullanıcı Ekle</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{asset('admin/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/js/adminlte.min.js')}}"></script>
</body>
</html>
