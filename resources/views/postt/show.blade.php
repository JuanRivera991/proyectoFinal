@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class=" offset-2 col-md-8 text-center fs-5 mt-5 h-100"> 
            <div class="cardbase-show border border-4 shadow">
                <div class="card-show text-light py-2"><cite title="Source Title text-left"><a class="fs-3" href="{{url('/postt/profile/'. $showpost->user_id)}}">{{$showpost->user->name}}</a></cite></div>
                <h5 class="card-header">{{$showpost->Titulo}}</h5>
                <p class="card-body">{{$showpost->Contenido}}</p>
                <div class="card-footer text-decoration-underline"><cite title="Source Title">{{$showpost->Fecha}} </cite></div>
            </div>
            
        </div>   
        <div class="col-12 d-flex flex-row-reverse my-3 ">
            
            <a href="{{url('/postt')}}" >   
                <div class="btn btn-primary rounded-circle fs-2">
                    <i class="fas fa-undo"></i>
                </div>
            </a>
        </div>
        
    </div>    
</div> 
@endsection