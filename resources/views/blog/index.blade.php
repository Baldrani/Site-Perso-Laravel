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
