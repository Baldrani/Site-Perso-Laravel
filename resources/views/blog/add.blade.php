@extends('common.layout')

@section('content')
<section class="container">
    <div class="row">
        <div class="col-xs-12">
            <form type="post" action="">
                <label for="title">Title :</label><br>
                <input type="text" name="title" id="title" style="width:100%;"><br><br>
                <label for="content">Content :</label><br>
                <textarea name="content" id="content" rows="10" cols="80">
                </textarea>
                <script>
                CKEDITOR.replace( 'content' );
                </script>
            </form>
            <br>
            <button type="button" style="margin:auto;display:block;">Boom</button>
            <br><br>
            <script type="text/javascript">
            $('[type="button"]').on('click',function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
                    }
                });
                $.ajax({
                    url: '/blog/add/ajax',
                    type: 'POST',
                    data : {
                        index : $('#title').val(),
                        content :  $('iframe').contents().find('[contenteditable="true"]').html(),
                    },
                    dataType: 'JSON',
                    success: function (){
                        console.log('Yes');
                    },
                    error: function(e) {
                        console.log(e.responseText);
                    }
                });
            })
            </script>
        </div>
    </div>
</section>
@endsection
