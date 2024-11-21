<?php

namespace App\Services\Applicant\validation;
class EducationalBackgroundValidator
{
    public static function rules()
    {
        return [
            'education.elementary.school' => 'string|max:255',
            'education.elementary.course' => 'string|max:255',
            'education.elementary.from' => 'integer|min:1900|max:' . date('Y'),
            'education.elementary.to' => 'integer|min:1900|max:' . date('Y'),
            'education.elementary.units' => 'string|max:255',
            'education.elementary.graduated' => 'string|max:255',
            'education.elementary.honors' => 'string|max:255',

            'education.secondary.school' => 'string|max:255',
            'education.secondary.course' => 'string|max:255',
            'education.secondary.from' => 'integer|min:1900|max:' . date('Y'),
            'education.secondary.to' => 'integer|min:1900|max:' . date('Y'),
            'education.secondary.units' => 'string|max:255',
            'education.secondary.graduated' => 'string|max:255',
            'education.secondary.honors' => 'string|max:255',

            'education.vocational.school' => 'string|max:255',
            'education.vocational.course' => 'string|max:255',
            'education.vocational.from' => 'integer|min:1900|max:' . date('Y'),
            'education.vocational.to' => 'integer|min:1900|max:' . date('Y'),
            'education.vocational.units' => 'string|max:255',
            'education.vocational.graduated' => 'string|max:255',
            'education.vocational.honors' => 'string|max:255',

            'education.college.school' => 'string|max:255',
            'education.college.course' => 'string|max:255',
            'education.college.from' => 'integer|min:1900|max:' . date('Y'),
            'education.college.to' => 'integer|min:1900|max:' . date('Y'),
            'education.college.units' => 'string|max:255',
            'education.college.graduated' => 'string|max:255',
            'education.college.honors' => 'string|max:255',

            'education.graduate.school' => 'string|max:255',
            'education.graduate.course' => 'string|max:255',
            'education.graduate.from' => 'integer|min:1900|max:' . date('Y'),
            'education.graduate.to' => 'integer|min:1900|max:' . date('Y'),
            'education.graduate.units' => 'string|max:255',
            'education.graduate.graduated' => 'string|max:255',
            'education.graduate.honors' => 'string|max:255',
        ];
    }

    public static function messages(): array
    {
        //todo: make messages
    }
}
