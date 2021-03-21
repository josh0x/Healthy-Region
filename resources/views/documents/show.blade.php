@extends('common.body')

@section('content')
    <section class="hero  is-medium  is-bold is-primary">
        <div class="hero-body is-centered is-primary"
        > <h1 class="fa-3x"> {{$document->title}}</h1>
            </div>

    </section>

        <div class="field">
            <h1 class="heading">{{$document->excerpt}}</h1>
            <h2 class="heading">{{$document->type}}</h2>
        </div>

        <div class="field">
            <a href="/documents/download/{{$document->file}}">Download</a>
        </div>

        <div class="field">
            <iframe src="{{url($document->file)}}"></iframe>
        </div>
@endsection