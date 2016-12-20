<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{$title}}</title>
        @if(!empty($metadesc))<meta name="description" content="{{$metadesc}}"/>@endif
        <link rel="stylesheet" href="/css/app.css" media="screen" title="Template">
        <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
        @if(!empty($specificHeader))
            {!!$specificHeader!!}
        @endif

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript">
        // bootstrap-ckeditor-modal-fix.js
        // hack to fix ckeditor/bootstrap compatiability bug when ckeditor appears in a bootstrap modal dialog
        //
        // Include this AFTER both bootstrap and ckeditor are loaded.

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
        </script>
    </head>
    <body>
        <nav>
            @include('common.navbar')
        </nav>
            @yield('content')
        <footer>
            @include('common.footer')
        </footer>
    </body>
</html>
