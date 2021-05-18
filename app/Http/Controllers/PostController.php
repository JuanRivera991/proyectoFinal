<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /*
    *   index function
    *   @return view
    */
    public function index(){        
        $posts = Post::orderBy('fecha','desc')->paginate(9);;    //Enlista los posts
        return View ('postt.index', compact('posts'));  

    }

    /*
    *   create function: show Create Form
    *   @return view
    */
    public function create(){   
        if(\Auth::user()){
            $post = new Post();
        
            return View ('postt.create', compact('post'));  
        }
    }

    /*
    *   store function
    *   @return view
    */
    public function store(Request $request){   
        
        $request->validate([
            'Titulo' => 'required',
            'Contenido' => 'required',
        ]);
        
        $post = new Post($request -> all());
        $fecha = date('Y-m-d');
        $post -> fecha = $fecha;
        $post->user_id= \Auth::id();

        if($post -> save()){
            return redirect ('/postt'); 
        }
    }

    /*
    *   edit function: Edit Post
    *   @return view
    */
    public function edit($post_id){        
        $post = Post::find($post_id);
        
        if(\Auth::user()->id==$post->user_id){
            return View('postt.edit',compact('post'));
         }else{
            Session::flash('error', 'Este no es tu post');
            return redirect('/postt');
        }

    }

    /*
    *   Update function: Update Post
    *   @return view
    */
    public function update(Request $request, $post_id){

        $request->validate([
            'Titulo' => 'required',
            'Contenido' => 'required',
        ]);

        $post=  Post::find($post_id); 
        $fecha = date('Y-m-d');
        $post->fecha=$fecha;
        $post->user_id= \Auth::id();
        
        if(\Auth::user()->id==$post->user_id){
            
        }

        if($post->update($request->all())){
            return redirect('/postt');
               }else{
                   return "algo salio mal";
           }
    }

    public function Profile($user_id){

        $userpost = User::find($user_id); 
            return View('postt.profile',compact('userpost'),); 
    }


}