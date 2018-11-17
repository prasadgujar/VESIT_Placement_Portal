@extends('templates.index')

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ URL::to('css/home.css') }}">

@endsection

@section('main')
    <div class="background">

    </div>
    <header class="masthead">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                <div class="col-lg-12 mx-auto">
                    <h1 class="brand-heading">VESIT placements</h1>
                </div>
                </div>
            </div>
        </div>
    </header>
@endsection