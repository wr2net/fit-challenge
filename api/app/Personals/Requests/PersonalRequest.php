<?php

namespace App\Personals\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalRequest extends FormRequest
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
        if (!$this->personal) {
            return [
                'name' => ['required', 'string'],
            ];
        }

        return [
            'name' => ['required', 'string'],
        ];
    }
}
