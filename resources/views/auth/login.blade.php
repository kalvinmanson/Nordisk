@extends('layouts.auth')

@section('content')

<div class="loginbox">
    <div class="container-fluid">
        <h1>EMPODERAMIENTO, SIMPLICIDAD Y AGILIDAD
            <span>SON EL IMPULSO QUE NOS LLEVARÁ A</span>
        SUPERAR LA COMPETENCIA.</h1>
        <form method="POST" action="/auth/login" class="loginform">
            {!! csrf_field() !!}

            <h2>BIENVENIDO</h2>

            @include('flash::message')
            @include('partials.errors')
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
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
            <span>22 &bull; 02 &bull; 17</span>
        </h3>
        <img src="/img/brand.png" class="img-responsive">
    </div>
</div>

    
@endsection