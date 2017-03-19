@extends('layouts.app')

@section('content')
{{$article->title}}
{{$article->content}}
{{$article->categories->name or ''}}
@if(Auth::user())
    <a href="/blog/{{$article->id}}/edit">EDIT</a>
@else
    <a href="/blog/{{$article->id}}/edit">EDIT</a>
@endif
@endsection
