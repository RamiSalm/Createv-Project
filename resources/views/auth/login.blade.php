@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <h1 class="h3 mb-3 fw-normal">{{ __('Login') }}</h1>
    <label for="email" class="visually-hidden">{{ __('E-Mail Address') }}</label>
    <input placeholder="E-mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label for="password" class="visually-hidden">{{ __('Password') }}</label>
    <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Login') }}</button>
</form>
@endsection
