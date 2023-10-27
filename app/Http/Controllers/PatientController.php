<?php

namespace App\Http\Controllers;

use App\DataTables\PatientsDataTable;
use App\DataTables\ClaimsAssignedPatientDatatable;
use App\Models\Patient; // Change Paciente to Patient
use Illuminate\Http\Request;

class PatientController extends Controller // Change PacientesController to PatientsController
{
    public function index(PatientsDataTable $dataTable)
    {
        // $patients = Patient::all(); // Change Paciente to Patient
        // return $dataTable->render('pages.apps.user-management.users.list');
        return $dataTable->render('pages.patients.index'); // Change pacientes.index to patients.index
    }

    public function create()
    {
        return view('pages.patients.create'); // Change pacientes.create to patients.create
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:patients|max:255', // Change pacientes to patients
            'phone' => 'required|max:20',
            'address' => 'required|max:255',
        ]);

        $patient = Patient::create($validatedData); // Change Paciente to Patient

        return redirect()->route('pages.patients.show', $patient->id); // Change pacientes.show to patients.show
    }

    public function show(Patient $patient, ClaimsAssignedPatientDatatable $dataTable)
    {
        return $dataTable->with('patient', $patient)
            ->render('pages.patients.show', compact('patient'));
    }

    public function edit(Patient $patient) // Change Paciente to Patient
    {
        return view('pages.patients.edit', compact('patient')); // Change pacientes.edit to patients.edit
    }

    public function update(Request $request, Patient $patient) // Change Paciente to Patient
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:patients,email,' . $patient->id . '|max:255', // Change pacientes to patients
            'phone' => 'required|max:20',
            'address' => 'required|max:255',
        ]);

        $patient->update($validatedData); // Change Paciente to Patient

        return redirect()->route('pages.patients.show', $patient->id); // Change pacientes.show to patients.show
    }

    public function destroy(Patient $patient) // Change Paciente to Patient
    {
        $patient->delete(); // Change Paciente to Patient

        return redirect()->route('pages.patients.index'); // Change pacientes.index to patients.index
    }
}
