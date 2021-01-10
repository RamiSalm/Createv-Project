@extends('layouts.app')

@section('content')
<form>
    <h1 class="h3 mb-3 fw-normal text-center">{{ __('Register') }}</h1>
    
    <label for="inputTitle " class="visually-hidden">Name</label>
    <input placeholder="Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label for="inputTitle " class="visually-hidden">Email</label>
    <input placeholder="E-mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label for="inputTitle " class="visually-hidden">Password</label>
    <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label for="inputTitle " class="visually-hidden">Confirm Password</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

    <button class="w-100 btn btn-lg btn-primary my-5" type="submit">{{ __('Register') }}</button>
</form>
@endsection
