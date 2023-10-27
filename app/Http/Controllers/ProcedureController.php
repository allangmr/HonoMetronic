<?php

namespace App\Http\Controllers;

use App\DataTables\ProceduresDataTable;
use App\DataTables\ClaimsAssignedProcedureDatatable;
use App\Models\Procedure; // Change Paciente to Procedure
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    public function index(ProceduresDataTable $dataTable)
    {
        // $procedures = Procedure::all(); // Change Paciente to Procedure
        // return $dataTable->render('pages.apps.user-management.users.list');
        return $dataTable->render('pages.procedures.index'); // Change pacientes.index to patients.index
    }

    public function create()
    {
        return view('pages.procedures.create'); // Change pacientes.create to patients.create
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:patients|max:255', // Change pacientes to patients
            'phone' => 'required|max:20',
            'address' => 'required|max:255',
        ]);

        $procedure = Procedure::create($validatedData); // Change Paciente to Procedure

        return redirect()->route('pages.procedures.show', $procedure->id); // Change pacientes.show to patients.show
    }

    public function show(Procedure $procedure)
    {
        return view('pages.procedures.show', compact('procedure'));
    }

    public function edit(Procedure $procedure) // Change Paciente to Procedure
    {
        return view('pages.procedures.edit', compact('procedure')); // Change pacientes.edit to patients.edit
    }

    public function update(Request $request, Procedure $procedure) // Change Paciente to Procedure
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:patients,email,' . $procedure->id . '|max:255', // Change pacientes to patients
            'phone' => 'required|max:20',
            'address' => 'required|max:255',
        ]);

        $procedure->update($validatedData); // Change Paciente to Procedure

        return redirect()->route('pages.procedures.show', $procedure->id); // Change pacientes.show to patients.show
    }

    public function destroy(Procedure $procedure) // Change Paciente to Procedure
    {
        $procedure->delete(); // Change Paciente to Procedure

        return redirect()->route('pages.procedures.index'); // Change pacientes.index to patients.index
    }
}
