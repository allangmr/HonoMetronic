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
}
