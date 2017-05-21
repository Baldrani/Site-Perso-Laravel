@extends('layouts.app')

@section('content')
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
        <section class="col-xs-12 col-sm-7">
            @foreach($articles as $article)
            <a href="/blog/{{$article->id}}">
                <div class="row">
                    <article class="col-xs-12">
                        <header>
                            <h3>{{$article -> title}}</h3>
                            <p>
                                @if($article -> updated_at != null)
                                Dernière mise à jour le <time>{{date('j M o',strtotime($article -> updated_at))}}</time><br>
                                @endif
                                Publié le <time pubtime="{{$article -> created_at}}">{{date('j M o',strtotime($article -> created_at))}}</time>
                            </p>

                        </header>
                        <section>
                            {!!$article -> content!!}
                        </section>
                        @if(Auth::user())
                        <a href="/blog/{{$article->id}}/edit">
                            <button type="button" name="button" id="{{$article -> id}}">
                                Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                        </a>
                        @endif
                    </article>
                </div>
            </a>
            @endforeach
        </section>
        <aside class="col-xs-12 col-sm-5">
            @include('components.lastArticle')    
        </aside>
    </div>
</div>
@endsection
