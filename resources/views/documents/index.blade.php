@extends('common.body')

@section('content')
    <section class="hero  is-medium  is-bold is-primary">
        <div class="hero-body is-centered is-primary"
        > <h1 class="fa-3x"> Documents</h1>
            <h1 class="is-centered">
                Here are the documents in the website
            </h1></div>

    </section>


    <form  action="documents/create">
        <button class="is-warning button"  type="submit">  Create new Document </button>
    </form>

    @foreach($documents as $document)
        <div class="field box">
            <h1><a href="/documents/{{$document->id}}"> {{$document->title}}</a></h1>
            <h2>{{$document->excerpt}}</h2>
        </div>
    @endforeach

@endsection