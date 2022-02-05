<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationStoreRequest extends FormRequest
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
        $rules = [
            'tax_list_id' => ['required', 'exists:tax_lists,id'],
            'receipt_no' => ['required', 'max:255', 'string'],
            'last_paid_amount' => ['required', 'numeric'],
            'kootam_id' => ['required', 'exists:kootams,id'],
            'caste_id' => ['required', 'exists:castes,id'],
            'remarks' => ['max:255', 'string'],
            'vagera' => ['max:255', 'string'],
        ];

        if ($this->request->get('user_type') == 'new-user') {
            $rules = array_merge($rules, [
                'name' => ['required', 'max:255', 'string'],
                'mobile_number' => ['required', 'max:255', 'string'],
                'father_name' => ['required', 'max:255', 'string'],
                'address' => ['required', 'max:255', 'string'],
            ]);
        } else {
            $rules = array_merge($rules, [
                'temple_user_id' => ['required', 'exists:temple_users,id'],
            ]);
        }
        return $rules;
    }
}
