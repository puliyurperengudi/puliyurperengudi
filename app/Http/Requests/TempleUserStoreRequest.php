<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TempleUserStoreRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'father_name' => ['required', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'mobile_number' => ['required', 'max:255', 'string'],
            'kootam_id' => ['required', 'exists:kootams,id'],
            'caste_id' => ['required', 'exists:castes,id'],
            'vagera' => ['max:255', 'string'],
            'country_id' => ['required', 'exists:countries,id'],
            'state_id' => ['required', 'exists:states,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'village_id' => ['required', 'exists:villages,id'],
        ];
    }
}
