<?php

namespace Challenge\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Challenge\Http\Requests;
use Challenge\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $tweets = $this->twitter->adminTweets($user);
        
        return view('backend.dashboard', compact('tweets'));
    }
}
