<?php

namespace App\Http\Requests;

use App\Models\Rayon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property Rayon $rayon
 */
class UpdateRayonRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'city_id' => ['required', 'int', 'exists:cities,id'],
            'name' => [
                'required', 'string', 'min:2', 'max:192',
                Rule::unique('rayons')->where('city_id', $this->input('city_id'))->ignore($this->rayon)
            ],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.unique' => 'The rayon\'s name for this city has already been taken.',
        ];
    }
}
