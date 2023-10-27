<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AddDoctorModal extends Component
{

    public $name;
    public $specialty;
    public $details;
    public $status = 'Activo';

    public $edit_mode = false;

    public $pageTitle; // New property to store the page title

    public $submitButtonTitle; // New property to store the page title

    protected $rules = [
        'name' => 'required|string',
        'specialty' => 'nullable|string',
        'details' => 'nullable|string',
        'status' => 'string',
    ];

    protected $listeners = [
        'delete_doctor' => 'deleteDoctor',
        'create_doctor' => 'createDoctor',
        'update_doctor' => 'updateDoctor',
        'view_doctor' => 'viewDoctor',
    ];

    public function render()
    {
        return view('livewire.doctors.add-doctor-modal');
    }



    public function submit()
    {
        // Validate the form input data
        $this->validate();

        DB::transaction(function () {
            // Prepare the data for creating a new patient
            $data = [
                'specialty' => $this->specialty,
                'details' => $this->details,
                'status' => $this->status,
            ];


            $existingDoctor = Doctor::where('name', $this->name)->first();
            if ($existingDoctor) {
                $existingDoctor->update($data);
                // Handle the case where a patient with the same dni already exists
                // You might want to show an error message or take a different action
            } else {
                // Continue with updateOrCreate logic
                $doctor = Doctor::updateOrCreate([
                    'name' => $this->name
                ], $data);
            }

            if ($this->edit_mode) {
                // Emit a success event with a message
                $this->emit('success', __('Doctor Actualizado'));
            } else {
                // Emit a success event with a message
                $this->emit('success', __('Doctor Agregado de forma correcta'));
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
    }
    public function createDoctor()
    {
        $this->reset();
        $this->pageTitle =  __('Agregar Doctor');
        $this->submitButtonTitle =  __('Agregar');
        $this->edit_mode = false;
    }

    public function deleteDoctor($id)
    {

        // Delete the user record with the specified ID
        Doctor::destroy($id);

        // Emit a success event with a message
        $this->emit('success', 'Doctor Eliminado Correctamente');
    }

    public function updateDoctor($id)
    {
        $this->edit_mode = true;
        $this->pageTitle =  __('Editar Doctor');
        $this->submitButtonTitle =  __('Editar');

        $doctor = Doctor::find($id);

        $this->name = $doctor->name;
        $this->specialty = $doctor->specialty;
        $this->details = $doctor->details;
        $this->status = $doctor->status;
    }

    public function viewDoctor($id)
    {
        $this->pageTitle =  __('Detalles del Doctor');
        $this->submitButtonTitle =  __('');

        $doctor = Doctor::find($id);

        $this->name = $doctor->name;
        $this->specialty = $doctor->specialty;
        $this->details = $doctor->details;
        $this->status = $doctor->status;
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
