@extends('layouts.app')

@section('content')
<header class="masthead home text-center">
    <div class="row h-100 row-eq-height">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8 my-auto">
            <div class="header-content mx-auto">
                <h1 class="mb-5">{{$title}}</h1>
                <a class="btn btn-info btn-xl" href="{{ route('login') }}">Iniciar Sesion</a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 my-auto">
            <img class="img-fluid" src="images/graph.png"  alt="Graph Chart - PC"/>
        </div>
    </div>
</header>
@endsection