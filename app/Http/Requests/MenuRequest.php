<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $id = isset($this->menu) ? $this->menu->id : null;

        $rules = [
            'image' => 'image|mimes:jpg,jpeg,png',
        ];

        foreach(config('translatable.locales') as $locale){
            if($locale=='ar'){
                $rules += [$locale.'.title' => ['required',Rule::unique('menu_translations','title')->ignore($id,'menu_id')]];
            }else{
                $rules += [$locale.'.title' => 'nullable'];
            }

        }

        return $rules;
    }
}
