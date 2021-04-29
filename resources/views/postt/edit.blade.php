@extends('layouts.app')

@section('content')

    @include('postt.form', ['method' => 'PUT' , 'url' => url('/postt/edit/' . $post -> id)])

@endsection