@extends('common.body')

@section('content')

    <form  action="/researchers" method="POST">
        @csrf
            <div class="field">
                <label for="name" class="label">Name</label>
                <div class="field">
                    <textarea class="textarea" name="name" >{{old('name')}}</textarea>
                    @if($errors->has('name'))
                        <p class=" is-danger">{{$errors->first('name')}}</p>
                    @endif
                </div>
            </div>


        <div class="field">
            <label for="job" class="label">Job title</label>
            <div class="field">
                <textarea class="textarea" name="job" >{{old('job')}}</textarea>
                @if($errors->has('job'))
                    <p class=" is-danger">{{$errors->first('job')}}</p>
                @endif
            </div>
        </div>

        <div class="field">
            <label for="experience" class="label">Experience</label>
            <div class="field">
                <textarea class="textarea" name="experience" >{{old('experience')}}</textarea>
                @if($errors->has('experience'))
                    <p class=" is-danger">{{$errors->first('experience')}}</p>
                @endif
            </div>
        </div>

        <div class="field">
            <label for="email" class="label">Email</label>
            <div class="field">
                <textarea class="textarea" name="email" >{{old('email')}}</textarea>
                @if($errors->has('email'))
                    <p class=" is-danger">{{$errors->first('email')}}</p>
                @endif
            </div>
        </div>

        <div class="field">
            <label for="number" class="label">Number</label>
            <div class="field">
                <textarea class="textarea" name="number" >{{old('number')}}</textarea>
                @if($errors->has('number'))
                    <p class=" is-danger">{{$errors->first('number')}}</p>
                @endif
            </div>
        </div>

        <div class="field">
            <button class="button is-link" type="submit"> Submit </button>
        </div>

    </form>

@endsection