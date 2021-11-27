<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TempleUserUpdateRequest extends FormRequest
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
            'vagera_id' => ['required', 'exists:vageras,id'],
            'caste_id' => ['required', 'exists:castes,id'],
        ];
    }
}
