<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class LeadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'vFullname' => 'required',
            // 'vCompany' => 'required',
            'vWhatsapp' => 'required|min:10',
            'vEmail' => 'required',
            // 'vTitle' => 'required',
            'vPlateform' => 'required',
            // 'dValue' => 'required',
            // 'vCurrency' => 'required',
            // 'vPipeline' => 'required',
            // 'dProbability' => 'required',
            // 'dExpectedStartDate' => 'required',
            // 'dExpectedCloseDate' => 'required'
       ];
    }

    public function messages()
{
    return [
            'vFullname.required' => 'Fullname field is required',
            'vCompany.required' => 'Company field is required',
            'vWhatsapp.required' => 'Whatsapp field is required',
            'vWhatsapp.min' => 'Whatsapp field minimum 10 digit required',
            'eWhatsapp_type.required' => 'Whatsapp type  field is required',
            'vEmail.required' => 'Email field is required',
            'eEmail_type.required' => 'Email_type field is required',
            // 'vTitle.required' => 'Title field is required',
            'vPlateform.required' => 'Plateform field is required',
            // 'dValue.required' => 'Value(money) field is required',
            // 'vCurrency.required' => 'Currency field is required',
            // 'vPipeline.required' => 'Pipeline field is required',
            // 'dProbability.required' => 'Probability field is required',
            // 'dExpectedStartDate.required' => 'ExpectedStartDate field is required',
            // 'dExpectedCloseDate.required' => 'ExpectedCloseDate field is required'
    ];
}
}
