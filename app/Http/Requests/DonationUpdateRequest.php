<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationUpdateRequest extends FormRequest
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
            'tax_list_id' => ['required', 'exists:tax_lists,id'],
            'name' => ['required', 'max:255', 'string'],
            'mobile_number' => ['required', 'max:255', 'string'],
            'father_name' => ['required', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'receipt_no' => ['required', 'max:255', 'string'],
            'last_paid_amount' => ['required', 'numeric'],
            'kootam_id' => ['required', 'exists:kootams,id'],
            'caste_id' => ['required', 'exists:castes,id'],
            'remarks' => ['max:255', 'string'],
            'vagera' => ['max:255', 'string'],
        ];
    }
}
