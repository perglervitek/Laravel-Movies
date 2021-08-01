<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class CreateReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Allow to all users
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Rules for creating a review
        return [
            'content'=>'required|min:5|max:1000',
            'rating'=>'required|integer'
        ];
    }
}
