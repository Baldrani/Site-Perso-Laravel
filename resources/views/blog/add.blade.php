@extends('common.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="{{$postRoute}}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="{{ isset($article) ? 'PUT' : 'POST' }}">
                <input type="text" name="title" class="form-control" value="{{ $article->title or '' }}" />
                <textarea name="content" class="form-control">{{ $article->content or ''}}</textarea>
                <button type="submit">Envoyer</button>
            </form>
            <div class="categories">
                @if(isset($categoriesIsIn))
                    @foreach($categoriesIsIn as $category)
                        <button type="button" data-id="{{$category->id}}">{{$category->name}}<i class="fa fa-times" aria-hidden="true"></i></button>
                    @endforeach
                @endif
            </div>
            <select name="categories">
                    <option>Choisir une categorie</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
                <script>
                $('[name="categories"]').on('change',function(){
                    $.ajax({
                        url : '/add/category',
                        type : 'GET',
                        dataType : 'json',
                        data : {'id' : $('option:selected').val() },
                        success : function(data){
                            console.log(data);
                            $('form').append('<button type="button" data-id="'+$('option:selected').val()+'">'+$('option:selected').text()+' <i class="fa fa-times" aria-hidden="true"></i></button>')
                            $('option:selected').remove();

                        },
                        error : function(resultat, statut, erreur){
                            console.error(resultat.responseText)
                        }
                    });
                })
                $(document).on('click','[type="button"]',function(){
                    $.ajax({
                        url : '/remove/category',
                        type : 'GET',
                        dataType : 'json',
                        data : {'id' : $('option:selected').val() },
                        success : function(data){
                            console.log(data);
                            //Append option back ~~~ Retier lien
                        },
                        error : function(resultat, statut, erreur){
                            console.error(resultat.responseText)
                        }
                    });
                    $(this).remove();
                })
                </script>
            </select>
        </div>
    </div>
</div>
@endsection
