<?php

namespace Challenge\Http\Controllers;

use Challenge\Http\Requests;
use Illuminate\Http\Request;

class WebController extends Controller
{

    /**
     * Show the application home.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $posts = $this->post->lastPost($take = 3);
        return view('web.home', compact('posts'));
    }

    /**
     * Show the application post.
     *
     * @return \Illuminate\Http\Response
     */
    public function post($slug)
    {        
        $post = $this->post->slug($slug);
        $user   = $this->user->getId($post->user_id);
        $tweets = $this->twitter->tweets($user);
        
        return view('web.post', compact('post', 'tweets'));
    }

    /**
     * Show the application author.
     *
     * @return \Illuminate\Http\Response
     */
    public function author($slug)
    {
        $user   = $this->user->slug($slug);
        $posts  = $this->post->author($take = 3, $user->id);
        $tweets = $this->twitter->tweets($user);
        
        return view('web.user', compact('user', 'posts', 'tweets'));
    }
}
