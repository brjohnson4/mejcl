@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Testing Results</div>
                    <div class="panel-body">
                        <div class="col-md-8" style="float:right; text-align: center">
                            <img src="{{ asset('img/laurel-large.png') }}">
                            <h2>Maine JCL</h2>
                        </div>
                        <div class="col-md-4">
                            {!! Form::open(array('url' => 'input')) !!}
                            <label for="test-number">Test Number</label>
                            @if ($errors->has('test-number')) <p class="help-block" style="color:red">{{ $errors->first('test-number') }}</p> @endif
                            <input class="form-control m-b-lg" name="test-number" autofocus>
                            <label for="student-id">Student ID Number</label>
                            @if ($errors->has('student-id')) <p class="help-block" style="color:red">{{ $errors->first('student-id') }}</p> @endif
                            <input class="form-control m-b-lg" name="student-id">
                            <label for="score">Score</label>
                            @if ($errors->has('score')) <p class="help-block" style="color:red">{{ $errors->first('score') }}</p> @endif
                            <input class="form-control m-b-lg" name="score">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                @if($lastTen->count() > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">Your Last Ten Inputs</div>
                    <div class="panel-body">
                        <div class="col-md-3"><h4>Test Number</h4></div>
                        <div class="col-md-6"><h4>Student</h4></div>
                        <div class="col-md-3"><h4>Score</h4></div>
                        <div class="col-md-12">
                        @foreach($lastTen as $test)
                            <div class="col-md-3">{{ $test->Test }}</div>
                            <div class="col-md-6">{{ $test->Studentid }} - {{ $test->delegate->FirstName }} {{ $test->delegate->LastName }} ({{ $test->delegate->School }})</div>
                            <div class="col-md-3">{{ $test->Score }}</div>
                        @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</home>
@endsection
