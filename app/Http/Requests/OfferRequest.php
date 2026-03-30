<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    protected function prepareForValidation(){
        $this->mergeIfMissing(['status'=>'pending']);
    }
    public function rules(): array
    {
        return [
            "tarrif"=>"required|numeric|min:0",
            "desc"=>"required|string|min:4",
            "status"=>"required|string|in:pending,accepted,refused"
        ];
    }
}
