@extends('layouts.sidebar')

@section('title')
    All Staff   
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
<table class="table post my-5 p-4">
    <thead class="thead-light">
        <tr>
            <th style="width: 3rem;" scope="col"> # </th>
            <th style="width: 7rem;" scope="col"> {{ __('side.Avatar') }} </th>
            <th scope="col"> {{ __('side.Name') }} </th>
            <th style="width: 15rem;" scope="col"> {{ __('side.action') }} </th>
        </tr>
    </thead>
    <tbody>
        @foreach($Staffs as $Staff)
        <tr>
            <th style="vertical-align: middle;" scope="row">{{$loop->iteration}}</th>
            <td style="">
                <div class="avatar">
                    <img src="{{ asset('storage/' . $Staff->img) }}"
                        class="card-img-top" height="" width="">
                </div>
            </td>
            <td style="vertical-align: middle;">{{$Staff->name}}</td>
            <td style="vertical-align: middle;">
                <a href="editStaff/{{$Staff->id}}">
                    <button class="btn btn-success m-1">
                    <i class="bi bi-pencil-square my-icons"> {{ __('side.Edit') }}</i>
                    </button>
                </a>
                <a href="deleteStaff/{{$Staff->id}}">
                    <button class="btn btn-danger m-1">
                    <i class="bi bi-x-circle my-icons"> {{ __('side.Delete') }}</i>
                    </button>
                </a>
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>
@endsection

@section('js')
    <script src=""></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/news.js') }}"></script>
@endsection
