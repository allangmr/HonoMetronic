<?php

namespace App\Http\Livewire\Claim;

use App\Models\Claim;
use App\Models\Doctor;
use App\Models\Patient;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AddClaimModal extends Component
{

    public $claim_id;
    public $details;
    public $claim_submission_date;
    public $claim_resolution_date;
    public $id_patient;
    public $id_doctor;
    public $status = 'Activo';
    public $selectedDoctor;
    public $selectedPatient;

    public $edit_mode = false;

    public $pageTitle; // New property to store the page title

    public $submitButtonTitle; // New property to store the page title

    protected $rules = [
        'claim_id' => 'required|string',
        'claim_submission_date' => 'nullable|date',
        'claim_resolution_date' => 'nullable|date',
        'selectedPatient' => 'required',
        'selectedDoctor' => 'required',
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
        return view('livewire.claims.add-claim-modal', ['doctors' => $doctors, 'patients' => $patients ]);
    }



    public function submit()
    {
        // Validate the form input data
        $this->validate();
        DB::transaction(function () {
            // Prepare the data for creating a new patient
            $data = [
                'claim_id' => $this->claim_id,
                'details' => $this->details,
                'claim_submission_date' => $this->claim_submission_date,
                'claim_resolution_date' => $this->claim_resolution_date,
                'id_patient' => $this->selectedPatient,
                'id_doctor' => $this->selectedDoctor,
                'status' => $this->status,
            ];
            $existingClaim = Claim::where('claim_id', $this->claim_id)->first();
            if ($existingClaim) {
                if($this->claim_submission_date == '' || $this->claim_resolution_date == '') {
                    // Set empty values to null
                    if ($this->claim_submission_date == '') {
                        $data['claim_submission_date'] = null;
                    }

                    if ($this->claim_resolution_date == '') {
                        $data['claim_resolution_date'] = null;
                    }

                    $existingClaim->update($data);
                } else {
                    $existingClaim->update($data);
                }
                // Handle the case where a patient with the same dni already exists
                // You might want to show an error message or take a different action
            } else { 
                // Continue with updateOrCreate logic
                $claim = Claim::updateOrCreate([
                    'claim_id' => $this->claim_id
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

        $this->claim_id = $claim->claim_id;
        $this->details = $claim->details;
        $this->claim_submission_date = $claim->claim_submission_date;
        $this->claim_resolution_date = $claim->claim_resolution_date;
        $this->selectedPatient = $claim->id_patient;
        $this->selectedDoctor = $claim->id_doctor;
        $this->status = $claim->status;
    }

    public function viewClaim($id)
    {
        $this->pageTitle =  __('Detalles del Reclamo');
        $this->submitButtonTitle =  __('');

        $claim = Claim::find($id);

        $this->claim_id = $claim->claim_id;
        $this->details = $claim->details;
        $this->status = $claim->status;
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
