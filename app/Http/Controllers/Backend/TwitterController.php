<?php

namespace Challenge\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Challenge\Http\Controllers\Controller;

class TwitterController extends Controller
{   
    public function hideTweet($id)
    {
        $this->twitter->hideTweet($id);
        return redirect()->back();
    }
}
