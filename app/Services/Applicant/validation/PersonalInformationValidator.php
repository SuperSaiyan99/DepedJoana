<?php

namespace App\Services\Applicant\validation;
class PersonalInformationValidator
{
    public static function rules()
    {
        return [
            'personalInformation.surname' => 'required|string|max:255',
            'personalInformation.first_name' => 'required|string|max:255',
            'personalInformation.middle_name' => 'nullable|string|max:255',
            'personalInformation.name_extension' => 'nullable|string|max:255',
            'personalInformation.date_of_birth' => 'required|date',
            'personalInformation.place_of_birth' => 'required|string|max:255',
            'personalInformation.sex' => 'required|in:Male,Female',
            'personalInformation.civil_status' => 'required|in:Single,Married,Widowed,Separated,Other',
            'personalInformation.height' => 'nullable|numeric',
            'personalInformation.weight' => 'nullable|numeric',
            'personalInformation.blood_type' => 'nullable|string|max:3',
            'personalInformation.gsis_id_no' => 'nullable|string|max:255',
            'personalInformation.pag_ibig_id_no' => 'nullable|string|max:255',
            'personalInformation.philhealth_no' => 'nullable|string|max:255',
            'personalInformation.sss_no' => 'nullable|string|max:255',
            'personalInformation.tin_no' => 'nullable|string|max:255',
            'personalInformation.agency_employee_no' => 'nullable|string|max:255',
            'personalInformation.citizenship' => 'nullable|in:Filipino,Dual Citizenship',
            'personalInformation.citizenship_type' => 'nullable|in:by birth,by naturalization', // Required if 'citizenship' is 'Dual Citizenship'
            'personalInformation.country_if_dual_citizenship' => 'nullable|string|max:255', // Required if 'citizenship' is 'Dual Citizenship'
        ];
    }

    public static function messages(): array
    {
        return [
            'personalInformation.surname.required' => 'Surname is required.',
            'personalInformation.surname.string' => 'Surname must be a valid text.',
            'personalInformation.surname.max' => 'Surname cannot exceed 255 characters.',

            'personalInformation.first_name.required' => 'First Name is required.',
            'personalInformation.first_name.string' => 'First Name must be a valid text.',
            'personalInformation.first_name.max' => 'First Name cannot exceed 255 characters.',

            'personalInformation.middle_name.string' => 'Middle Name must be a valid text.',
            'personalInformation.middle_name.max' => 'Middle Name cannot exceed 255 characters.',

            'personalInformation.name_extension.string' => 'Name Extension must be a valid text.',
            'personalInformation.name_extension.max' => 'Name Extension cannot exceed 255 characters.',

            'personalInformation.date_of_birth.required' => 'Date of Birth is required.',
            'personalInformation.date_of_birth.date' => 'Date of Birth must be a valid date.',

            'personalInformation.place_of_birth.required' => 'Place of Birth is required.',
            'personalInformation.place_of_birth.string' => 'Place of Birth must be a valid text.',
            'personalInformation.place_of_birth.max' => 'Place of Birth cannot exceed 255 characters.',

            'personalInformation.sex.required' => 'Sex is required.',
            'personalInformation.sex.in' => 'Sex must be either Male or Female.',

            'personalInformation.civil_status.required' => 'Civil Status is required.',
            'personalInformation.civil_status.in' => 'Civil Status must be one of the following: Single, Married, Widowed, Separated, Other.',

            'personalInformation.height.numeric' => 'Height must be a number.',

            'personalInformation.weight.numeric' => 'Weight must be a number.',

            'personalInformation.blood_type.string' => 'Blood Type must be a valid text.',
            'blood_type.max' => 'Blood Type cannot exceed 3 characters.',

            'personalInformation.gsis_id_no.string' => 'GSIS ID Number must be a valid text.',
            'personalInformation.gsis_id_no.max' => 'GSIS ID Number cannot exceed 255 characters.',

            'personalInformation.pag_ibig_id_no.string' => 'Pag-IBIG ID Number must be a valid text.',
            'personalInformation.pag_ibig_id_no.max' => 'Pag-IBIG ID Number cannot exceed 255 characters.',

            'personalInformation.philhealth_no.string' => 'PhilHealth Number must be a valid text.',
            'personalInformation.philhealth_no.max' => 'PhilHealth Number cannot exceed 255 characters.',

            'personalInformation.sss_no.string' => 'SSS Number must be a valid text.',
            'personalInformation.sss_no.max' => 'SSS Number cannot exceed 255 characters.',

            'personalInformation.tin_no.string' => 'TIN Number must be a valid text.',
            'personalInformation.tin_no.max' => 'TIN Number cannot exceed 255 characters.',

            'personalInformation.agency_employee_no.string' => 'Agency Employee Number must be a valid text.',
            'personalInformation.agency_employee_no.max' => 'Agency Employee Number cannot exceed 255 characters.',

            'personalInformation.citizenship.in' => 'Citizenship must be either Filipino or Dual Citizenship.',

            'personalInformation.citizenship_type.in' => 'Citizenship Type must be either by birth or by naturalization.',

            'personalInformation.country_if_dual_citizenship.string' => 'Country (if Dual Citizenship) must be a valid text.',
            'personalInformation.country_if_dual_citizenship.max' => 'Country (if Dual Citizenship) cannot exceed 255 characters.',
        ];
    }
}
