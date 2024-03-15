<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchFlightsRequest extends FormRequest
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
        return [
            'searchQuery.departureAirport' => 'required|exists:airports,code',
            'searchQuery.arrivalAirport' => 'required|exists:airports,code|different:searchQuery.departureAirport',
            'searchQuery.departureDate' => 'required|date_format:Y-m-d',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages()
    {
        return [
            'searchQuery.departureAirport.required' => 'Запит повинен містити аеропорт вильоту',
            'searchQuery.departureAirport.exists' => 'Не знайдено аеропорт вильоту',
            'searchQuery.arrivalAirport.required' => 'Запит повинен містити аеропорт прибуття',
            'searchQuery.arrivalAirport.exists' => 'Не знайдено аеропорт прибуття',
            'searchQuery.arrivalAirport.different' => 'Аеропорт прибуття не може збігатися з аерпортом вильоту',
            'searchQuery.departureDate.required' => 'Запит повинен містити дату вильоту',
            'searchQuery.departureDate.date_format' => 'Неправильний формат дати',
        ];
    }
}
