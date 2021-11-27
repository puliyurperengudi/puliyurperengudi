<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaxPayersStoreRequest extends FormRequest
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
            'temple_user_id' => ['required', 'exists:temple_users,id'],
            'tax_list_id' => ['required', 'exists:tax_lists,id'],
            'paid_amount' => ['required', 'numeric'],
            'paid_date' => ['required', 'date'],
            'paid_to' => ['required', 'max:255', 'string'],
            'receipt_no' => ['required', 'max:255', 'string'],
        ];
    }
}
