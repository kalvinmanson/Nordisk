@extends('layouts.auth')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"><h4>Login</h4></div>
        <div class="panel-body">
            <form method="POST" action="/auth/login">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                </div>

                <div class="form-group">
                    Password
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection