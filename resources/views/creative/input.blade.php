@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Creative Arts Individual Results</div>
                        <div class="panel-body">
                            {!! Form::open(array('url' => 'creative-input-individual')) !!}
                            <label for="event-number">Event Number</label>
                            @if ($errors->has('event-number')) <p class="help-block" style="color:red">{{ $errors->first('event-number') }}</p> @endif
                            <input class="form-control m-b-lg" name="event-number" autofocus>
                            <label for="student-id">Student ID Number</label>
                            @if ($errors->has('student-id')) <p class="help-block" style="color:red">{{ $errors->first('student-id') }}</p> @endif
                            <input class="form-control m-b-lg" name="student-id">
                            <label for="place">Place</label>
                            @if ($errors->has('place')) <p class="help-block" style="color:red">{{ $errors->first('place') }}</p> @endif
                            <input class="form-control m-b-lg" name="place">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Creative School Results</div>
                        <div class="panel-body">
                            {!! Form::open(array('url' => 'creative-input-school')) !!}
                            <label for="event-number-school">Event Number</label>
                            <input class="form-control m-b-lg" name="event-number-school">
                            <label for="school">School Abbreviation</label>
                            <input class="form-control m-b-lg" name="school">
                            <label for="place-school">Place</label>
                            <input class="form-control m-b-lg" name="place-school">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</home>
@endsection
