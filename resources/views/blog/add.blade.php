@extends('common.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="/blog/{{$article->id}}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <input type="text" name="title" class="form-control" value="{{$article->title or ''}}" />
                <textarea name="content" class="form-control">{{$article->content or ''}}</textarea>
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</div>
@endsection
