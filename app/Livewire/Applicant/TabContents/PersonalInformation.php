<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;

class PersonalInformation extends Component
{
    public $surname, $firstname, $middlename, $dob, $extension, $birthplace;
    public $address, $region, $province, $municipality, $zip;
    public $telephone, $cellphone, $citizenship, $height, $weight;
    public $bloodtype, $email, $sex, $civilstatus, $religion;
    public $gsis, $pagibig, $philhealth, $sss, $employee, $tin;

    protected $rules = [
        'surname' => 'required|string|max:255',
        'firstname' => 'required|string|max:255',
        'middlename' => 'nullable|string|max:255',
        'dob' => 'required|date'
      ];

    public function save()
    {
       $data = $this->validate();

        dd($data);

        session()->flash('message', 'Personal data saved successfully.');
    }
    public function render()
    {
        return view('livewire.applicant.tab-contents.personal-information');
    }
}
