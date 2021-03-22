
@extends('common.body')

@section('content')
    <section class="hero  is-medium  is-bold is-primary">
        <div class="hero-body is-centered is-primary"
        > <h1 class="fa-3x"> News</h1> </div>
    </section>


    <div class="box is-center">
       <h1 class="is-centered">
            Here are the last news on HZ
       </h1>
    </div>

    @foreach($news as $new)
        <div class="column is-12">
            <div class="card">
                <div class="card-content">
                    <h1> {{$new -> title}}</h1>
                </div>

                <div class="card-content">
                    <h2>
                        {{$new->excerpt}}
                    </h2>
                </div>
            </div>
        </div>
        @endforeach
@endsection
