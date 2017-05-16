@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Results for {{ $testName->TestName }}</div>
                    <div class="panel-body" style="font-size:18px">
                        <div class="col-md-1"> </div><div class="col-md-5"><h3>Name</h3></div><div class="col-md-4"><h3>School</h3></div><div class="col-md-2"><h3>Score</h3></div>
                    @foreach ($results as $result)
                        <div class="col-md-1" style="text-align:right">{{ $result->Place }}</div><div class="col-md-5">{{ $result->FirstName }} {{ $result->LastName }}</div><div class="col-md-4">{{ $result->School }}</div><div class="col-md-2">{{ $result->Score }}</div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
