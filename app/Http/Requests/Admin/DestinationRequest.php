<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DestinationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case "POST":
                return [
                    'destination' => ['required','unique:destinations'],
                ];
                break;

            case "PATCH":
                return [
                    'destination' =>  ['required',Rule::unique('destinations')->ignore($this->id),],
                ];
            default:
                return [
                    'destination' => ['required','unique:destinations'],
                ];
        }
    }
}
