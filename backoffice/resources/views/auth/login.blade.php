@extends('layouts.auth')

@section('content')
<div class="header">
    <p class="lead">Login to your account</p>
</div>
<form class="form-auth-small" action="{{route('login')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="signin-email" class="control-label sr-only">Email</label>
        <input type="email" class="form-control" id="signin-email" name="email" required placeholder="Email">
    </div>
    <div class="form-group">
        <label for="signin-password" class="control-label sr-only">Password</label>
        <input type="password" class="form-control" id="signin-password" name="password" required placeholder="Password">
    </div>
    <div class="form-group clearfix">
        <label class="fancy-checkbox element-left">
            <input type="checkbox" name="checkbox">
            <span>Remember me</span>
        </label>
    </div>
    <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
    <div class="bottom">
        <span class="helper-text"><i class="fa fa-lock"></i> <a href="{{route('password.request')}}">Forgot password?</a></span>
    </div>
</form>
@endsection
