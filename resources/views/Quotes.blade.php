@extends('spark::layouts.app')

@section('content')

<quotes :user="user" :teams="teams"></quotes>

@endsection
