@extends('layouts.master')

@section('content')

    {{ Form::open() }}

        {{ Form::text('url', '',array('class' => 'input-large')) }}

        {{ $errors->first('url', '<p class="errors alert alert-error">:message</p>') }}

    {{ Form::close() }}

@endsection

@section('footer')



@endsection