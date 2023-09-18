@extends('auth.layout')
@section('auth_content')
    <!--begin::Form-->
    <form class="form w-100" id="kt_sign_in_form" action="{{ route('attendance.store') }}" method="POST">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">Attendance</h1>
            <!--end::Title-->
            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">Attendance Made Easy: Your Workforce Advantage</div>
            <!--end::Subtitle=-->
        </div>
        <!--begin::Input group-->
        <div class="fv-row mb-8">
            <!--begin::Label-->
            <label class="required fw-semibold fs-6 mb-2">Type</label>
            <!--end::Label-->
            <!--begin::Select-->
            <select name="type" class="form-select" data-control="select2"
                data-hide-search="true" data-placeholder="Select Type" data-allow-clear="false" required>
                <option></option>
                <option value="attend">Attend</option>
                <option value="leave">Leave</option>
            </select>
            <!--end::Select-->
        </div>
        <!--end::Input group-->
        <!--begin::Heading-->
        <div class="fv-row mb-8">
            <label class="form-label">Employee</label>
            <!--begin::Select-->
            <select class="form-select" data-kt-select2="true" data-placeholder="Select Employee"
                data-allow-clear="false" data-kt-user-table-filter="employee_id" data-hide-search="false" name="employee_id"
                required>
                <option></option>
                @foreach ($employees as $employee)
                    <option value={{ $employee->id }}>{{ $employee->name }}</option>
                @endforeach
            </select>
            <!--end::Select-->
        </div>
        <!--end::Input group=-->
        <!--begin::Input group=-->
        <div class="fv-row mb-3">
            <label class="form-label">Date</label>
            <!--begin::Email-->
            <input class="form-control kt_date_picker" placeholder="Pick date" name="date" required />
            <!--end::Email-->
        </div>
        <!--end::Input group=-->
        <!--begin::Submit button-->
        <div class="d-grid my-8">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                <!--begin::Indicator label-->
                <span class="indicator-label">Process</span>
                <!--end::Indicator label-->
                <!--begin::Indicator progress-->
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                <!--end::Indicator progress-->
            </button>
        </div>
        <!--end::Submit button-->
        <div class="separator separator-content my-14">
            <span class="w-300px text-gray-500 fw-semibold fs-7">Or use this for Login
            </span>
        </div>
        <div class="row g-3 mb-9">
            <!--begin::Col-->
            <div class="col-md-12">
                <!--begin::Google link--->
                <a href="/"
                    class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                    Back to Login
                </a>
                <!--end::Google link--->
            </div>
            <!--end::Col-->
        </div>
    </form>
    <!--end::Form-->
@endsection
