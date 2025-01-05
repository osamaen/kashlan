<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSocialMediaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {

        $id = isset($this->social_media) ? $this->social_media->id : null;
        $rules = [
            'link' => 'nullable',
        ];

        foreach(config('translatable.locales') as $locale){
            if($locale=='ar'){
                $rules += [$locale.'.title' => ['required',Rule::unique('social_media_translations','title')->ignore($id,'social_media_id')]];
            }else{
                $rules += [$locale.'.title' => 'nullable'];
            }

        }

        return $rules;
    }
}
