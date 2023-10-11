<?php

namespace App\Http\Livewire\Procedure;

use App\Models\Procedure;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AddProcedureModal extends Component
{

    public $name;
    public $code;
    public $details;
    public $status = 'Activo';

    public $edit_mode = false;

    public $pageTitle; // New property to store the page title

    public $submitButtonTitle; // New property to store the page title

    protected $rules = [
        'name' => 'required|string',
        'code' => 'string',
        'details' => 'string',
        'status' => 'string',
    ];

    protected $listeners = [
        'delete_procedure' => 'deleteProcedure',
        'create_procedure' => 'createProcedure',
        'update_procedure' => 'updateProcedure',
        'view_procedure' => 'viewProcedure',
    ];

    public function render()
    {
        return view('livewire.procedures.add-procedure-modal');
    }



    public function submit()
    {
        // Validate the form input data
        $this->validate();

        DB::transaction(function () {
            // Prepare the data for creating a new patient
            $data = [
                'name' => $this->name,
                'details' => $this->details,
                'status' => $this->status,
            ];


            $existingProcedure = Procedure::where('code', $this->code)->first();
            if ($existingProcedure) {
                $existingProcedure->update($data);
                // Handle the case where a patient with the same dni already exists
                // You might want to show an error message or take a different action
            } else {
                // Continue with updateOrCreate logic
                $procedure = Procedure::updateOrCreate([
                    'code' => $this->code
                ], $data);
            }

            if ($this->edit_mode) {
                // Emit a success event with a message
                $this->emit('success', __('Procedimiento Actualizado'));
            } else {
                // Emit a success event with a message
                $this->emit('success', __('Procedimiento Agregado de forma correcta'));
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
    }
    public function createProcedure()
    {
        $this->reset();
        $this->pageTitle =  __('Agregar Procedimiento');
        $this->submitButtonTitle =  __('Agregar');
        $this->edit_mode = false;
    }

    public function deleteProcedure($id)
    {

        // Delete the user record with the specified ID
        Procedure::destroy($id);

        // Emit a success event with a message
        $this->emit('success', 'Procedimiento Eliminado Correctamente');
    }

    public function updateProcedure($id)
    {
        $this->edit_mode = true;
        $this->pageTitle =  __('Editar Procedimiento');
        $this->submitButtonTitle =  __('Editar');

        $procedure = Procedure::find($id);

        $this->name = $procedure->name;
        $this->code = $procedure->code;
        $this->details = $procedure->details;
        $this->status = $procedure->status;
    }

    public function viewProcedure($id)
    {
        $this->pageTitle =  __('Detalles del Procedimiento');
        $this->submitButtonTitle =  __('');

        $procedure = Procedure::find($id);

        $this->name = $procedure->name;
        $this->code = $procedure->code;
        $this->details = $procedure->details;
        $this->status = $procedure->status;
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
