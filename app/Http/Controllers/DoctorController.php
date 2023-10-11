<?php

namespace App\Http\Controllers;

use App\DataTables\DoctorsDataTable;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    //
    public function index(DoctorsDataTable $dataTable)
    {
        // $patients = Patient::all(); // Change Paciente to Patient
        // return $dataTable->render('pages.apps.user-management.users.list');
        return $dataTable->render('pages.doctors.index'); // Change pacientes.index to patients.index
    }
}
