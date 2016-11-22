@extends('common.layout')

@section('content')
<section class="container">
    <div class="">
        <a href="/blog/article">
            <button type="button" name="button">
                Ajouter un article <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
        </a>
    </div>
    @foreach($articles as $article)
    <div class="row">
        <article class="col-xs-12">
            <header>
                <h3>{{$article -> title}}</h3>
                Publié le <time>{{date('j M o',strtotime($article -> date))}}</time>
            </header>
            <section>
                {!!$article -> content!!}
            </section>
            <button type="button" name="button" id="{{$article -> id}}">
                Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </button>
        </article>
    </div>
    @endforeach
    <br>
</section>
<script>
    $('[type="button"]').on('click', function(){
        document.location = '/blog/article/' + $(this).attr('id');
    })
</script>
@endsection
