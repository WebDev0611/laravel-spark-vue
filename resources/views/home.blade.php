@extends('spark::layouts.app')

@section('content')

<home :user="user" :teams="teams" inline-template>
    <div class="col justify-content-center">
        <div class="card card-default">
            <div class="card-header">{{__('Dashboard')}}</div>
            <div class="card-body">
                Dashboard will go here to show/link to things like <a href="/quotes">Quotes</a>
            </div>
        </div>
    </div>
</home>
@endsection
