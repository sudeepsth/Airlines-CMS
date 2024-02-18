<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FlightRequest extends FormRequest
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
                    'from' => ['required'],
                    'to' => ['required'],
                    'airlines' => ['required'],
                    'flight_code' => ['required'],
                    'flight_date' => ['required'],
                    'flight_time' => ['required','numeric'],
                    'total_seats' => ['required','numeric'],
                ];
                break;

            case "PATCH":
                return [
                    'from' => ['required'],
                    'to' => ['required'],
                    'airlines' => ['required'],
                    'flight_code' => ['required'],
                    'flight_date' => ['required'],
                    'flight_time' => ['required','numeric'],
                    'total_seats' => ['required','numeric'],                ];
            default:
                return [
                    'from' => ['required'],
                    'to' => ['required'],
                    'airlines' => ['required'],
                    'flight_code' => ['required'],
                    'flight_date' => ['required'],
                    'flight_time' => ['required'],
                    'total_seats' => ['required','numeric'],                ];
        }
    }
}
