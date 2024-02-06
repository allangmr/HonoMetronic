<x-default-layout>
    @section('title')
    Información del Reclamo
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('claims.show', $claim) }}
    @endsection
    
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-250px mb-10">
            <!--begin::Card-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Summary-->
                    <!--begin::User Info-->
                    <div class="d-flex flex-center flex-column py-5">
                        <!--begin::Name-->
                        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3 text-uppercase">Reclamo - {{ $claim->claim_id }}</a>
                        <!--end::Name-->
                        <!--begin::Info-->
                        <!--begin::Info heading-->
                        <div class="fw-bold mb-3">Estado de Reclamo: {{ $claim->status }}
                            <span class="ms-2" ddata-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Number of support tickets assigned, closed and pending this week.">
                                <i class="ki-duotone ki-information fs-7">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </div>
                    </div>
                    <!--end::User Info-->
                    <!--end::Summary-->
                    <!--begin::Details toggle-->
                    <div class="d-flex flex-stack fs-6 py-3">
                        Datos del Paciente
                    </div>
                    <!--end::Details toggle-->
                    <div class="separator"></div>
                    <!--begin::Details content-->
                    <div id="kt_user_view_details" class="collapse show">
                        <div class="pb-5 fs-6">
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Nombre</div>
                            <div class="text-gray-600">{{ $claim->patient->name }}</div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Cedula</div>
                            <div class="text-gray-600">{{ $claim->patient->dni ? $claim->patient->dni : 'No Definida' }}</div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Edad</div>
                            <div class="text-gray-600">{{ $claim->patient->age ? $claim->patient->age . ' años' : 'No Definida' }}</div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Fecha de Nacimiento</div>
                            <div class="text-gray-600">{{ $claim->patient->born_date ? \Carbon\Carbon::parse($claim->patient->born_date)->format('d-m-Y') : 'No Definida' }}</div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Aseguradoras</div>
                            <div class="text-gray-600">{{ $claim->patient->insurance_companies ? $claim->patient->insurance_companies : 'No Definidas' }}</div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Correo</div>
                            <div class="text-gray-600">
                                <a href="mailto:{{ $claim->patient->email }}" class="text-gray-600 text-hover-primary">{{$claim->patient->email ? $claim->patient->email : 'No Definido'}}</a>
                            </div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Telefono</div>
                            <div class="text-gray-600">{{ $claim->patient->phone ? $claim->patient->phone : 'No Definido' }}</div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Direccion</div>
                            <div class="text-gray-600">{{ $claim->patient->address ? $claim->patient->address : 'No Definida' }}</div>
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

            <!--begin::Col-->
            <div class="col-xl-12">
                <!--begin::Table widget 14-->
                    <div class="card card-flush h-md-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Procedimientos</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Incluidos dentro de este reclamo</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar gap-3">
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_claim_procedure" data-kt-action="create_claim_procedure_row">
                                    {!! getIcon('plus', 'fs-2', '', 'i') !!}
                                    Agregar
                                </button>
                                <a href="{{ route('claims.index') }}" class="btn btn-sm btn-info"> <i class="ki-duotone ki-black-left fs-1 me-0"></i>Regresar
                                </a>
                            </div>
                            <!--begin::Modal-->
                            <livewire:claim.add-claim-procedure-modal></livewire:claim.add-claim-procedure-modal>
                            <!--end::Modal-->
                            <!--begin::Action menu-->
                                {{-- <div class="d-flex justify-content-end mb-5">
                                    <a href="{{ route('claims.index') }}" class="btn btn-info ps-7"> <i class="ki-duotone ki-black-left fs-1 me-0"></i>Regresar
                                    </a>
                                </div> --}}
                            <!--end::Menu-->
                            <!--end::Toolbar-->
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
                                            <th class="p-0 pb-3 w-75px text-center">CPT</th>
                                            <th class="p-0 pb-3 w-75px text-center">Nombre Proc.</th>
                                            <th class="p-0 pb-3 w-50px text-center">Fec. Inicio Proc.</th>
                                            <th class="p-0 pb-3 w-50px text-center">Fec. Final Proc.</th>
                                            <th class="p-0 pb-3 w-250px text-start">Observacion</th>
                                            <th class="p-0 pb-3 w-50px text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        @foreach($claim->procedures as $claimProc)
                                            {{-- Display information from each $claimProcedure --}}
                                            <tr>
                                                {{-- Add other fields as needed --}}
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3">
                                                            <img src="{{ image('illustrations/sigma-1/4.png') }}" class="" alt="" />
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            {{-- <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Avionica</a>
                                                            <span class="text-gray-400 fw-semibold d-block fs-7">Esther Howard</span> --}}
                                                            <span class="text-gray-600 fw-bold fs-6">{{ $claimProc->code }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center pe-0">
                                                    <span class="text-gray-600 fw-bold fs-6">{{ $claimProc->name }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-warning">{{ $claimProc->pivot->proc_start_date }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-warning">{{ $claimProc->pivot->proc_end_date }}</span>
                                                </td>
                                                <td class="text-start pe-0">
                                                    <span class="text-gray-600 fs-6">{{ $claimProc->pivot->details }}</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                        Opciones
                                                        <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                                    </a>
                                                    <!--begin::Menu-->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                    
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3" data-kt-claim-id="{{ $claimProc->pivot->id }}" data-bs-toggle="modal" data-bs-target="#kt_modal_add_claim" data-kt-action="update_row">
                                                                Editar
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3" data-kt-claim-id="{{ $claimProc->pivot->id }}" data-kt-action="delete_row">
                                                                Eliminar
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu-->
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
        </div>
        <!--end::Content-->
    </div>
    <!--end::Layout-->

    @push('scripts')
    {{-- {{ $dataTable->scripts() }} --}}
    <script>
        // document.getElementById('mySearchInputClaim').addEventListener('keyup', function() {
        //     window.LaravelDataTables['claims-procedures-table'].search(this.value).draw();
        // });
        document.addEventListener('livewire:load', function() {
            Livewire.on('success', function() {
                $('#kt_modal_add_claim_procedure').modal('hide');
            });
        });
    </script>
    @endpush
</x-default-layout>