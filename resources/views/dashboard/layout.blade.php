@extends('master')
@section('content')
    <!--begin::main-->
    <div>
        <!--end::Theme mode setup on page load-->
        <!--begin::App-->
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            <!--begin::Page-->
            <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                <!--begin::Header-->
                <div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate-="true"
                    data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <!--begin::Header container-->
                    <div class="app-container container-xxl d-flex align-items-stretch justify-content-between"
                        id="kt_app_header_container">
                        <!--begin::Header wrapper-->
                        <div class="app-header-wrapper d-flex flex-grow-1 align-items-stretch justify-content-between"
                            id="kt_app_header_wrapper">
                            <!--begin::Logo wrapper-->
                            <div class="d-flex align-items-center">
                                <!--begin::Logo wrapper-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Logo wrapper-->
                                    <div class="btn btn-icon btn-color-gray-600 btn-active-color-primary ms-n3 me-2 d-flex d-lg-none"
                                        id="kt_app_sidebar_toggle">
                                        <i class="ki-outline ki-abstract-14 fs-2"></i>
                                    </div>
                                    <!--end::Logo wrapper-->
                                </div>
                                <!--end::Logo wrapper-->
                                <!--begin::User menu-->
                                <div class="app-navbar-item">
                                    <!--begin::Menu wrapper-->
                                    <div class="position-relative symbol symbol-circle symbol-35px bg-secondary p-1">
                                        <img src="/src/media/avatars/admin_payroll.png" alt="user" />
                                        <div
                                            class="position-absolute rounded-circle bg-success start-100 top-100 h-8px w-8px ms-n3 mt-n3">
                                        </div>
                                    </div>
                                    <!--end::Menu wrapper-->
                                </div>
                                <div class="app-navbar-item ms-1 ms-lg-3">
                                    <div class="d-flex flex-column">
                                        <div class="fw-bold fs-5">{{ auth()->user()->name }}</div>
                                        <div class="fw-semibold text-muted fs-7">
                                            {{ ucwords(auth()->user()->role) }}
                                        </div>
                                    </div>
                                </div>
                                <!--end::User menu-->
                            </div>
                            <!--end::Logo wrapper-->
                            <!--begin::Navbar-->
                            <div class="app-navbar flex-shrink-0">
                                <!--begin::Dark Mode-->
                                <div class="app-navbar-item ms-1 ms-lg-3">
                                    <!--begin::Menu wrapper-->
                                    <div class="btn btn-icon btn-circle btn-color-gray-500 btn-active-color-primary btn-custom shadow-xs bg-body"
                                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                        data-kt-menu-placement="bottom-end" data-kt-menu-offset="0, -30px">
                                        <i class="ki-outline ki-night-day fs-1"></i>
                                    </div>
                                    <!--end::Menu wrapper-->
                                    <!--begin::Mode menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                        data-kt-menu="true" data-kt-element="theme-mode-menu">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3">
                                                <div class="fw-bold fs-5">Mode</div>
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="#" class="menu-link px-3 py-4" data-kt-element="mode"
                                                data-kt-value="light">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-outline ki-night-day fs-2"></i>
                                                </span>
                                                <span class="menu-title">Light</span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="#" class="menu-link px-3 py-4" data-kt-element="mode"
                                                data-kt-value="dark">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-outline ki-moon fs-2"></i>
                                                </span>
                                                <span class="menu-title">Dark</span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="#" class="menu-link px-3 py-4" data-kt-element="mode"
                                                data-kt-value="system">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-outline ki-screen fs-2"></i>
                                                </span>
                                                <span class="menu-title">System</span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--end::Menu wrapper-->
                                    </div>
                                    <!--end::Mode menu-->
                                </div>
                                <!--end::Dark Mode-->
                                <div class="app-navbar-item ms-1 ms-lg-3">
                                    <!--begin::Menu wrapper-->
                                    <a href="/logout"
                                        class="btn btn-icon btn-circle btn-color-gray-500 btn-active-color-primary btn-custom shadow-xs bg-body">
                                        <i class="ki-outline ki-exit-right fs-1"></i>
                                    </a>
                                    <!--end::Menu wrapper-->
                                </div>
                            </div>
                            <!--end::Navbar-->
                        </div>
                        <!--end::Header wrapper-->
                    </div>
                    <!--end::Header container-->
                </div>
                <!--end::Header-->
                <!--begin::Wrapper-->
                <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                    <!--begin::Sidebar-->
                    <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
                        data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                        data-kt-drawer-overlay="true" data-kt-drawer-width="275px" data-kt-drawer-direction="start"
                        data-kt-drawer-toggle="#kt_app_sidebar_toggle">
                        <!--begin::Logo-->
                        <div class="d-flex align-items-center px-4 px-lg-6 py-3 py-lg-8" id="kt_app_sidebar_logo">
                            <!--begin::Logo image-->
                            <a href={{ route('salary') }}>
                                <img alt="Logo" src="/src/media/logos/logo.svg" class="h-40px h-lg-40px" />
                            </a>
                            <h3 class="text-primary px-4">X-Payroll</h3>
                            <!--end::Logo image-->
                        </div>
                        <!--end::Logo-->
                        <!--begin::Sidebar nav-->
                        <div class="flex-column-fluid px-4 px-lg-8 py-4" id="kt_app_sidebar_nav">
                            <!--begin::Nav wrapper-->
                            <div id="kt_app_sidebar_nav_wrapper" class="d-flex flex-column hover-scroll-y pe-4 me-n4"
                                data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                                data-kt-scroll-wrappers="#kt_app_sidebar, #kt_app_sidebar_nav" data-kt-scroll-offset="5px">
                                <!--begin::Links-->
                                <div class="mb-6">
                                    <!--begin::Title-->
                                    <h3 class="text-gray-800 fw-bold mb-8">Services</h3>
                                    <!--end::Title-->
                                    <!--begin::Row-->
                                    <div class="row row-cols-3" data-kt-buttons="true"
                                        data-kt-buttons-target="[data-kt-button]">
                                        <!--begin::Col-->
                                        <div class="col mb-4">
                                            <!--begin::Link-->
                                            <a href={{ route('salary') }}
                                                class="{{ str_contains(request()->route()->getName(),'salary')? 'active border-light-primary': 'border-gray-200' }} btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px"
                                                data-kt-button="true">
                                                <!--begin::Icon-->
                                                <span class="mb-2">
                                                    <i class="ki-outline ki-bill fs-1"></i>
                                                </span>
                                                <!--end::Icon-->
                                                <!--begin::Label-->
                                                <span class="fs-7 fw-bold">Salary</span>
                                                <!--end::Label-->
                                            </a>
                                            <!--end::Link-->
                                        </div>
                                        <!--end::Col-->
                                        @if (auth()->user()->role === 'staff')
                                            <!--begin::Col-->
                                            <div class="col mb-4">
                                                <!--begin::Link-->
                                                <a href={{ route('employee') }}
                                                    class="{{ str_contains(request()->route()->getName(),'employee')? 'active border-light-primary': 'border-gray-200' }} btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px"
                                                    data-kt-button="true">
                                                    <!--begin::Icon-->
                                                    <span class="mb-2">
                                                        <i class="ki-outline ki-people fs-1"></i>
                                                    </span>
                                                    <!--end::Icon-->
                                                    <!--begin::Label-->
                                                    <span class="fs-7 fw-bold">Employee</span>
                                                    <!--end::Label-->
                                                </a>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col mb-4">
                                                <!--begin::Link-->
                                                <a href={{ route('overtime') }}
                                                    class="{{ str_contains(request()->route()->getName(),'overtime')? 'active border-light-primary': 'border-gray-200' }} btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px"
                                                    data-kt-button="true">
                                                    <!--begin::Icon-->
                                                    <span class="mb-2">
                                                        <i class="ki-outline ki-time fs-1"></i>
                                                    </span>
                                                    <!--end::Icon-->
                                                    <!--begin::Label-->
                                                    <span class="fs-7 fw-bold">Overtime</span>
                                                    <!--end::Label-->
                                                </a>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Col-->
                                        @endif
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Links-->
                            </div>
                            <!--end::Nav wrapper-->
                        </div>
                        <!--end::Sidebar nav-->
                        <!--begin::Footer-->
                        <div class="flex-column-auto d-flex flex-center px-4 px-lg-8 py-3 py-lg-8"
                            id="kt_app_sidebar_footer">
                            <div class="text-dark order-2 order-md-1 text-muted fw-semibold me-1">
                                <span>{{ date('Y') }}&copy;</span>
                                <span>X-Payroll</span>
                            </div>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Sidebar-->
                    @yield('dashboard_content')
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::App-->
        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <i class="ki-outline ki-arrow-up"></i>
        </div>
        <!--end::Scrolltop-->
    </div>
    <!--end::main-->
@endsection
@section('js')
    @parent
    <script>
        $("#month_period").flatpickr({
            dateFormat: "F Y",
            defaultDate: moment().format('MMMM Y'),
        });

        "use strict";
        var KTUsersList = (function() {
            var e,
                t,
                n,
                r,
                o = document.getElementById("kt_table_custom"),
                c,
                l = document.querySelector('[data-kt-custom-table-filter="reset"]');

            return {
                init: function() {
                    o &&
                        (
                            (e = $(o).DataTable()),
                            document
                            .querySelector('[data-kt-custom-table-filter="search"]')
                            .addEventListener("keyup", function(t) {
                                e.search(t.target.value).draw();
                            }),
                            l && l
                            .addEventListener("click", function() {
                                document
                                    .querySelector('[data-kt-custom-table-filter="form"]')
                                    .querySelectorAll("select")
                                    .forEach((e) => {
                                        $(e).val("").trigger("change");
                                    }),
                                    e.search("").draw();
                            }),
                            (() => {
                                const t = document.querySelector(
                                        '[data-kt-custom-table-filter="form"]'
                                    ),
                                    n = t && t.querySelector(
                                        '[data-kt-custom-table-filter="filter"]'
                                    ),
                                    r = t && t.querySelectorAll("select");
                                n && n.addEventListener("click", function() {
                                    var t = "";
                                    r.forEach((e, n) => {
                                            e.value &&
                                                "" !== e.value &&
                                                (0 !== n && (t += " "), (t += e.value));
                                        }),
                                        e.search(t).draw();
                                });
                            })());
                },
            };
        })();
        KTUtil.onDOMContentLoaded(function() {
            KTUsersList.init();
        });

        function confirmDelete(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                customClass: {
                    confirmButton: "btn btn-primary fs-5",
                    cancelButton: 'btn btn-danger fs-5'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the delete route with the record ID
                    window.location = url;
                }
            });
        }
    </script>
@endsection
