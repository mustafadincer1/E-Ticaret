<h1>{{ config('app.name') }}</h1>
<p>Sayın {{$user->name_surname}} Kayıdınız Başarılı</p>
<p>Kaydınızı aktifleştirmek için <a href="http://127.0.0.1:8000/kullanıcı/activate/{{ $user->activation_code }}">tıklayın</a> veya aşağıdaki bağlantıyı tarayıcınızda açın.</p>
<p>{{ config('app.url') }}/kullanıcı/activate/{{ $user->activation_code }}</p>