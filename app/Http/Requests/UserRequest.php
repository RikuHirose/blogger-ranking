<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return [
            'name'              => 'string|max:255',
            'email'             => 'string|email|max:255',
            'last_mounth_sales' => 'numeric|max:10',
            'last_mounth_pv'    => 'numeric|max:10',
            'blog_url'          => 'string|max:255|nullable',
            'first_login'       => 'boolean',
        ];
    }

}
