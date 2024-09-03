<?php

namespace App\Services\Applicant\validation;


class QuestionsInformationFormValidator
{
    public static function rules()
    {
        return [
            // Question 34
            'q34a' => 'required',
            'q34aDetails' => 'required_if:q34a,Yes|nullable|string',

            'q34b' => 'required',
            'q34bDetails' => 'required_if:q34b,Yes|nullable|string',

            // Question 35
            'q35a' => 'required',
            'q35aDetails' => 'required_if:q35a,Yes|nullable|string',

            'q35b' => 'required',
            'q35bDetails' => 'required_if:q35b,Yes|nullable|string',
            'q35bDateFiled' => 'required_if:q35b,Yes|nullable|date',
            'q35bStatus' => 'required_if:q35b,Yes|nullable|string',

            // Question 36
            'q36' => 'required',
            'q36Details' => 'required_if:q36,Yes|nullable|string',

            // Question 37
            'q37' => 'required',
            'q37Details' => 'required_if:q37,Yes|nullable|string',

            // Question 38
            'q38a' => 'required',
            'q38aDetails' => 'required_if:q38a,Yes|nullable|string',

            'q38b' => 'required',
            'q38bDetails' => 'required_if:q38b,Yes|nullable|string',

            // Question 39
            'q39' => 'required',
            'q39Details' => 'required_if:q39,Yes|nullable|string',

            // Question 40
            'q40a' => 'required',
            'q40aDetails' => 'required_if:q40a,Yes|nullable|string',

            'q40b' => 'required',
            'q40bDetails' => 'required_if:q40b,Yes|nullable|string',

            'q40c' => 'required',
            'q40cDetails' => 'required_if:q40c,Yes|nullable|string',
        ];
    }

    public static function messages(): array
    {
        return [
            // Question 34
            'q34a.required' => 'Please select an answer for question 34a.',
            'q34aDetails.required_if' => 'Please provide details for question 34a if you selected "Yes".',

            'q34b.required' => 'Please select an answer for question 34b.',
            'q34bDetails.required_if' => 'Please provide details for question 34b if you selected "Yes".',

            // Question 35
            'q35a.required' => 'Please select an answer for question 35a.',
            'q35aDetails.required_if' => 'Please provide details for question 35a if you selected "Yes".',

            'q35b.required' => 'Please select an answer for question 35b.',
            'q35bDetails.required_if' => 'Please provide details for question 35b if you selected "Yes".',
            'q35bDateFiled.required_if' => 'Please provide the date filed for question 35b if you selected "Yes".',
            'q35bStatus.required_if' => 'Please provide the status of the case(s) for question 35b if you selected "Yes".',

            // Question 36
            'q36.required' => 'Please select an answer for question 36.',
            'q36Details.required_if' => 'Please provide details for question 36 if you selected "Yes".',

            // Question 37
            'q37.required' => 'Please select an answer for question 37.',
            'q37Details.required_if' => 'Please provide details for question 37 if you selected "Yes".',

            // Question 38
            'q38a.required' => 'Please select an answer for question 38a.',
            'q38aDetails.required_if' => 'Please provide details for question 38a if you selected "Yes".',

            'q38b.required' => 'Please select an answer for question 38b.',
            'q38bDetails.required_if' => 'Please provide details for question 38b if you selected "Yes".',

            // Question 39
            'q39.required' => 'Please select an answer for question 39.',
            'q39Details.required_if' => 'Please provide details (country) for question 39 if you selected "Yes".',

            // Question 40
            'q40a.required' => 'Please select an answer for question 40a.',
            'q40aDetails.required_if' => 'Please specify the indigenous group for question 40a if you selected "Yes".',

            'q40b.required' => 'Please select an answer for question 40b.',
            'q40bDetails.required_if' => 'Please provide your ID No. for question 40b if you selected "Yes".',

            'q40c.required' => 'Please select an answer for question 40c.',
            'q40cDetails.required_if' => 'Please provide your ID No. for question 40c if you selected "Yes".',

          ];


    }
}
