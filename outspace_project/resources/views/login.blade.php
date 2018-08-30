<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.naksoid.com/elephant/materialistic-blue/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Nov 2016 21:25:39 GMT -->
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::to('src/img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ URL::to('src/img/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ URL::to('src/img/favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ URL::to('src/js/manifest.json') }}">
    <link rel="mask-icon" href="{{ URL::to('src/js/manifest.json') }}" color="#0288d1">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="{{ URL::to('src/css/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/css/elephant.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/css/application.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/css/demo.min.css') }}">
</head>
<body class="layout layout-header-fixed">

<div class="layout-main">

    <div class="layout-content">
        <div class="layout-content-body">
            <div class="title-bar">
                <h1 class="title-bar-title">
                    <span class="d-ib">R.A.Spinning Mills Ltd.</span>
                </h1>

            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <div class="demo-form-wrapper">
                        <form class="form" method="post" action={{ route('login') }}>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" name = "email" type="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" name = "password" type="password">
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                            <input type = "hidden" name = "_token" value="{{ Session::token() }}">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script src="{{ URL::to('src/js/vendor.min.js') }}"></script>
<script src="{{ URL::to('src/js/elephant.min.js') }}"></script>
<script src="{{ URL::to('src/js/application.min.js') }}"></script>
<script src="{{ URL::to('src/js/demo.min.js') }}"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-83990101-1', 'auto');
    ga('send', 'pageview');
</script>
</body>

<!-- Mirrored from demo.naksoid.com/elephant/materialistic-blue/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Nov 2016 21:25:40 GMT -->
</html>