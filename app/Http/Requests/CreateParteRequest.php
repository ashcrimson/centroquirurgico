<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Parte;

class CreateParteRequest extends FormRequest
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

        return Parte::$rulesCreate;
    }

    public function messages()
    {
        return [
            'cancer.required' => 'El campo Cancer o Sospecha de Cancer es obligatorio.',
        ];
    }

}
