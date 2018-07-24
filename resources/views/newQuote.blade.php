@extends('spark::layouts.app')

@section('content')
  <new-quote :user="user" :teams="teams"></new-quote>

@endsection
