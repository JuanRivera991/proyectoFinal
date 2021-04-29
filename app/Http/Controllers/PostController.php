<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /*
    *   index function
    *   @return view
    */
    public function index(){        
        $post = Post::all();    //Enlista los posts
      
        return View ('postt.index', compact('posts'));  

    }

    /*
    *   create function: show Create Form
    *   @return view
    */
    public function create(){        
        $post = new Post();
        
        return View ('postt.index', compact('post'));  

    }

    /*
    *   store function
    *   @return view
    */
    public function store(Request $request){        
        $post = new Post($request -> all());
        $fecha = date('Y-m-d');
        $post -> Fecha = $fecha;

        if($post -> save()){
            return redirect ('postt'); 
        }
    }
}
