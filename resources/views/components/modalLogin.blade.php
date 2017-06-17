<script>
//TODO Prevoir how to close
//TODO Revoi how to close améliorer fonction global
$(document).ready(function() {
    $(document).on('click','[data-purpose="modal"]', function(){
        $_ = $($(this).data('target'));
        console.log($_)
        $_.toggle(0,function(){
            $_.css('opacity','1');
            $_.css('top','calc(50vh - '+$_.height()/2+'px)');
            $_.css('left','calc(50% - '+$_.width()/2+'px)');
        });
        $('body').append('<div class="backgroundModal" data-link="#'+$_[0].id+'"></div>');
        $('body').css('overflow','hidden');
    });
    $(document).on('click', '.backgroundModal', function(){
        $_ = $($(this).data('link'));
        if($_.attr('data-close') != 'false'){
            $('body').css('overflow','');
            $_.css('opacity','0');
            $_.toggle();
            $(this).remove();
        }
    });
    $(document).on('click', '[data-purpose="closeModal"]', function(){
        $_ = $($(this).data('link'));
        if($_.attr('data-close') != 'false'){
            $('body').css('overflow','');
            $_.css('opacity','0');
            $_.toggle();
            $('.backgroundModal').remove();
        }
    });
});
</script>
<style>
    .wellModal{
        display: none;
        z-index: 999;
        position: fixed;
        opacity: 0;
        transition: 1.5s ease all;
        background: #fff;
    }
    .backgroundModal{
        z-index: 998; /* Buggy !! */
        background: #000;
        opacity: 0.5;
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }
    [data-purpose="modal"]{
        cursor: pointer;
    }
    .buttonOpeSpe{
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }
    .buttonOpeSpe:hover{
        transform: scale(1.05);
        color: #fff;
    }
    #myModal .fa{
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 2px;
        font-size: 30px;
        cursor: pointer;
    }
    #myModal .fa:hover{
        transform: scale(1.1);
    }
</style>
<div class="panel panel-default wellModal" id="myModal" style="width: 60%;">
    <div class="panel-heading">Login</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="/dologin">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>

                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                        Forgot Your Password?
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
