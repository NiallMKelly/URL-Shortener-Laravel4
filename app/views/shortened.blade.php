@extends('layouts.master')

@section('content')

    {{ HTML::link($shortened, "url.dev/$shortened", array('class' => 'short-url')) }}

@endsection