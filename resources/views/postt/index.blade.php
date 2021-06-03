@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row offset-1">
        @foreach ($posts as $post)  
        <div class=" col-md-9 my-4 "> 
            <div class="card-index border border-4 shadow fs-3">
                <div class="card-profile-index text-light py-2">
                <div class="card-title text-center"><cite title="Source Title "><a class="fs-3" href="{{url('/postt/profile/'. $post->user_id)}}">{{$post->user->name}}</a></cite></div>
                    <div class="d-flex w-100 align-items-center  justify-content-around "style="padding-left:80px;">
                        <cite title="Source Title ">{{$post->Fecha}} </cite>
                        
                        <a href="{{url('/postt/edit/' . $post->id)}}" class="btn btn-dark rounded-circle fs-3" title="Editar post"><i class="text-rigth far fa-edit"></i></a>
                        <a href="{{url('/postt/show/' . $post->id)}}" class="btn btn-primary rounded-circle fs-4"  title="Ver Post"><i class="text-center fas fa-eye"></i></a>
                    </div>
                </div>
                    <h5 class="card-header text-center">{{$post->Titulo}}</h5>
                    <p class="card-body text-center">{{$post->Contenido}}</p>
            </div>
        </div>    
        @endforeach
        {{ $posts->links() }}  
    </div> 
</div>

<div class="floating">
    <a href="{{url('/postt/create')}}" class="btn btn-outline-dark btn-fab btn-lg" id ="btn-post" title="Agregar nuevo post">
         <div class="d-flex w-100 align-items-center justify-content-around">
            <i class="material-icons pr-3" >Publicar</i>
            <i class="fas fa-plus"></i>
         </div>
    </a>
</div>
@endsection