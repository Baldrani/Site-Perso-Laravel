@extends('common.layout')

@section('content')
<section class="container">
    <div class="row">
        <div class="col-xs-12">
            <form type="post" action="">
                <label for="title">Title</label>
                <input type="text" name="title" id="title"><br><br>
                <textarea name="content" id="content" rows="10" cols="80">
                </textarea>
                <script>
                CKEDITOR.replace( 'content' );
                </script>
                <button type="submit" name="button">Envoyer</button>
            </form>
        </div>
        
    </div>
</section>
@endsection
