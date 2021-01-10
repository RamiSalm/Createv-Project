@extends('layouts.sidebar')

@section('title')
    Edit News    
@endsection

@section('style')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="form-signin">
    <form method="POST" action="storeNews" enctype="multipart/form-data">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">{{ __('side.Add News') }}</h1>
        <label for="inputTitle " class="visually-hidden">Title</label>
        <input name="title" type="text" id="inputTitle " class="form-control" placeholder="{{ __('side.Title') }}" required autofocus>

        <label for="inputBody" class="visually-hidden">Description</label>
        <textarea name="body" class="form-control" id="inputBody" rows="3" placeholder="{{ __('side.Description') }}" required
        autofocus></textarea>

        <div class="custom-file">
        <input name="img" type="file" class="custom-file-input form-control" id="customFile">
        </div>

        <button class="w-100 btn btn-lg btn-primary my-5" type="submit">{{ __('side.Save') }}</button>
    </form>
</div>
@endsection

@section('js')
    <script src=""></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/news.js') }}"></script>
@endsection
