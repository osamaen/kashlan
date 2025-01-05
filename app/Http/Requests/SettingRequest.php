<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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

        $rules = [
           // 'image' => 'required|image|mimes:jpg,jpeg,png',
          //  'default_lang' => 'required',
        ];

        foreach(config('translatable.locales') as $locale){
            if($locale=='ar'){
                $rules += [$locale.'.site_name' => 'required'];
            }else{
                $rules += [$locale.'.site_name' => 'nullable'];
            }

        }
        if(request()->isMethod('put') ){

           // $rules['image'] = 'image|mimes:jpg,jpeg,png';
        }
        return $rules;
    }
    public function attributes()
    {
        return [
            'ar.site_name' => 'اسم الموقع',
        ];
    }
}
