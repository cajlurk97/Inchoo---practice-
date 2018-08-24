<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laravault - @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="icon" type="image/ico" href="logo.ico" />
    </head>

<body id="page-top" class="index">

@include('layouts.partials._navigation')

@include('layouts.partials._header')

@yield('content')

@include('layouts.partials._footer')

</body>




</html>
