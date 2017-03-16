@extends('common.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="{{ route('blog.'.(isset($article) ? 'update, '.$article->id  : 'store' )}}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="{{ isset($article) ? 'PUT' : 'POST' }}">
                <input type="text" name="title" class="form-control" value="{{ $article->title or '' }}" />
                <textarea name="content" class="form-control">{{ $article->content or ''}}</textarea>
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</div>
@endsection
