<x-default-layout>
    @section('title')
    Información del Paciente
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('patients.show', $patient) }}
    @endsection
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
            <!--begin::Card-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Summary-->
                    <!--begin::User Info-->
                    <div class="d-flex flex-center flex-column py-5">
                        <!--begin::Name-->
                        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3 text-uppercase">{{ $patient->name }}</a>
                        <!--end::Name-->
                        <!--begin::Info-->
                        <!--begin::Info heading-->
                        <div class="fw-bold mb-3">Estado de Reclamos
                            <span class="ms-2" ddata-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Number of support tickets assigned, closed and pending this week.">
                                <i class="ki-duotone ki-information fs-7">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </div>
                        <!--end::Info heading-->
                        <div class="d-flex flex-wrap flex-center">
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-2 mb-3">
                                <div class="fs-4 fw-bold text-gray-700">
                                    <span class="w-75px">2</span>
                                    <i class="ki-duotone ki-arrow-up fs-3 text-success">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="fw-semibold text-muted">Total</div>
                            </div>
                            <!--end::Stats-->
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-2  mb-3">
                                <div class="fs-4 fw-bold text-gray-700">
                                    <span class="w-50px">1</span>
                                    <i class="ki-duotone ki-arrow-up fs-3 text-success">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="fw-semibold text-muted">Activo</div>
                            </div>
                            <!--end::Stats-->
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-2 mb-3">
                                <div class="fs-4 fw-bold text-gray-700">
                                    <span class="w-50px">1</span>
                                    <i class="ki-duotone ki-arrow-down fs-3 text-danger">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="fw-semibold text-muted">Cerrado</div>
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User Info-->
                    <!--end::Summary-->
                    <!--begin::Details toggle-->
                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Datos del Paciente
                            <span class="ms-2 rotate-180">
                                <i class="ki-duotone ki-down fs-3"></i>
                            </span>
                        </div>
                        <!-- <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
                            <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">Editar</a>
                        </span> -->
                    </div>
                    <!--end::Details toggle-->
                    <div class="separator"></div>
                    <!--begin::Details content-->
                    <div id="kt_user_view_details" class="collapse show">
                        <div class="pb-5 fs-6">
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Cedula</div>
                            <div class="text-gray-600">{{ $patient->dni ? $patient->dni : 'No Definida' }}</div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Edad</div>
                            <div class="text-gray-600">{{ $patient->age ? $patient->age . 'años' : 'No Definida' }}</div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Fecha de Nacimiento</div>
                            <div class="text-gray-600">{{ $patient->born_date ? \Carbon\Carbon::parse($patient->born_date)->format('d-m-Y') : 'No Definida' }}</div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Aseguradoras</div>
                            <div class="text-gray-600">{{ $patient->insurance_companies ? $patient->insurance_companies : 'No Definidas'}}</div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Correo</div>
                            <div class="text-gray-600">
                                <a href="mailto:{{ $patient->email }}" class="text-gray-600 text-hover-primary">{{$patient->email  ? $patient->email : 'No Definido'}}</a>
                            </div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Telefono</div>
                            <div class="text-gray-600">{{ $patient->phone ? $patient->phone : 'No Definido' }}</div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Direccion</div>
                            <div class="text-gray-600">{{ $patient->address ? $patient->address : 'No Definida'}}</div>
                        </div>
                    </div>
                    <!--end::Details content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Sidebar-->
        <!--begin::Content-->

        <div class="flex-lg-row-fluid ms-lg-15">
            <!-- <div class="d-flex justify-content-end mb-5"> -->
            <!--begin::Action menu-->
            <!-- <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Opciones
                    <i class="ki-duotone ki-down fs-2 me-0"></i></a> -->
            <!--begin::Menu-->
            <!-- <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6" data-kt-menu="true"> -->
            <!--begin::Menu item-->
            <!-- <span class="menu-item px-5" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Editar Paciente">
                        <a href="#" class="menu-link px-5" data-bs-toggle="modal" data-kt-patient-id="{{ $patient->id }}" data-bs-target="#kt_modal_add_patient" data-kt-action="update_row">Editar</a>
                    </span> -->
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <!-- <span class="menu-item px-5" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Eliminar Paciente">
                        <a href="#" class="menu-link px-5" data-kt-patient-id="{{ $patient->id }}" data-kt-action="delete_row">Eliminar</a>
                    </span> -->
            <!--end::Menu item-->
            <!-- </div> -->
            <!--begin::Modal-->
            <!-- <livewir:patient.add-patient-modal></livewir:patient.add-patient-modal> Add e to the tag-->
            <!--end::Modal-->
            <!--end::Menu-->
            <!--end::Menu-->
            <!-- </div> -->
            <!--begin::Action menu-->
            <div class="d-flex justify-content-end mb-5">
                <a href="{{ route('patients.index') }}" class="btn btn-primary ps-7"> <i class="ki-duotone ki-black-left fs-1 me-0"></i>Regresar
                </a>
            </div>
            <!--end::Menu-->
            <!--begin::Content-->
            <!--begin::Col-->
            <div class="col-xl-12">
                <!--begin::Table widget 14-->
                    <div class="card card-flush h-md-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Reclamos</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Asociados al Paciente</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-6">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                            <th class="p-0 pb-3 w-50px text-start">Cod. Reclamo</th>
                                            <th class="p-0 pb-3 w-75px text-start">Fec. Apertura</th>
                                            <th class="p-0 pb-3 w-50px text-start">Fec. Cierre</th>
                                            <th class="p-0 pb-3 w-50px text-start">Estado</th>
                                            <th class="p-0 pb-3 w-50px text-center">Ver</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        @foreach($patient->claims as $patientClaims)
                                            {{-- Display information from each $claimProcedure --}}
                                            <tr>
                                                {{-- Add other fields as needed --}}
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="{{ image('illustrations/sigma-1/4.png') }}" class="" alt="" />
                                                        </div>
                                                        <div class="d-flex justify-content-center flex-column">
                                                            {{-- <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Avionica</a>
                                                            <span class="text-gray-400 fw-semibold d-block fs-7">Esther Howard</span> --}}
                                                            <span class="text-gray-600 fw-bold fs-6">{{ $patientClaims->claim_id }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                 <td class="text-start p-0">
                                                    <span class="text-gray-600 fw-bold fs-6">{{ $patientClaims->claim_submission_date }}</span>
                                                </td>
                                                <td class="text-start p-0">
                                                    <span class="text-gray-600 fw-bold fs-6">{{ $patientClaims->claim_resolution_date }}</span>
                                                </td>
                                                <td class="text-start p-0">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-warning">{{ $patientClaims->status }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('claims.show', $patientClaims->id) }}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">{!! getIcon('black-right', 'fs-2 text-gray-500') !!}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="{{ image('stock/600x600/img-48.jpg') }}" class="" alt="" />
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">9 Degree</a>
                                                        <span class="text-gray-400 fw-semibold d-block fs-7">Savannah Nguyen</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-600 fw-bold fs-6">$183,300</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <!--begin::Label-->
                                                <span class="badge badge-light-danger fs-base">{!! getIcon('arrow-down', 'fs-5 text-danger ms-n1') !!} 0.4%</span>
                                                <!--end::Label-->
                                            </td>
                                            <td class="text-end pe-12">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Process</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <div id="kt_table_widget_14_chart_5" class="h-50px mt-n8 pe-7" data-kt-chart-color="danger"></div>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">{!! getIcon('black-right', 'fs-2 text-gray-500') !!}</a>
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                <!--end::Table widget 14-->
            </div>
            <!--end::Col-->
            <!--end::Content-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Layout-->

    @push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        document.getElementById('mySearchInputPatient').addEventListener('keyup', function() {
            window.LaravelDataTables['patients-table'].search(this.value).draw();
        });
        document.addEventListener('livewire:load', function() {
            Livewire.on('success', function() {
                $('#kt_modal_edit_patient').modal('hide');
                window.LaravelDataTables['patients-table'].ajax.reload();
            });
        });
    </script>
    @endpush
</x-default-layout>