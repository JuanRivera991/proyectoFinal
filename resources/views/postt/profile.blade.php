@extends('layouts.app')
@section('content')
<div class="container">
   
    
   <div class="row">
       @foreach ($userpost->posts as $post)  
       <div class="col-md-3 mt-2 text-center"> 
           <div class="card border border-4 shadow">
               <div class="card-title py-2"><cite title="Source Title">{{ $post->user->name}} </cite></div>
               <h5 class="card-header">{{$post->Titulo}}</h5>
               <p class="card-body">{{$post->Contenido}}</p>
               <div class="card-footer text-decoration-underline"><cite title="Source Title">{{$post->Fecha}} </cite></div>
           </div>
       </div>     
       @endforeach
     
   </div>   
</div>

@endsection