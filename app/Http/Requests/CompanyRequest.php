<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Our task doesn't contain any authorization logic. So we just skip this step.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'symbol' => 'required|regex:/[A-Z]{4}/|size:4',
            'start_date' => 'required|date_format:Y-m-d|before_or_equal:end_date',
            'end_date' => 'required|date_format:Y-m-d|after_or_equal:start_date|before_or_equal:today',
            'email' => 'required|email',
        ];
    }
}
