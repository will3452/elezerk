@extends('layouts.auth')

@section('content')
<div class="header">
    <p class="lead">Forgot Password</p>
</div>
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div>
        <label for="email">{{ __('Email Address') }}</label>

        <div>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
<br/>
    <div >
        <div>
            <button type="submit" class="btn btn-primary">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </div>
</form>
@endsection
