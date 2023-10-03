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

    public $pageTitle; // New property to store the page title

    public $submitButtonTitle; // New property to store the page title

    protected $rules = [
        'name' => 'required|string',
        'dni' => 'string',
        'age' => 'numeric',
        'born_date' => 'date',
        'insurance_companies' => 'string',
        'email' => 'email',
        'phone' => 'string',
        'address' => 'string'
    ];

    protected $listeners = [
        'delete_patient' => 'deletePatient',
        'create_patient' => 'createPatient',
        'update_patient' => 'updatePatient',
    ];

    public function render()
    {
        return view('livewire.patient.add-patient-modal');
    }



    public function submit()
    {
        // Validate the form input data
        $this->validate();

        DB::transaction(function () {
            // Prepare the data for creating a new patient
            $data = [
                'name' => $this->name,
                'age' => $this->age,
                'born_date' => $this->born_date,
                'insurance_companies' => $this->insurance_companies,
                'phone' => $this->phone,
                'address' => $this->address,
                'email' => $this->email,
            ];

            $existingPatient = Patient::where('dni', $this->dni)->first();

            if ($existingPatient) {
                $existingPatient->update($data);
                // Handle the case where a patient with the same dni already exists
                // You might want to show an error message or take a different action
            } else {
                // Continue with updateOrCreate logic
                $patient = Patient::updateOrCreate([
                    'dni' => $this->dni
                ], $data);
            }

            if ($this->edit_mode) {
                // Emit a success event with a message
                $this->emit('success', __('Paciente Actualizado'));
            } else {
                // Emit a success event with a message
                $this->emit('success', __('Paciente Creado de forma correcta'));
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
    }
    public function createPatient()
    {
        $this->reset();
        $this->pageTitle =  __('Crear Paciente');
        $this->submitButtonTitle =  __('Crear');
        $this->edit_mode = false;
    }

    public function deletePatient($id)
    {

        // Delete the user record with the specified ID
        Patient::destroy($id);

        // Emit a success event with a message
        $this->emit('success', 'Paciente Eliminado Correctamente');
    }

    public function updatePatient($id)
    {
        $this->edit_mode = true;
        $this->pageTitle =  __('Editar Paciente');
        $this->submitButtonTitle =  __('Editar');

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
