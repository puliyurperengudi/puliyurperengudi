<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseUpdateRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'expense_date' => ['required', 'date'],
            'paid_to' => ['required', 'max:255', 'string'],
            'bill_no' => ['required', 'max:255', 'string'],
            'amount' => ['required', 'numeric'],
        ];

        if ($this->request->has('expense_type_id') && is_numeric($this->request->get('expense_type_id'))) {
            $rules = array_merge($rules, [
                'expense_type_id' => ['required', 'exists:expense_types,id'],
            ]);
        } else {
            $rules = array_merge($rules, [
                'expense_type_id' => ['required', 'max:255', 'string'],
            ]);
        }

        return $rules;
    }
}
