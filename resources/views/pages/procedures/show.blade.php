<x-default-layout>
    @section('title')
    Información del Procedimiento
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('procedures.show', $procedure) }}
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
                        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3 text-uppercase">{{ $procedure->name }}</a>
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
                            <div class="text-gray-600">{{ $procedure->dni }}</div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Edad</div>
                            <div class="text-gray-600">{{ $procedure->age }} años</div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Fecha de Nacimiento</div>
                            <div class="text-gray-600">{{ \Carbon\Carbon::parse($procedure->born_date)->format('d-m-Y') }}</div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Aseguradoras</div>
                            <div class="text-gray-600">{{ $procedure->insurance_companies }}</div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Correo</div>
                            <div class="text-gray-600">
                                <a href="mailto:{{ $procedure->email }}" class="text-gray-600 text-hover-primary">{{$procedure->email}}</a>
                            </div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Telefono</div>
                            <div class="text-gray-600">{{ $procedure->phone }}</div>
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Direccion</div>
                            <div class="text-gray-600">{{ $procedure->address }}</div>
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
                        <a href="#" class="menu-link px-5" data-bs-toggle="modal" data-kt-procedure-id="{{ $procedure->id }}" data-bs-target="#kt_modal_add_procedure" data-kt-action="update_row">Editar</a>
                    </span> -->
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <!-- <span class="menu-item px-5" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Eliminar Paciente">
                        <a href="#" class="menu-link px-5" data-kt-procedure-id="{{ $procedure->id }}" data-kt-action="delete_row">Eliminar</a>
                    </span> -->
            <!--end::Menu item-->
            <!-- </div> -->
            <!--begin::Modal-->
            <!-- <livewir:procedure.add-procedure-modal></livewir:procedure.add-procedure-modal> Add e to the tag-->
            <!--end::Modal-->
            <!--end::Menu-->
            <!--end::Menu-->
            <!-- </div> -->
            <!--begin::Action menu-->
            <div class="d-flex justify-content-end mb-5">
                <a href="{{ route('procedures.index') }}" class="btn btn-primary ps-7"> <i class="ki-duotone ki-black-left fs-1 me-0"></i>Regresar
                </a>
            </div>
            <!--end::Menu-->
            <!--begin::Content-->
            <div class="flex-lg-row-fluid">
                <!--begin::Card-->
                <div class="card card-flush mb-6 mb-xl-9">
                    <!--begin::Card header-->
                    <div class="card-header pt-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2 class="d-flex align-items-center">Reclamos
                                <span class="text-gray-600 fs-6 ms-1">({{ $procedure->count() }})</span>
                            </h2>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            {{ $dataTable->table() }}
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Layout-->

    @push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        document.getElementById('mySearchInputProcedure').addEventListener('keyup', function() {
            window.LaravelDataTables['procedures-table'].search(this.value).draw();
        });
        document.addEventListener('livewire:load', function() {
            Livewire.on('success', function() {
                $('#kt_modal_edit_procedure').modal('hide');
                window.LaravelDataTables['procedures-table'].ajax.reload();
            });
        });
    </script>
    @endpush
</x-default-layout>