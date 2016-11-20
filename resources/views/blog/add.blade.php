@extends('common.layout')

@section('content')
<section class="container">
    <div class="row">
        <div class="col-xs-12">
            <select class="" name="">
                <option></option>
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
                    document.location = "/blog/edit/" + $(this).find('option:selected').val();
                })
            </script>
            <form type="post" action="">
                <label for="title">Title :</label><br>
                <input type="text" name="title" id="title" style="width:100%;" value="{{$article->title}}"><br><br>
                <label for="content">Content :</label><br>
                <textarea name="content" id="content" rows="10" cols="80">
                    {{$article->content}}
                </textarea>
                <input type="hidden" value="{{$article->id}}" name="id">
                <input type="hidden" value="{{$article->date}}" name="date">
                <script>
                CKEDITOR.replace( 'content' );
                </script>
            </form>
            <br>
            <button type="button" style="margin:auto;display:block;">Boom</button>
            <br><br>
            <script type="text/javascript">
            $('[type="button"]').on('click',function(){
                if($('#title').val() == "" || $('iframe').contents().find('[contenteditable="true"]').html() == "<p><br></p>"){
                    alert('Titre ou Contenu manquant');
                } else {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
                        }
                    });
                    $.ajax({
                        url: '/blog/add/ajax',
                        type: 'POST',
                        data : {
                            title : $('#title').val(),
                            content :  $('iframe').contents().find('[contenteditable="true"]').html(),
                        },
                        dataType: 'JSON',
                        success: function (data){
                            if(typeof(data === 'int')){
                                //Do something
                                alert('Article posté');
                                document.location = "/blog";
                            } else console.log('strange');
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
