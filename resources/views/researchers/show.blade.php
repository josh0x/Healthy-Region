@extends('common.body')

@section('content')
    <section class="hero  is-medium  is-bold is-primary">
        <div class="hero-body is-centered is-primary">
            <h1 class="fa-3x"> {{$researcher->name}}</h1>
            <h1 class="hero-head">{{$researcher->job}}</h1>
        </div>

    </section>


    <div>
        <h1 class="box is-link is-2">{{$researcher->experience}}</h1>
    </div>
    <img src="\{{$researcher->photo}}">
    <div>
        <h1 class="hero-head">The email:  {{$researcher->email}}</h1>
        <h1 class="hero-head">The phone number:   {{$researcher->number}}</h1>
    </div>

@endsection