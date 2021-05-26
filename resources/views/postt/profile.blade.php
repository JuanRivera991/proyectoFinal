@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row offset-1">
        @foreach ($userpost->posts as $post)  
        <div class=" col-md-4 mt-2 text-center fs-5"> 
            <div class="card border border-4 shadow">
                <div class="card-profile text-light py-2"><cite title="Source Title text-left">{{ $post->user->name}} </cite></div>
                <h5 class="card-header">{{$post->Titulo}}</h5>
                <p class="card-body">{{$post->Contents}}</p>
                <div class="card-footer text-decoration-underline"><cite title="Source Title">{{$post->Fecha}} </cite></div>
            </div>
        </div>    
        @endforeach
    </div> 
</div>

<div id="sidebar">
    <div class="toggle-btn">
        <div class="s">
        <a href="#"><i class="fab fa-twitter text-info "></i></a>
        </div>
    </div>  
    <div class="list" >
        <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" id="scroll-siderbar" >               
            <!-- titulo siderbar-->
             <!-- cuerpo del siderbar-->
            @foreach ($twitterapi as $tweet) 
            <a href="#" class="list-group-item list-group-item-action py-3">
                <div class="d-flex w-100 align-items-center justify-content-around">
                    <div class="col-10 mb-1 small"><img class="rounded-circle" src={{$tweet->user->profile_image_url}}></div>
                    <strong class="mb-1">{{$tweet->user->location}}</strong>
                </div>
                <strong class="mb-1">{{$tweet->user->name}}</strong><br>
                <small>{{$tweet->text}}</small>
            </a>
            @endforeach
        </div> 
    </div>
</div>
  
@endsection