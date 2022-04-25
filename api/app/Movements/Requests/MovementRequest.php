<?php

namespace App\Movements\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovementRequest extends FormRequest
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
        if (!$this->movement) {
            return [
                'name' => ['required', 'string'],
            ];
        }

        return [
            'name' => ['required', 'string'],
        ];
    }
}
