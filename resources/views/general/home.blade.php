@extends('layouts.app')

@section('content')
    <h3>Hello, {{Auth::user()->name}}</h3>
    
@endsection