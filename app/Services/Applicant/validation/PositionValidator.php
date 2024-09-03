<?php

namespace App\Services\Applicant\validation;


class PositionValidator
{
    public static function rules()
    {
        return [
            'positions.*.office_level' => 'required|string',
            'positions.*.co_strands_region' => 'required|string',
            'positions.*.division_division_office' => 'required|string',
            'positions.*.position' => 'required|string',
        ];
    }

    public static function messages(): array
    {
        return [
            'positions.*.office_level.required' => 'Please Select A Office Level',
            'positions.*.co_strands_region' => 'Please Select A Region',
            'positions.*.division_division_office.required' => 'Please Select A Division Level',
            'positions.*.position.required' => 'Please Select A Position',
        ];
    }
}
