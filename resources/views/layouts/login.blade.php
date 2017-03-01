<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>P3 | Admin</title>

    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('css/animate.css')}}" rel="stylesheet">
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <link href="{{url('css/custom.css')}}" rel="stylesheet">
    <link href="{{url('css/lc_switch.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/codemirror.css')}}">
    <link rel="stylesheet" href="{{url('css/custom.css')}}">


</head>

<body class="fixed-sidebar">

        @yield('content')
    <!-- Mainly scripts -->
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
