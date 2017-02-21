@extends('layouts.auth')

@section('content')

<div class="loginbox">
    <div class="container-fluid">
        <h1>EMPODERAMIENTO, SIMPLICIDAD Y AGILIDAD
            <span>SON EL IMPULSO QUE NOS LLEVARÁ A</span>
        <span class="big">SUPERAR LA COMPETENCIA.</span></h1>
        <form method="POST" action="/auth/login" class="loginform" autocomplete="off">
            {!! csrf_field() !!}

            <h2>BIENVENIDO</h2>

            @include('flash::message')
            @include('partials.errors')
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" name="username" value="{{ old('username') }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-info btn-lg">Entrar</button>
            </div>
        </form>
    </div>
</div>
<div class="logininfo">
    <div class="container-fluid">
        <h3>
            CONVENCIÓN INTERNACIONAL PUERTO VALLARTA - MÉXICO<br /><br />
            <span>2017</span>
        </h3>
        <img src="/img/brand.png" class="img-responsive">
    </div>
</div>

    
@endsection