<?php

namespace App\Services\Applicant\validation;


class WorkExperienceSheetFormValidator
{
    public static function rules()
    {
        return [
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'position' => 'required|string|max:255',
            'officeUnit' => 'required|string|max:255',
            'supervisor' => 'required|string|max:255',
            'agency' => 'required|string|max:255',
            'accomplishments' => 'nullable|string',
            'duties' => 'required|string',
        ];
    }

    public static function messages(): array
    {
        return [

        ];
    }
}
