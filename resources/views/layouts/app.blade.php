<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('css/animate.css')}}" rel="stylesheet">
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <link href="{{url('css/custom.css')}}" rel="stylesheet">
    <link href="{{url('css/lc_switch.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/codemirror.css')}}">
    <link rel="stylesheet" href="{{url('css/custom.css')}}">
    
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>

<body class="fixed-sidebar">

<div id="wrapper">
@include('includes.sidebar')
<div id="page-wrapper" class="gray-bg">
@include('includes.header')


@yield('content')
@include('includes.footer')



</div>
</div>

    <!-- Scripts -->
        <script src="{{url('js/jquery-2.1.1.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{url('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{url('js/inspinia.js')}}"></script>
    <script src="{{url('js/plugins/pace/pace.min.js')}}"></script>

    <script src="{{url('js/codemirror.js')}}"></script>
    <script src="{{url('js/codescript.js')}}"></script>
</body>
</html>
