@extends('layouts.sidebar')

@section('title')
    Add Staff   
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
    <div style="margin-top:3rem;">
        @include('inc.error')
    </div>
    <form method="POST" action="storeStaff" enctype="multipart/form-data">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">{{ __('side.Add Staff') }}</h1>

        <label for="inputTitle " class="visually-hidden">Name</label>
        <input name="name" type="text" id="inputTitle " class="form-control" placeholder="{{ __('side.Name') }}" required autofocus>

        <div class="custom-file">
            <label for="inputTitle " class="visually-hidden">File</label>
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
