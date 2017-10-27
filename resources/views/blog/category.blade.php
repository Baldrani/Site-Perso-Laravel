@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Liste des articles de la catégorie {{$category}}</h1>
        <div class="col-xs-12">
            <ul>
                @foreach($articles as $article)
                    <li>
                        <a href="/blog/{{$article->id}}">{{$article->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
