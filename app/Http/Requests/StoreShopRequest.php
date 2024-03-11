<?php

namespace App\Http\Requests;

use App\Helpers\RegExpRules;
use App\Models\Shop;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property Shop $shop
 */
class StoreShopRequest extends FormRequest
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
            'rayon_id' => ['required', 'int', 'exists:rayons,id'],
            'merchant_id' => ['required', 'int', 'exists:merchants,id'],
            'name' => [
                'required', 'string', 'min:2', 'max:192',
                Rule::unique('shops')->where('merchant_id', $this->input('merchant_id'))
            ],
            'latitude' => ['required', 'string', 'max:190', 'regex:' . RegExpRules::latitude()],
            'longitude' => ['required', 'string', 'max:190', 'regex:' . RegExpRules::longitude()],
            'address' => ['nullable', 'string', 'max:190',],
            'schedule' => ['nullable', 'string', ],
            'phone' => ['nullable', 'string', 'max:190', 'regex:' . RegExpRules::phone()],
        ];
    }
}
