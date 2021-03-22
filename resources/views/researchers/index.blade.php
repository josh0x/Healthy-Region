
@extends('common.body')

@section('content')
    <section class="hero  is-medium  is-bold is-primary">
        <div class="hero-body is-centered is-primary"
        > <h1 class="fa-3x"> Our Researchers</h1> </div>
    </section>


    <form  action="researchers/create">
        <button class="is-link button"  type="submit">  Add new Researcher </button>
    </form>

    @foreach($researchers as $researcher)
        <div style="margin-top: 1cm; " class="box is-success">
            <h1><a href="/researchers/{{$researcher->id}}"> {{$researcher->name}}</a></h1>
            <h2>{{$researcher->job}}</h2>
            <img src="{{$researcher->photo}}">
        </div>
    @endforeach


@endsection