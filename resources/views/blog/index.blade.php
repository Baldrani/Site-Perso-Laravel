@extends('layouts.app')

@section('content')
<div class="container" id="home">
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
        <br>
        <br>
        <section class="col-xs-12 col-sm-8">
            @foreach($articles as $article)
                    <article>
                        <header>
                            <time pubtime="{{$article -> created_at}}">{{date('j/m',strtotime($article -> created_at))}}</time>
                            <a href="/blog/{{$article->id}}" style="display: inline-block;"><h3 style="font-family: 'Acme', sans-serif;
">{{$article -> title}}</h3></a>
                        </header>
                        <section>
                            {!!$article -> content!!}
                        </section>
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
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
            {{-- @include('components.lastArticle') --}}
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
