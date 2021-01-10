@extends('layouts.sidebar')

@section('title')
    News List  
@endsection

@section('style')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
@endsection

@section('content')
@foreach($News as $Ne)
    <div class="post m-5">
    <header class="row m-4">
        <div class="col-8">
        <h1>{{$Ne->title}}</h1>
        </div>
        <div class="col-4">

        <a href="editNews/{{$Ne->id}}">
            <button class="btn btn-success m-1">
            <i class="bi bi-pencil-square my-icons"> {{ __('side.Edit') }} </i>
            </button>
        </a>
        <a href="deleteNews/{{$Ne->id}}">
            <button class="btn btn-danger m-1">
            <i class="bi bi-x-circle my-icons"> {{ __('side.Delete') }} </i>
            </button>
        </a>
        </div>
    </header>
    <article>
        {{$Ne->body}}
        <div class="imgs m-4">
            <img src="{{ asset('storage/' . $Ne->img) }}" class="card-img-top" alt="...">
        </div>
    </article>

    </div>
@endforeach
@endsection

@section('js')
    <script src=""></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/news.js') }}"></script>
@endsection
