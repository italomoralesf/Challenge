<?php

namespace Challenge\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class PostUpdateRequest extends FormRequest
{
    protected $route;
    
    public function __construct(Route $route) {
        $this->route = $route;
    }
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'     => 'required|max:128',
            'slug'      => 'required|max:128|unique:posts,slug, '. $this->route->parameter('post'),
            'excerpt'   => 'required|max:128',
            'body'      => 'required',
        ];
    }
}
