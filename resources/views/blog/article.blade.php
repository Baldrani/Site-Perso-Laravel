@extends('layouts.app')

@section('content')
    @if(Auth::user())
        <!--  TODO : Set Admin + Only admin -->
        <a href="/blog/{{$article->id}}/edit">EDIT</a>
    @else
        <a href="/blog/{{$article->id}}/edit">EDIT</a>
    @endif
    <h1>{{$article->title}}</h1>
    <p>{!!$article->content!!}</p>
    @foreach($article->categories as $category)
        <a href="/category/{{$category->id}}">{{$category->name}}</a>
    @endforeach

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
@endsection
