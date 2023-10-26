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
}
