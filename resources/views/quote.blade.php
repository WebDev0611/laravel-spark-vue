@extends('spark::layouts.app')

@section('content')
  <quote :user="user" :teams="teams"></quote>

@endsection
