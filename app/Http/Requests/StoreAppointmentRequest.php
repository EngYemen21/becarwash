<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            'package_id' => 'required|exists:packages,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'address' => 'required|string',
            'car_plate' => 'required|string',
            'car_color' => 'required|string',
            'car_model' => 'required|string',
            'car_type' => 'required|string',
        ];
    }
}
