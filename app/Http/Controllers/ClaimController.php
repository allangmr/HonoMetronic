<?php

namespace App\Http\Controllers;
use App\DataTables\ClaimsDataTable;

use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function index(ClaimsDataTable $dataTable)
    {
        // $patients = Patient::all(); // Change Paciente to Patient
        // return $dataTable->render('pages.apps.user-management.users.list');
        return $dataTable->render('pages.claims.index'); // Change pacientes.index to patients.index
    }
}
