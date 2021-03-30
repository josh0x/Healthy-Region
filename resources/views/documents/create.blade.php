@extends('common.body')

@section('content')

    <form  action="/documents" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="field">
            <label class="label" for="title"><h2>Title </h2></label>
            <div>
                <textarea class="textarea" name="title" rows="5" cols="60" id="title"> {{old('title')}} </textarea>
                @if($errors->has('title'))
                    <p class=" is-danger">{{$errors->first('title')}}</p>
                @endif
            </div>
        </div>

        <div class="field">
            <label class="label" for="excerpt"><h2>Excerpt </h2></label>
            <div>
                <textarea  class="textarea" name="excerpt" rows="5" cols="60" id="excerpt"> {{old('excerpt')}} </textarea>
                @if($errors->has('excerpt'))
                    <p class=" is-danger">{{$errors->first('excerpt')}}</p>
                @endif
            </div>
        </div>


        <div class="field">
            <label class="label" for="type">Choose the type:</label>
            <div class="control">
                <div class="select">
                    <select class="select" name="type" id="type">
                        <option value="questionnaire">Questionnaire</option>
                        <option value="survey">Survey</option>
                        <option value="research protocol">Research Protocol</option>
                    </select>
                </div>


        <div class="field">
            <label for="file" class="label">Upload File</label>
            <div class="field-body">
                <input name="file" type="file">
            </div>
        </div>


        <div class="field">
            <button class="button" type="submit"> Submit </button>
        </div>

    </form>

@endsection