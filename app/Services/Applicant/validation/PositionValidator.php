<?php

namespace App\Services\Applicant\validation;


class PositionValidator
{
    public static function rules()
    {
        return [
            'positions.*.school_district' => 'required|string',
            'positions.*.position' => 'required|string',
        ];
    }

    public static function messages(): array
    {
        return [
            'positions.*.school_district.required' => 'Please Select A School District',
            'positions.*.position.required' => 'Please Select A Position',
        ];
    }
}
