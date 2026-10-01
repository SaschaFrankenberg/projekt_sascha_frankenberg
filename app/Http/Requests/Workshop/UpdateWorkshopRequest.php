<?php

namespace App\Http\Requests\Workshop;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkshopRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name'         => ['required', 'string', 'max:255'],
            'description'  => ['required', 'string', 'max:500'],
            'date'         => ['required', 'date'],
            'time'         => ['required', 'date_format:H:i'],
            'location'     => ['required', 'string', 'max:255'],
            'organizer_id' => ['required', 'exists:users,id'],
            'image'        => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'image_alt'    => ['nullable', 'string', 'max:255'],
        ];
    }
}
