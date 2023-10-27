<?php

namespace App\Http\Livewire\Claim;

use App\Models\Claim;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Procedure;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AddClaimModal extends Component
{

    public $name;
    public $details;
    public $claim_submission_date;
    public $claim_resolution_date;
    public $id_patient;
    public $id_doctor;
    public $id_procedure;
    public $status = 'Activo';
    public $selectedDoctor;
    public $selectedPatient;
    public $selectedProcedure;

    public $edit_mode = false;

    public $pageTitle; // New property to store the page title

    public $submitButtonTitle; // New property to store the page title

    protected $rules = [
        'name' => 'required|string',
        'claim_submission_date' => 'date',
        'claim_resolution_date' => 'date',
        'id_patient' => 'required|string',
        'id_doctor' => 'required|string',
        'id_procedure' => 'required|string',
        'status' => 'string',
    ];

    protected $listeners = [
        'delete_claim' => 'deleteClaim',
        'create_claim' => 'createClaim',
        'update_claim' => 'updateClaim',
        'view_claim' => 'viewClaim',
    ];

    public function render()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        $procedures = Procedure::all();
        return view('livewire.claims.add-claim-modal', ['doctors' => $doctors, 'patients' => $patients, 'procedures' => $procedures ]);
    }



    public function submit()
    {
        // Validate the form input data
        $this->validate();

        DB::transaction(function () {
            // Prepare the data for creating a new patient
            $data = [
                'details' => $this->details,
                'claim_submission_date' => $this->claim_submission_date,
                'claim_resolution_date' => $this->claim_resolution_date,
                'id_patient' => $this->selectedPatient,
                'id_doctor' => $this->selectedDoctor,
                'id_procedure' => $this->selectedProcedure,
                'status' => $this->status,
            ];


            $existingClaim = Claim::where('name', $this->name)->first();
            if ($existingClaim) {
                $existingClaim->update($data);
                // Handle the case where a patient with the same dni already exists
                // You might want to show an error message or take a different action
            } else {
                // Continue with updateOrCreate logic
                $claim = Claim::updateOrCreate([
                    'name' => $this->name
                ], $data);
            }

            if ($this->edit_mode) {
                // Emit a success event with a message
                $this->emit('success', __('Reclamo Actualizado'));
            } else {
                // Emit a success event with a message
                $this->emit('success', __('Reclamo Agregado de forma correcta'));
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
    }
    public function createClaim()
    {
        $this->reset();
        $this->pageTitle =  __('Agregar Reclamo');
        $this->submitButtonTitle =  __('Agregar');
        $this->edit_mode = false;
    }

    public function deleteClaim($id)
    {

        // Delete the user record with the specified ID
        Claim::destroy($id);

        // Emit a success event with a message
        $this->emit('success', 'Reclamo Eliminado Correctamente');
    }

    public function updateClaim($id)
    {
        $this->edit_mode = true;
        $this->pageTitle =  __('Editar Reclamo');
        $this->submitButtonTitle =  __('Editar');

        $claim = Claim::find($id);

        $this->name = $claim->name;
        $this->specialty = $claim->specialty;
        $this->details = $claim->details;
        $this->status = $claim->status;
    }

    public function viewClaim($id)
    {
        $this->pageTitle =  __('Detalles del Reclamo');
        $this->submitButtonTitle =  __('');

        $claim = Claim::find($id);

        $this->name = $claim->name;
        $this->specialty = $claim->specialty;
        $this->details = $claim->details;
        $this->status = $claim->status;
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
