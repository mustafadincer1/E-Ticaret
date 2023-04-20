<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>{{config('app.name')}}- @yield('tittle')</title>
    @include('admin.layouts.partials.head')
    @yield('head')
</head>

<body>
    @include('admin.layouts.partials.navbar')


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-3 col-lg-2 sidebar collapse" id="sidebar">
                @include('admin.layouts.partials.sidebar')
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">
                @yield('content')

            </div>
        </div>
    </div>
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src="/js/admin-app.js"></script>
</body>
</html>