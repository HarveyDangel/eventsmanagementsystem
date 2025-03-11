<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
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
            //
            "name" => ["nullable", "string", "max:255"],
            "description" => ["nullable", "string", "max:255"],
            "category" => ["nullable", "string"], // Fixed typo (Category → category)
            "venue" => ["nullable", "string"],
            "image" => ["nullable", "image", "mimes:png,jpg,jpeg|max:2048"], // Fixed image validation
            "start_date" => ["nullable", "date"],
            "end_date" => ["nullable", "date", "after_or_equal:start_date"], // Ensures valid date order
            "duration" => ["nullable", "string"],
            "status" => ["nullable", "string"],
            "comments" => ["nullable", "string"],
            "user_id" => ["nullable", "exists:users,id"], // Ensures valid user ID
        ];
    }
}
