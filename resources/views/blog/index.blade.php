@extends('common.layout')

@section('content')
<section class="container">
    @foreach($articles as $article)
    <div class="row">
        <article class="col-xs-12">
            <header>
                <h3>{{$article -> title}}</h3>
                Publié le <time>{{date('j M o',strtotime($article -> last_date))}}</time>
            </header>
            <section>
                {{$article -> content}}
            </section>
            <button type="button" name="button">
                Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </button>
        </article>
    </div>
    @endforeach
    <div class="">
        <a href="/blog/edit">
            <button type="button" name="button">
                Ajouter un article <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
        </a>
    </div>
</section>
@endsection
