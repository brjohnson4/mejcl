@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                    <p>This is your dashboard.</p>
                    <p>There are currently <b>{{ $results }}</b> tests entered in the database.</p>
                    <p>Based on the past few years, we are likely {{ round($results/($students*5.84)*100) }}% done.</p>
                    <p><a href="{{ url('input') }}">Click here to access the testing input</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
