<?php

namespace App\PersonalRecords\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalRecordRequest extends FormRequest
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
        if (!$this->personalRecord) {
            return [
                'personal_id' => ['required', 'integer'],
                'movement_id' => ['required', 'integer'],
                'value' => ['required', 'flot'],
                'date' => ['required', 'datetime'],
            ];
        }

        return [
            'personal_id' => ['required', 'integer'],
            'movement_id' => ['required', 'integer'],
            'value' => ['required', 'flot'],
            'date' => ['required', 'datetime'],
        ];
    }
}
