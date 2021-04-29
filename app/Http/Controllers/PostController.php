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
        $posts = Post::all();    //Enlista los posts
        
        return View ('postt.index', compact('posts'));  

    }

    /*
    *   create function: show Create Form
    *   @return view
    */
    public function create(){        
        $post = new Post();
        
        return View ('postt.create', compact('post'));  

    }

    /*
    *   store function
    *   @return view
    */
    public function store(Request $request){        
        $post = new Post($request -> all());
        $fecha = date('Y-m-d');
        $post -> fecha = $fecha;

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
        
        return View ('postt.edit', compact('post'));  

    }
}
