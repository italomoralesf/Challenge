<?php

namespace Challenge\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
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
        $user = auth()->user()->id;
        return [
            'name'      => 'required|max:128',
            'slug'      => 'required|max:128|unique:users,slug, ' . $user,
            'twitter'   => 'max:128',
        ];
    }
}
