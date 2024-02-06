<div class="modal fade" id="kt_modal_add_claim_procedure" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_claim_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">{{$pageTitle}}</h2>
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
                <form id="kt_modal_add_claim_form" class="form" action="#" wire:submit.prevent="submit" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_claim_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_claim_header" data-kt-scroll-wrappers="#kt_modal_add_claim_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">CPT</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            @if($submitButtonTitle === '' )
                            <input type="text" wire:model.defer="claim_id" name="claim_id" class="form-control form-control-solid mb-3 mb-lg-0" disabled />
                            @else
                            <input type="text" wire:model.defer="claim_id" name="claim_id" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Código de Reclamo" />
                            @endif
                            <!--end::Input-->
                            @error('name')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Seleccione un Procedimiento</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            @if($submitButtonTitle === '' )
                            <input type="text" wire:model.defer="selectedPatient" name="selectedPatient" class="form-control form-control-solid mb-3 mb-lg-0" disabled />
                            @else
                            <select class="form-select form-select-solid mb-3 mb-lg-0" wire:model="selectedPatient" id="selectedPatient" name="selectedPatient">
                                <option value="">Seleccione un paciente</option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}" {{ $selectedPatient === $patient->id ? 'selected' : '' }}>{{ $patient->name }} | {{ $patient->dni }}</option>
                                @endforeach
                            </select>
                            @endif
                            <!--end::Input-->
                            @error('selectedPatient')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Fecha Inicio Proc.</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            @if($submitButtonTitle === '' )
                            <input type="date" wire:model.defer="claim_submission_date" name="claim_submission_date" class="form-control form-control-solid mb-3 mb-lg-0" disabled />
                            @else
                            <input type="date" wire:model.defer="claim_submission_date" name="claim_submission_date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Fecha de Inicio Reclamo" />
                            @endif
                            <!--end::Input-->
                            @error('claim_submission_date')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fw-semibold fs-6 mb-2">Fecha Fin Proc.</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            @if($submitButtonTitle === '' )
                            <input type="date" wire:model.defer="claim_resolution_date" name="claim_resolution_date" class="form-control form-control-solid mb-3 mb-lg-0" disabled />
                            @else
                            <input type="date" wire:model.defer="claim_resolution_date" name="claim_resolution_date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Fecha de Fin Reclamo" />
                            @endif
                            <!--end::Input-->
                            @error('claim_resolution_date')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Observacion</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            @if($submitButtonTitle === '' )
                            <input type="text" wire:model.defer="details" name="details" class="form-control form-control-solid mb-3 mb-lg-0" disabled />
                            @else
                            <input type="text" wire:model.defer="details" name="details" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Detalles" />
                            @endif
                            <!--end::Input-->
                            @error('details')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Estado</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            @if($submitButtonTitle === '' )
                            <input type="text" wire:model.defer="status" name="status" class="form-control form-control-solid mb-3 mb-lg-0" disabled />
                            @else
                            <select class="form-select form-select-solid mb-3 mb-lg-0" name="status" aria-label="Select status" wire:model.defer="status">
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                            @endif
                            <!-- <input type="text" wire:model.defer="status" name="status" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Estado" /> -->
                            <!--end::Input-->
                            @error('status')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" wire:loading.attr="disabled">Descartar</button>
                        @if($submitButtonTitle)
                        <button type="submit" class="btn btn-primary" data-kt-claims-modal-action="submit">
                            <span class="indicator-label" wire:loading.remove>{{$submitButtonTitle}}</span>
                            <span class="indicator-progress" wire:loading wire:target="submit">
                                Procesando...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        @endif
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