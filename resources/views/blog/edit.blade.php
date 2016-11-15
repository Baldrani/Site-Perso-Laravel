@extends('common.layout')

@section('content')
<section class="container">
    <div class="row">
        <div class="col-xs-12">
            <form>
                <input type="text" name="title">
                <textarea name="content" id="content" rows="10" cols="80">
                    {{$content}}
                </textarea>
                <script>
                CKEDITOR.replace( 'content' );
                </script>
            </form>
        </div>
    </div>
</section>
@endsection
