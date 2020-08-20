<?php

namespace App\Http\Requests\Wolves;

use App\Models\Wolf;
use Axiom\Rules\LocationCoordinates;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name' => 'sometimes|string',
            'gender' => ['sometimes', Rule::in(Wolf::GENDERS)],
            'birthdate' => 'sometimes|date',
            'location' => ['sometimes', new LocationCoordinates]
        ];
    }
}
