<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'texto'   => 'min:0|max:500',
            'link'    => 'min:0|max:300',
            'orden'   => 'required',
            'seccion' => 'required',
            'imagen'  => 'required',
        ];
    }
}
