<!--begin::Modal - Add data-->
<div class="modal fade" data-bs-focus="false" id="kt_modal_add_data" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-550px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_data_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Employee Data</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-5 my-3">
                <!--begin::Form-->
                <form id="kt_modal_add_data_form" class="form" method="POST"
                    action={{ route('employee.store', ['id' => request()->route('id') ?? 0]) }}>
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-3" id="kt_modal_add_data_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_data_header"
                        data-kt-scroll-wrappers="#kt_modal_add_data_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Name</label>
                            <!--end::Label-->
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-user fs-2"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                                <!--begin::Input-->
                                <input name="name" class="form-control mb-3 mb-lg-0" placeholder="Exp. John Doe"
                                    value="{{ isset($employee) ? $employee->name : '' }}" required />
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Email</label>
                            <!--end::Label-->
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-sms fs-2"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                                <!--begin::Input-->
                                <input name="email" type="email" class="form-control mb-3 mb-lg-0"
                                    placeholder="Exp. user@email.com"
                                    value="{{ isset($employee) ? $employee->email : '' }}" required />
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Birth Place</label>
                            <!--end::Label-->
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-geolocation fs-2"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                                <!--begin::Input-->
                                <input name="birth_place" class="form-control mb-3 mb-lg-0" placeholder="Exp. Surabaya"
                                    value="{{ isset($employee) ? $employee->birth_place : '' }}" required />
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Birth Date</label>
                            <!--end::Label-->
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                                <!--begin::Input-->
                                <input name="birth_date" class="form-control mb-3 mb-lg-0 kt_date_picker"
                                    placeholder="Select birth date"
                                    value="{{ isset($employee) ? $employee->birth_date : '' }}" required />
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Gender</label>
                            <!--end::Label-->
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-user-square fs-3"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span><span class="path5"></span><span
                                            class="path6"></span></i>
                                </span>
                                <div class="overflow-hidden flex-grow-1">
                                    <!--begin::Select-->
                                    <select name="gender" class="form-select mb-3 mb-lg-0 rounded-start-0"
                                        data-control="select2" data-dropdown-parent="#kt_modal_add_data"
                                        data-hide-search="true" data-placeholder="Select Gender"
                                        data-allow-clear="false"
                                        required>
                                        <option></option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <!--end::Select-->
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Position</label>
                            <!--end::Label-->
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-office-bag fs-3"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span><span class="path5"></span><span
                                            class="path6"></span></i>
                                </span>
                                <div class="overflow-hidden flex-grow-1">
                                    <!--begin::Select-->
                                    <select name="position" class="form-select mb-3 mb-lg-0 rounded-start-0"
                                        data-control="select2" data-dropdown-parent="#kt_modal_add_data"
                                        data-hide-search="true" data-placeholder="Select Position"
                                        data-allow-clear="false" required>
                                        <option></option>
                                        <option value="staff">Staff</option>
                                        <option value="lead">Lead</option>
                                        <option value="supervisor">Supervisor</option>
                                        <option value="manager">Manager</option>
                                        <option value="director">Director</option>
                                    </select>
                                    <!--end::Select-->
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Status</label>
                            <!--end::Label-->
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-status fs-3"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span><span class="path5"></span><span
                                            class="path6"></span></i>
                                </span>
                                <div class="overflow-hidden flex-grow-1">
                                    <!--begin::Select-->
                                    <select name="status" class="form-select mb-3 mb-lg-0 rounded-start-0"
                                        data-control="select2" data-dropdown-parent="#kt_modal_add_data"
                                        data-hide-search="true" data-placeholder="Select Status"
                                        data-allow-clear="false" required>
                                        <option></option>
                                        <option value="permanent">Permanent Employee</option>
                                        <option value="contract">Contract Employee</option>
                                        <option value="freelance">Freelance</option>
                                    </select>
                                    <!--end::Select-->
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Basic Salary</label>
                            <!--end::Label-->
                            <div class="input-group">
                                <span class="input-group-text fs-8 fw-bold">
                                    Rp.
                                </span>
                                <!--begin::Input-->
                                <input name="basic_salary" class="form-control mb-3 mb-lg-0"
                                    placeholder="Exp. 2.000.000" required />
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Basic Allowance</label>
                            <!--end::Label-->
                            <div class="input-group">
                                <span class="input-group-text fs-8 fw-bold">
                                    Rp.
                                </span>
                                <!--begin::Input-->
                                <input name="allowance" class="form-control mb-3 mb-lg-0"
                                    placeholder="Exp. 1.000.000" required />
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Join Date</label>
                            <!--end::Label-->
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                                <!--begin::Input-->
                                <input name="join_date" class="form-control mb-3 mb-lg-0 kt_date_picker"
                                    placeholder="Select join date" required />
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Use BPJS Insurance</label>
                            <!--end::Label-->
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-binance-usd fs-3"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span><span class="path5"></span><span
                                            class="path6"></span></i>
                                </span>
                                <div class="overflow-hidden flex-grow-1">
                                    <!--begin::Select-->
                                    <select name="insurance" class="form-select mb-3 mb-lg-0 rounded-start-0"
                                        data-control="select2" data-dropdown-parent="#kt_modal_add_data"
                                        data-hide-search="true" data-placeholder="Select Option"
                                        data-allow-clear="false" required>
                                        <option></option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <!--end::Select-->
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-end pt-10 px-4">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
<!--end::Modal - Add data-->
