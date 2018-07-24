@extends('spark::layouts.app')

@section('content')
<clients :user="user" :teams="teams"></clients>

@endsection