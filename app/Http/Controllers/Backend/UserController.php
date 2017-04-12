<?php

namespace Challenge\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Challenge\Http\Requests\UserUpdateRequest;

use Challenge\Http\Requests;
use Challenge\Http\Controllers\Controller;

class UserController extends Controller
{
    
    public function edit()
    {
        $user = $this->user->getId(auth()->user()->id);
        return view('backend.users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request)
    {
        $user = $this->user->getId(auth()->user()->id);
        
        $this->user->update($user, $request->all());
        
        return redirect()->route('dashboard')
                ->with('info', 'Perfil actualizado con éxito');
    }
    
}
