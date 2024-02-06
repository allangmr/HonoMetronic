<?php

namespace App\DataTables;

use App\Models\Claim;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;


class ClaimsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        return (new EloquentDataTable($query))
            ->rawColumns(['claim'])
            ->editColumn('id_patient', function (Claim $claim) {
                return $claim->patient->name;
            })
            ->editColumn('claim_id', function (Claim $claim) {
                return $claim->claim_id;
            })
            ->editColumn('claim_submission_date', function (Claim $claim) {
                return $claim->claim_submission_date ? \Carbon\Carbon::parse($claim->claim_submission_date)->format('d-m-Y') : '';
            })
            ->editColumn('claim_resolution_date', function (Claim $claim) {
                return $claim->claim_resolution_date ? \Carbon\Carbon::parse($claim->claim_resolution_date)->format('d-m-Y') : '';
            })
            ->editColumn('status', function (Claim $claim) {
                return $claim->status;
            })
            ->addColumn('action', function (Claim $claim) {
                return view('pages.claims.columns._actions', compact('claim'));
            })
            ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(Claim $model): QueryBuilder
    {
        return $model->newQuery();
    }
    

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('claims-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(2)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages//claims/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id_patient')->title('Paciente')->width(60)->searchable(true),
            Column::make('claim_id')->title('Reclamo')->width(30),
            Column::make('claim_submission_date')->title('Apertura')->width(30),
            Column::make('claim_resolution_date')->title('Cierre')->width(30),
            Column::make('status')->title('Estado')->width(60),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->title('Acciones')
        ];
    }
}
