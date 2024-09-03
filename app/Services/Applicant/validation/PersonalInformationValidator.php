<?php

namespace App\Services\Applicant\validation;
class PersonalInformationValidator
{
    public static function rules()
    {
        return [
            'surname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'dob' => 'required|date',
            'extension' => 'nullable|string|max:10',
            'birthplace' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'region' => 'required|string',
            'province' => 'required|string',
            'municipality' => 'required|string',
            'zip' => 'required|string|max:10',
            'telephone' => 'nullable|string|max:15',
            'cellphone' => 'required|string|max:15',
            'citizenship' => 'required|string|max:255',
            'languages' => 'nullable|array',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'bloodtype' => 'nullable|string|max:3',
            'email' => 'required|email|max:255',
            'sex' => 'required|string',
            'civilstatus' => 'required|string',
            'religion' => 'nullable|string|max:255',
            'gsis' => 'nullable|string|max:20',
            'pagibig' => 'nullable|string|max:20',
            'philhealth' => 'nullable|string|max:20',
            'sss' => 'nullable|string|max:20',
            'employee' => 'nullable|string|max:20',
            'tin' => 'nullable|string|max:20',
        ];
    }

    public static function messages(): array
    {
        return [
            'surname.required' => 'Surname is required.',
            'surname.string' => 'Surname must be a valid text.',
            'surname.max' => 'Surname cannot exceed 255 characters.',

            'firstname.required' => 'First Name is required.',
            'firstname.string' => 'First Name must be a valid text.',
            'firstname.max' => 'First Name cannot exceed 255 characters.',

            'middlename.string' => 'Middle Name must be a valid text.',
            'middlename.max' => 'Middle Name cannot exceed 255 characters.',

            'dob.required' => 'Date of Birth is required.',
            'dob.date' => 'Date of Birth must be a valid date.',

            'extension.string' => 'Extension must be a valid text.',
            'extension.max' => 'Extension cannot exceed 10 characters.',

            'birthplace.required' => 'Birthplace is required.',
            'birthplace.string' => 'Birthplace must be a valid text.',
            'birthplace.max' => 'Birthplace cannot exceed 255 characters.',

            'address.required' => 'Address is required.',
            'address.string' => 'Address must be a valid text.',
            'address.max' => 'Address cannot exceed 255 characters.',

            'region.required' => 'Region is required.',
            'region.string' => 'Region must be a valid text.',

            'province.required' => 'Province is required.',
            'province.string' => 'Province must be a valid text.',

            'municipality.required' => 'Municipality is required.',
            'municipality.string' => 'Municipality must be a valid text.',

            'zip.required' => 'Zip Code is required.',
            'zip.string' => 'Zip Code must be a valid text.',
            'zip.max' => 'Zip Code cannot exceed 10 characters.',

            'telephone.string' => 'Telephone Number must be a valid text.',
            'telephone.max' => 'Telephone Number cannot exceed 15 characters.',

            'cellphone.required' => 'Cellphone Number is required.',
            'cellphone.string' => 'Cellphone Number must be a valid text.',
            'cellphone.max' => 'Cellphone Number cannot exceed 15 characters.',

            'citizenship.required' => 'Citizenship is required.',
            'citizenship.string' => 'Citizenship must be a valid text.',
            'citizenship.max' => 'Citizenship cannot exceed 255 characters.',

            'languages.array' => 'Languages must be a list of values.',

            'height.numeric' => 'Height must be a number.',

            'weight.numeric' => 'Weight must be a number.',

            'bloodtype.string' => 'Blood Type must be a valid text.',
            'bloodtype.max' => 'Blood Type cannot exceed 3 characters.',

            'email.required' => 'Email Address is required.',
            'email.email' => 'Email Address must be a valid email format.',
            'email.max' => 'Email Address cannot exceed 255 characters.',

            'sex.required' => 'Sex is required.',
            'sex.string' => 'Sex must be a valid text.',

            'civilstatus.required' => 'Civil Status is required.',
            'civilstatus.string' => 'Civil Status must be a valid text.',

            'religion.string' => 'Religion must be a valid text.',
            'religion.max' => 'Religion cannot exceed 255 characters.',

            'gsis.string' => 'GSIS Number must be a valid text.',
            'gsis.max' => 'GSIS Number cannot exceed 20 characters.',

            'pagibig.string' => 'Pag-IBIG Number must be a valid text.',
            'pagibig.max' => 'Pag-IBIG Number cannot exceed 20 characters.',

            'philhealth.string' => 'PhilHealth Number must be a valid text.',
            'philhealth.max' => 'PhilHealth Number cannot exceed 20 characters.',

            'sss.string' => 'SSS Number must be a valid text.',
            'sss.max' => 'SSS Number cannot exceed 20 characters.',

            'employee.string' => 'Employee Number must be a valid text.',
            'employee.max' => 'Employee Number cannot exceed 20 characters.',

            'tin.string' => 'TIN Number must be a valid text.',
            'tin.max' => 'TIN Number cannot exceed 20 characters.',
        ];
    }
}
