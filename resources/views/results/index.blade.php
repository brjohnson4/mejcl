@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Results</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                            {!! Form::open(array('url' => 'test-results')) !!}
                            <h4>Full Convention Results By Test</h4>
                            <div>
                                <div class="col-md-3">
                                    <select class="form-control">
                                        <option>Fall 2016</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="test">
                                        @foreach($fall_tests as $test)
                                        <option value="{{ $test->id }}">{{ $test->TestName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="level">
                                        <option value="1">Latin 1</option>
                                        <option value="2">Latin 2</option>
                                        <option value="3">Latin 3</option>
                                        <option value="4">Latin 4</option>
                                    </select>
                                </div>
                                <div class="col-md-3" style="text-align: right">
                                    <button class="btn btn-primary">Submit</button>
                                </div>                            
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-12 m-t-md">
                            {!! Form::open(array('url' => 'test-results-school')) !!}
                            <h4>Results for {{ Auth::user()->school->NameBadge }}</h4>
                            <div>
                                <div class="col-md-3">
                                    <select class="form-control">
                                        <option>Fall 2016</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="level">
                                        <option value="0">All Levels</option>
                                        <option value="1">Latin 1</option>
                                        <option value="2">Latin 2</option>
                                        <option value="3">Latin 3</option>
                                        <option value="4">Latin 4</option>
                                    </select>
                                </div>
                                <div class="col-md-6" style="text-align: right">
                                    <button class="btn btn-primary">Submit</button>
                                </div>                            
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
