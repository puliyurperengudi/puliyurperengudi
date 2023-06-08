<?php
namespace App\Http\Requests;

use App\Models\TempleUser;
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
        $rules = [
            'tax_list_id' => ['required', 'exists:tax_lists,id'],
            'receipt_no' => ['required', 'max:255', 'string'],
            'last_paid_amount' => ['required', 'numeric'],
            'kootam_id' => ['required', 'exists:kootams,id'],
            'caste_id' => ['required', 'exists:castes,id'],
            'remarks' => ['nullable', 'max:255', 'string'],
            'vagera' => ['nullable', 'max:255', 'string'],
        ];

        $templeUser = TempleUser::findOrFail($this->request->get('temple_user_id'));

        if ($templeUser->user_id_prefix == TempleUser::TEMPORARY_USER_ID_PREFIX) {
            $rules['kootam_id'] = ['nullable', 'exists:kootams,id'];
            $rules['caste_id'] = ['nullable', 'exists:castes,id'];
        }

        return $rules;
    }
}
