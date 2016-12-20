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
                <div id="editor">
				</div>
                <script>
                    if ( CKEDITOR.env.ie && CKEDITOR.env.version < 9 )
                    	CKEDITOR.tools.enableHtml5Elements( document );

                    // The trick to keep the editor in the sample quite small
                    // unless user specified own height.
                    CKEDITOR.config.height = 150;
                    CKEDITOR.config.width = 'auto';

                    var initSample = ( function() {
                    	var wysiwygareaAvailable = isWysiwygareaAvailable(),
                    		isBBCodeBuiltIn = !!CKEDITOR.plugins.get( 'bbcode' );

                    	return function() {
                    		var editorElement = CKEDITOR.document.getById( 'editor' );

                    		// Depending on the wysiwygare plugin availability initialize classic or inline editor.
                    		if ( wysiwygareaAvailable ) {
                    			CKEDITOR.replace( 'editor' );
                    		} else {
                    			editorElement.setAttribute( 'contenteditable', 'true' );
                    			CKEDITOR.inline( 'editor' );

                    			// TODO we can consider displaying some info box that
                    			// without wysiwygarea the classic editor may not work.
                    		}
                    	};

                    	function isWysiwygareaAvailable() {
                    		// If in development mode, then the wysiwygarea must be available.
                    		// Split REV into two strings so builder does not replace it :D.
                    		if ( CKEDITOR.revision == ( '%RE' + 'V%' ) ) {
                    			return true;
                    		}

                    		return !!CKEDITOR.plugins.get( 'wysiwygarea' );
                    	}
                    } )();
                    initSample();
                </script>
                <input type="hidden" value="{{$article->id}}" name="id">

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
