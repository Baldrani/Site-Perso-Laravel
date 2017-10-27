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
        <section class="col-xs-12 col-md-8">
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
                        <script>
                        $(this).parent()
                        </script>
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
        <script>
            [...document.querySelectorAll('article')].forEach(a => {
                let width = 0;
                [...a.querySelectorAll('p')].forEach(p => {
                    width += p.clientHeight;
                });
                width < 70 ? a.querySelector('.fa-ellipsis-h').remove() : false;
            });
        </script>
        <aside class="col-xs-12 col-md-4">
            {{-- @include('components.lastArticle') --}}
        </aside>
        <script>
            $('.fa-ellipsis-h').click(function(){
                if($(this).hasClass('clicked')){
                    $(this).addClass('fa-ellipsis-h');
                    $(this).removeClass('fa-minus-square-o');
                    $(this).removeClass('clicked');
                    $(this).prev().css('height','70');
                } else {
                    $(this).removeClass('fa-ellipsis-h');
                    $(this).addClass('fa-minus-square-o');
                    $(this).addClass('clicked');
                    $(this).prev().css('height','auto');
                }
                // $(this).remove();
            });
        </script>
    </div>
</div>
@endsection
