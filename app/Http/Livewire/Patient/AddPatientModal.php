<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AddPatientModal extends Component
{

    public $name;
    public $dni;
    public $age;
    public $born_date;
    public $insurance_companies;
    public $email;
    public $phone;
    public $address;

    public $edit_mode = false;

    protected $rules = [
        'name' => 'required|string',
        'dni' => 'string',
        'age' => 'number',
        'born_date' => 'date',
        'insurance_companies' => 'string',
        'email' => 'email',
        'phone' => 'string',
        'address' => 'address'
    ];

    protected $listeners = [
        'delete_patient' => 'deletePatient',
        'update_patient' => 'updatePatient',
    ];

    public function submit()
    {
        // Validate the form input data
        $this->validate();

        DB::transaction(function () {
            // Prepare the data for creating a new patient
            $data = [
                'name' => $this->name,
                'dni' => $this->dni,
                'age' => $this->age,
                'born_date' => $this->born_date,
                'insurance_companies' => $this->insurance_companies,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address
            ];

            // Create a new patient record in the database
            $patient = Patient::updateOrCreate($data);

            if ($this->edit_mode) {
                // Emit a success event with a message
                $this->emit('success', __('Patient updated'));
            } else {

                // Emit a success event with a message
                $this->emit('success', __('New Patient created'));
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
    }

    public function deleteUser($id)
    {
        // Prevent deletion of current user
        if ($id == Patient::id()) {
            $this->emit('error', 'Patient cannot be deleted');
            return;
        }

        // Delete the user record with the specified ID
        Patient::destroy($id);

        // Emit a success event with a message
        $this->emit('success', 'Patient successfully deleted');
    }

    public function updatePatient($id)
    {
        $this->edit_mode = true;

        $patient = Patient::find($id);

        $this->name = $patient->name;
        $this->dni = $patient->dni;
        $this->age = $patient->age;
        $this->born_date = $patient->born_date;
        $this->insurance_companies = $patient->insurance_companies;
        $this->email = $patient->email;
        $this->phone = $patient->phone;
        $this->address = $patient->address;
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
