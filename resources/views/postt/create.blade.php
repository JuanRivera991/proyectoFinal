@extends('layouts.app')

@section('content')

    @include('postt.form', ['method' => 'POST' , 'url' => url('/postt/create')])

@endsection