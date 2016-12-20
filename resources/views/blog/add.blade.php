@extends('common.layout')

@section('content')
<section class="container">
    <div class="row">
        <div class="col-xs-12">
            <select>
                <option value="0">+ Ajouter article</option>
                @foreach($articles as $a)
                <option value="{{$a->id}}">{{$a->title}}</option>
                @endforeach
            </select>
            <script type="text/javascript">
            $(document).ready(function() {
                $('select option').each(function(){
                    if($(this).val() == window.location.pathname.split('/')[window.location.pathname.split('/').length - 1] ){
                        $(this).prop('selected',true);
                    }
                });
            });
            //Change la page
            $('select').on('change',function(){
                document.location = "/blog/article/" + $(this).find('option:selected').val();
                if($(this).find('option:selected').val() == 0) document.location = "/blog/article/";
            })
            </script>
            <br><br>
            <form type="post" action="">
                <label for="title">Title :</label><br>
                <input type="text" name="title" id="title" style="width:100%;" value="{{$article->title}}"><br><br>
                <label for="title">Date :</label><br>
                <input type="text" name="date" id="date" style="width:100%;" value="{{$article->date}}"><br><br>
                <label for="content">Content :</label><br>
                <textarea name="content" id="content1" rows="10" cols="80">
                    {{$article->content}}
                </textarea>
                <input type="hidden" value="{{$article->id}}" name="id">
                <script>
                CKEDITOR.replace( 'content1' );
                // $('[href="/css/app.css"]').remove()
                </script>
            </form>
            <br>
            <button type="button" class="publish" style="margin:auto;display:block;background-color: rgb(0, 140, 14);color: #fff;">Publier</button> <br>
            <button type="button" class="erase" style="margin:auto;display:block;background-color: rgb(185, 12, 12);color: #fff;">Supprimer</button>
            <br><br>
            <script type="text/javascript">
            $('.erase').on('click',function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
                    }
                });
                $.ajax({
                    url: '/blog/article/delete',
                    type: 'POST',
                    data : {
                        id : $('[name="id"]').val(),
                    },
                    dataType: 'JSON',
                    success: function (data){
                        alert('Article supprimé')
                        window.location = "/blog";
                    },
                    error: function(e) {
                        console.log(e.responseText);
                    }
                });
            })

            $('.publish').on('click',function(){
                if($('#title').val() == "" || $('iframe').contents().find('[contenteditable="true"]').html() == "<p><br></p>"){
                    alert('Titre ou Contenu manquant');
                } else {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
                        }
                    });
                    $.ajax({
                        url: '/blog/article/ajax',
                        type: 'POST',
                        data : {
                            id : $('[name="id"]').val(),
                            date : $('[name="date"]').val(),
                            title : $('#title').val(),
                            content :  $('iframe').contents().find('[contenteditable="true"]').html(),
                        },
                        dataType: 'JSON',
                        success: function (data){
                            if(data == "Posted"){
                                alert('Article posté');
                                window.location = "/blog";
                            }
                            if(data == "Updated"){
                                alert('Article mis à jour');
                                window.location = "/blog";
                            }
                        },
                        error: function(e) {
                            console.log(e.responseText);
                        }
                    });
                }
            })
            </script>
        </div>
    </div>
</section>
@endsection
