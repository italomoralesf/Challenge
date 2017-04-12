<?php

namespace Challenge\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Challenge\Repositories\Post\PRepository;
use Challenge\Repositories\User\URepository;
use Challenge\Repositories\Twitter\TRepository;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    protected $post;
    protected $user;
    protected $twitter;
    
    public function __construct(PRepository $post, URepository $user, TRepository $twitter) {
        $this->post     = $post;
        $this->user     = $user;
        $this->twitter  = $twitter;
    }
    
}
