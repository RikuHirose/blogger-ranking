<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141948099-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-141948099-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- meta -->
    @include('layouts.user.metadata')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ \UrlHelper::asset('/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @if( isset($lp) && $lp == true )

        @else
            @include('shared.user.header')

            <main class="">

                @if( isset($noContainer) && $noContainer == true )
                    @yield('content')
                @else
                    @include('shared.user.frame')
                    <div style="margin-bottom: 96px;"></div>
                @endif
            </main>

            @include('shared.user.footer')
        @endif

        <modals-container />
    </div>
    @include('layouts.user.scripts')
</body>
</html>
