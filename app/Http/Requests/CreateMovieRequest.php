<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Authorize only when user is admin
        if (Auth::check()) {
            $role = Auth::user()->role; 
            if($role == "admin"){
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //Rules for creating a movie
        return [
            'title' => 'required',
            'description' => 'required|min:100',
            'image' => 'required|image',
            'genres' => 'required'
        ];
    }
}
