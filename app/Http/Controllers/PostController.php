<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Events\PostSaved;

class PostController extends Controller
{
    function saveToStorage(Request $request)
    {
        $post = new Post;

        
        $post->author = $request->author;
        $post->title = $request->title;
        $post->content = $request->content;

        if($post->author){
            event(new PostSaved($post));
            return redirect('/')->with('success', 'Post has been stored successfully!');
        }

        return redirect('/')->with('success', 'There was a problem... Please check your form data');
    }
}
