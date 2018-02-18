@extends('layouts.app')

@section('content')
@include('post.show')
@endsection

@section('right-side-bar')
@include('discuss')
@endsection