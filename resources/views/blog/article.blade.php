@extends('layouts.app')

@section('content')
<section class="row">
    <article class="col-sm-offset-2 col-sm-8 col-xs-12">
        <header>
            @if(Auth::user())
            <!--  TODO : Set Admin + Only admin -->
            <a href="/blog/{{$article->id}}/edit">EDIT</a>
            @endif
            <h1>{{$article->title}}</h1>
        </header>
        <section>
            <p>{!!$article->content!!}</p>
        </section>
        <footer>
            @foreach($article->categories as $i=>$category)
                {{$i != count($article->categories) && $i != 0 ? '|' : '' }}
                <a href="/category/{{$category->name}}">{{$category->name}}</a>
            @endforeach
        </footer>
    </article>
    {{--
    <section class="col-xs-12 col-sm-offset-2 col-sm-8">
        <h3>Commentaires : </h3>
        @if(Auth::user())
        <input type="text" name="comment"/>
        <button type="button">Envoyer</button>
        <script>
        $('button').click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/postcomment',
                method: 'POST',
                data: {
                    article_id: '{{$article->id}}',
                    user_id: {{ Auth::id() }},
                    comment: $('[name="comment"]').val()
                },
                succes: function(data){
                    if(data == "Modération"){

                    }
                }
            })
        });
        </script>
        @else
        <p>Vous devez être connecté pour publier !</p>
        @endif
        <!-- TODO créer une page par user -->
        @foreach($comments as $comment)
        <a href="#"><strong>{{$comment->user->name}}</strong></a>
        <p>{{$comment->content}}</p>
        @endforeach
    </section>
    --}}
</section>
@endsection
