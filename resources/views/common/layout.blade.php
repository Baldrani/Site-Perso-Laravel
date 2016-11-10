<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{$title}}</title>
        @if(!empty($metadesc))<meta name="description" content="{{$metadesc}}"/>@endif
        <link rel="stylesheet" href="/css/app.css" media="screen" title="Template">
        @if(!empty($StylePath))<link rel="stylesheet" href="{{$StylePath}}" media="screen" title="Template">@endif
    </head>
    <body>
        <nav>
            include navbar
        </nav>
            @yield('content')
        <footer>
            include footer
        </footer>
    </body>
</html>
