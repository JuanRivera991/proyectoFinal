<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\HiddenTweet;
use Illuminate\Http\JsonResponse;
use Atymic\Twitter\Facade\Twitter;

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
        if(\Auth::check()){
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
            Session::flash('postExitoso', 'Publicación exitosa');
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
        

        if($post->update($request->all())){
            Session::flash('editado', 'Publicación editada');
            return redirect('/postt');
               }else{
                   return "algo salio mal";
           }
    }

    public function Profile($user_id){
        $userpost = User::findOrFail($user_id);
        
        if($userpost->user_tweet == null){
            $twitterapi= Twitter::getUserTimeline(['screen_name' => 'Cristiano', 'count' => 20, 'response_format' => 'json']);
        }else{
            $twitterapi= Twitter::getUserTimeline(['screen_name' => $userpost->user_tweet, 'count' => 20, 'response_format' => 'json']);
        }
        
        $twitterapi= json_decode($twitterapi);
        $hidetweet = $userpost -> hidetweets;
        return View('postt.profile',compact('userpost','twitterapi','user_id','hidetweet')); 
    }

    /*Hide tweet*/
    public function hidetweet($tweet_id){
                HiddenTweet::create([
                    'tweet_id' => $tweet_id,
                    'user_id' => \Auth::user()->id
                ]);
                return response('ok',200);
    }

    /*
     *   create function:from show
 
     *   @return view
     */
    public function show($post_id){
        $showpost = Post::findOrFail($post_id);
        return View('postt.show',compact('showpost'));
    }

    //Show Tweet
    public function destroy($hidetweet_id)
        {
            $destroyhidentweet= HiddenTweet::findOrFail($hidetweet_id);
            if(isset($destroyhidentweet)){
                $destroyhidentweet->delete();
                Session::flash('borrado','Desocultaste tu tweet con exito');
                return redirect()->back();
            }
        }
}