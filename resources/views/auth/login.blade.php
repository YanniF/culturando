@extends('layouts.admin')

@section('content')

<div class="container" id="login">
    <div class="content">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="logo">
                <a href="?p=login"><img src="../img/logo.png" class="img-responsive" alt="Culturando" title="Culturando"></a>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="control-label" for="username">Usuário:</label>
                <div class="inputs">
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="control-label" for="password">Senha:</label>
                <div class="inputs">
                  <input type="password" class="form-control" id="password" name="password" required>

                  @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                </div>
            </div>            
            <div class="form-group">
                <div class="botao">
                    <button type="submit" name="btnSubmit" class="btn btn-default">Entrar</button>
                </div>
            </div>
        </form>
    </div>  
</div>

@endsection
