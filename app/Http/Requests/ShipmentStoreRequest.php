<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShipmentStoreRequest extends FormRequest
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
            'mass' => 'required',
            'category' => 'required',
            'who_pay' => 'required',
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'address' => 'required|string',
            'number' => 'required|string|max:20',
            'type' => 'required',
        ];
    }
}
