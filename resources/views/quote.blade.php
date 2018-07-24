@extends('spark::layouts.app')

@section('content')

<div>
  <router-link to="/foo"> <h1>Go to Foo</h1> </router-link>
  <router-link to="/bar"> <h1>Go to Bar</h1> </router-link>


  <router-view></router-view>
</div>


  <quote :user="user" :teams="teams"></quote>

@endsection
