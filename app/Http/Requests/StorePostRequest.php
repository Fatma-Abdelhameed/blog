<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class StorePostRequest extends FormRequest
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
        $usersId = (array) null;
        foreach(User::all('id') as $user){
            $usersId[] = $user['id'];
        }
        //$usersId = User::all('id')->toArray();
        return [
            'post-title'=>['required', 'min:3', Rule::unique('posts', 'title')->ignore($this->post)],
            'post-description'=>['required', 'min:10'],
            'post-creator'=>Rule::in($usersId),
        ];
    }
    public function messages()
    {
        return [
            'post-title.required'=>'Title Field is required',
            'post-title.unique'=>'Title Field has already been taken',
            'post-title.min'=>'Title Field can not be less than 3 letters',
            'post-description.required'=>'Description Field is required',
            'post-description.min'=>'Description Field can not be less than 10 letters'
        ];
    }
}
