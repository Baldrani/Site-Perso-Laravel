@extends('layouts.app')

@section('content')
<script>
    $('[title="Template"]').remove();
</script>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="{{$postRoute}}">
                {{ csrf_field() }}
                <input type="hidden" name="articleId" value="{{ $article->id or '' }}">
                <input type="hidden" name="_method" value="{{ isset($article) ? 'PUT' : 'POST' }}">
                <input type="text" name="title" class="form-control" value="{{ $article->title or '' }}" />
                <textarea name="content" class="form-control" id="cntent">{{ $article->content or ''}}</textarea>
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
            <script src="/ckeditor/ckeditor.js"></script>
                <script>
                CKEDITOR.replace( 'content' );

                $.fn.modal.Constructor.prototype.enforceFocus = function() {
                  modal_this = this
                  $(document).on('focusin.modal', function (e) {
                    if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length
                    && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select')
                    && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
                      modal_this.$element.focus()
                    }
                  })
                };

                $('[name="categories"]').on('change',function(){
                    $.ajax({
                        url : '/add/category',
                        type : 'GET',
                        dataType : 'json',
                        data : {'id' : $('option:selected').val(), 'articleId' : $('[name="articleId"]').val() },
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
                    var id = $(this).data('id');
                    var text = $(this).text();
                    $.ajax({
                        url : '/remove/category',
                        type : 'GET',
                        dataType : 'json',
                        data : {'id' : id, 'articleId' : $('[name="articleId"]').val()},
                        success : function(data){
                            console.log(data);
                            $('select').append('<option value="'+id+'">'+text+'</option>')
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
