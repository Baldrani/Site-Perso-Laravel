<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{$title}}</title>
        @if(!empty($metadesc))<meta name="description" content="{{$metadesc}}"/>@endif
        <link rel="stylesheet" href="/css/app.css" media="screen" title="Template">
        <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
        @if(!empty($specificHeader))
            {!!$specificHeader!!}
        @endif
    </head>
    <body>
        <nav>
            @include('common.navbar')
        </nav>
            @yield('content')
        <footer>
            @include('common.footer')
        </footer>
    </body>
</html>
