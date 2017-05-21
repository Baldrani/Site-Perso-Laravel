@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">

<div class="container">
    @if(Auth::user())
    <div class="row">
        <a href="/blog/create">
            <button type="button" name="button">
                Ajouter un article <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
        </a>
    </div>
    @endif
    <div class="row">
        <section class="col-xs-12 col-sm-8">
            @foreach($articles as $article)
                    <article style="
    border: 2px solid grey;
    border-radius: 20px;
    padding: 10px;
">
                        <header style="
    margin-top: -15px;
">
                            <time pubtime="{{$article -> created_at}}" style="
    display: inline-block;
    font-size: 25px;
    font-weight: 900;
    padding-right: 20px;
">{{date('j/m',strtotime($article -> created_at))}}</time>
                            <a href="/blog/{{$article->id}}" style="display: inline-block;"><h3 style="font-family: 'Acme', sans-serif;
">{{$article -> title}}</h3></a>
                        </header>
                        <section style="
    height: 70px;
    transition: 1s ease all;
    overflow:hidden;
    text-align: justify;
">
                            {!!$article -> content!!}
                        </section>
                        <i class="fa fa-ellipsis-h" aria-hidden="true" style="
    text-align: center;
    width: 100%;
    font-size: 40px;
    cursor: pointer;
"></i>
                        @if(Auth::user())
                        <a href="/blog/{{$article->id}}/edit">
                            <button type="button" name="button" id="{{$article -> id}}">
                                Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                        </a>
                        @endif

                    </article>
            @endforeach
        </section>
        <aside class="col-xs-12 col-sm-4">
            @include('components.lastArticle')
        </aside>
        <script>
            $('.fa-ellipsis-h').click(function(){
                $(this).prev().css('height','auto');
                $(this).remove();
            });
        </script>
    </div>
</div>
@endsection
