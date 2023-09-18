@extends('auth.layout')
@section('auth_content')
    <!--begin::Form-->
    <form class="form w-100" id="kt_sign_in_form" action="{{ route('login') }}" method="POST">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
            <!--end::Title-->
            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">Access best feature only for you</div>
            <!--end::Subtitle=-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group=-->
        {{-- {{$errors}} --}}
        <div class="fv-row mb-8">
            <label class="form-label">Email</label>
            <!--begin::Email-->
            <input type="text" placeholder="Exp. user@email.com" name="email" autocomplete="off"
                class="form-control bg-transparent" required />
            <!--end::Email-->
        </div>
        <!--end::Input group=-->
        <div class="fv-row mb-3">
            <label class="form-label">Password</label>
            <!--begin::Password-->
            <input type="password" placeholder="Password" name="password" autocomplete="off"
                class="form-control bg-transparent" required />
            <!--end::Password-->
        </div>
        <!--end::Input group=-->
        <!--begin::Submit button-->
        <div class="d-grid my-8">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                <!--begin::Indicator label-->
                <span class="indicator-label">Sign In</span>
                <!--end::Indicator label-->
                <!--begin::Indicator progress-->
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                <!--end::Indicator progress-->
            </button>
        </div>
        <!--end::Submit button-->
        <div class="separator separator-content my-14">
            <span class="w-300px text-gray-500 fw-semibold fs-7">Or use this for Attendance
            </span>
        </div>
        <div class="row g-3 mb-9">
            <!--begin::Col-->
            <div class="col-md-12">
                <!--begin::Google link--->
                <a href="/attendance"
                    class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                    Access Attendance
                </a>
                <!--end::Google link--->
            </div>
            <!--end::Col-->
        </div>
    </form>
    <!--end::Form-->
@endsection
