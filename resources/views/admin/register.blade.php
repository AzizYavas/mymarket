<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DENEME</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('admin/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
</head>

<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="{{ route('admin.login') }}" class="h1"><b>BOOK</b>CMS</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Kayıt Olun</p>

            <form action="{{ route('admin.register') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Kullanıcı Adı">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="password" class="form-control" placeholder="Şifreniz... ">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Kayıt Ol</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="{{ asset('admin/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
</body>

</html>
