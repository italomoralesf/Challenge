<?php

namespace Challenge\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Challenge\Http\Requests;
use Challenge\Http\Controllers\Controller;

use Challenge\Http\Requests\PostStoreRequest;
use Challenge\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->myItems(auth()->user()->id);
        
        return view('backend.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {        
        $post = $this->post->createPost($request->all());
        
        return redirect()->route('posts.show', $post->id)
                ->with('info', 'Artículo guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $post = $this->post->getId($id);
        
        $this->authorize('pass', $post);

        return view('backend.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->post->getId($id);
        
        $this->authorize('pass', $post);

        return view('backend.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = $this->post->getId($id);
        
        $this->authorize('pass', $post);
        
        $this->post->update($post, $request->all());
        
        return redirect()->route('posts.show', $post->id)
                ->with('info', 'Artículo actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->post->getId($id);
        
        $this->authorize('pass', $post);
        
        $this->post->delete($id);
        
        return back()->with('info', 'Fue eliminado exitosamente');
    }
}
