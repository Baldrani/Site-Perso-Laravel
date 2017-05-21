<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @if(!empty($metadesc))<meta name="description" content="{{$metadesc}}"/>@endif
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}" media="screen" title="Template">
        <link rel="stylesheet" href="{{ elixir('css/blog.css') }}" media="screen" title="Template">
        <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
        @if(!empty($specificHeader))
            {!!$specificHeader!!}
        @endif
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="{{ elixir('/js/app.js') }}"></script>
        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
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
