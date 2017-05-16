@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Olympika Entry</div>
                    <div class="panel-body">
                        <div class="col-md-8" style="float:right; text-align: center">
                            <img src="{{ asset('img/laurel-large.png') }}">
                            <h2>Maine JCL</h2>
                        </div>
                        <div class="col-md-4">
                            {!! Form::open(array('url' => 'olympika-entry')) !!}
                            <label for="event">Olympika Event Number</label>
                            <input class="form-control m-b-lg" name="event" autofocus>
                            <label for="student-id-number">Student ID Number</label>
                            <input class="form-control m-b-lg" name="student-id-number">
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
