<div class="modal fade" id="kt_modal_add_patient" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_patient_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Crear Paciente</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    {!! getIcon('cross','fs-1') !!}
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_patient_form" class="form" action="#" wire:submit.prevent="submit" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_patient_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_patient_header" data-kt-scroll-wrappers="#kt_modal_add_patient_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Nombre</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model.defer="name" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" />
                            <!--end::Input-->
                            @error('name')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Cedula</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model.defer="dni" name="dni" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Cedula" />
                            <!--end::Input-->
                            @error('dni')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Edad</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" wire:model.defer="age" name="age" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Edad" />
                            <!--end::Input-->
                            @error('age')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Fecha de Nacimiento</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model.defer="born_date" name="born_date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Fecha de Nacimiento" />
                            <!--end::Input-->
                            @error('born_date')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Aseguradora</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model.defer="insurance_companies" name="insurance_companies" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Aseguradora" />
                            <!--end::Input-->
                            @error('insurance_companies')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Correo</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="email" wire:model.defer="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="correo@correo.com" />
                            <!--end::Input-->
                            @error('email')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Telefono</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" wire:model.defer="phone" name="phone" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Telefono" />
                            <!--end::Input-->
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Direccion</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model.defer="address" name="address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Direccion" />
                            <!--end::Input-->
                            @error('address')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" wire:loading.attr="disabled">Descartar</button>
                        <button type="submit" class="btn btn-primary" data-kt-patients-modal-action="submit">
                            <span class="indicator-label" wire:loading.remove>Crear</span>
                            <span class="indicator-progress" wire:loading wire:target="submit">
                                Procesando...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>