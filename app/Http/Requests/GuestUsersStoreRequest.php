<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestUsersStoreRequest extends FormRequest
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
            'division_id' => ['required', 'exists:divisions,id'],
            'full_name' => ['required', 'max:255', 'string'],
        ];
    }
}
