
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>{{$title ?? ''}}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('landing/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

    <!-- Custom styles for this template -->
    <link href="{{asset('landing/custom/corousel.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link rel="stylesheet" href="{{asset('landing/fontawesome/css/all.css')}}">
</head>

<style>
    .anchor{
        color: black;
    }
    .anchor::hover{
        color: black;
        font-weight: 600px;
    }
</style>

<body>
    <!-- Navbar -->
    <header>
        @include('landing.includes.navbar')
    </header>
    <!-- End Navbar -->

    <main class="container">

        <!-- Item -->
        @yield('content')
        <!-- End Item -->

    </main>

    <!-- FOOTER -->
    @include('landing.includes.footer')
    <!-- End FOOTER -->

    <script src="{{asset('landing/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
