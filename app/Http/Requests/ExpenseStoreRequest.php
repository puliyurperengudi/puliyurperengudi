<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseStoreRequest extends FormRequest
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
            'expense_type_id' => ['required', 'exists:expense_types,id'],
            'name' => ['required', 'max:255', 'string'],
            'expense_date' => ['required', 'date'],
            'paid_to' => ['required', 'max:255', 'string'],
            'bill_no' => ['required', 'max:255', 'string'],
            'amount' => ['required', 'numeric'],
        ];
    }
}
