<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>E-Ticaret Admin</title>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <div class="container">
        <form class="form-signin"  method="POST" action="{{route('admin.login')}}">
            @csrf

            <img src="/img/logo.png" class="logo">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
            <label for="email" class="sr-only">Email address</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required aut>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="rememberme" value="1" checked> Beni Hatırla
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <div class="links">
                <a href="{{route('anasayfa')}}">&larr; Siteye Dön</a>
            </div>
        </form>
    </div>
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

</body>

</html>