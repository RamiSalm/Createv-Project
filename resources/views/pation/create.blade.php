@extends('layouts.sidebar')

@section('title')
    Add Pation  
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

    <form method="POST" action="/storePation" enctype="multipart/form-data">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">{{ __('side.Add Patient') }}</h1>

        <label for="inputTitle " class="visually-hidden">Name</label>
        <input name="name" type="text" id="inputTitle " class="form-control" placeholder="{{ __('side.Name') }}" required autofocus>

        <label for="inputTitle " class="visually-hidden">Number</label>
        <input name="number" type="text" id="inputTitle " class="form-control" placeholder="{{ __('side.Number') }}" required autofocus>

        <label for="inputTitle " class="visually-hidden">Addreess</label>
        <input name="address" type="text" id="inputTitle " class="form-control" placeholder="{{ __('side.Address') }}" required autofocus>

        <div class="custom-file">
            <label for="inputTitle " class="visually-hidden">File</label>
            <input name="img" type="file" class="custom-file-input form-control" id="customFile">
        </div>

        <label for="inputTitle " class="visually-hidden">Username</label>
        <input name="username" type="text" id="inputTitle " class="form-control" placeholder="{{ __('side.User Name') }}" required autofocus>

        <label for="inputTitle " class="visually-hidden">Password</label>
        <input name="pass" type="text" id="inputTitle " class="form-control" placeholder="{{ __('side.Password') }}" required autofocus>

        <label for="inputTitle " class="visually-hidden">Age</label>
        <input name="age" type="text" id="inputTitle " class="form-control" placeholder="{{ __('side.Age') }}" required autofocus>

        <label for="inputTitle " class="visually-hidden">Result</label>
        <select name="resault" class="custom-select form-control" multiple>
            <option selected disabled>{{ __('side.Resault') }}</option>
            <option value="قيد الاختبار"> {{ __('side.Under test') }} </option>
            <option value="تم الاختبار">{{ __('side.Done') }} </option>
        </select>

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
