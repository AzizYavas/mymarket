<img src="https://pngimg.com/uploads/welcome/welcome_PNG78.png" width="250" alt="50">
<h1>{{ config('app.name') }}</h1>
<p>Merhaba {{$farmer->far_name}} , Kaydınız başarılı bir şekilde yapıldı.</p>
<p>Kaydınızı aktifleştirmek için <a href="http://127.0.0.1:8000/user/activate/{{$farmer->activation_key}}">
        tıklayın</a> veya aşağıdaki bağlantıyı tarayınızda açın </p>
<p>http://127.0.0.1:8000/user/activate/{{$farmer->activation_key}}</p>
