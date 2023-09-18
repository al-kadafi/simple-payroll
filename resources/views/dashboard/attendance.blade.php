@extends('dashboard.layout')
@section('dashboard_content')
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-0">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Attendance Data</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Dashboard</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Attendance List</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <div class="d-flex align-items-center fw-bold gap-2">
                        <!--begin::Label-->
                        <div class="text-gray-400 fs-7 me-2">Month</div>
                        <!--end::Label-->
                        <!--begin::Date-->
                        <input class="form-control form-control-solid shadow-xs bg-body" placeholder="Pick a Month"
                            id="month_period" />
                        <!--end::Date-->
                    </div>
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                                    <input type="text" data-kt-custom-table-filter="search"
                                        class="form-control form-control-solid w-250px ps-13" placeholder="Search data" />
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_custom">
                                <thead>
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">Employee Name</th>
                                        <th class="min-w-125px">Position</th>
                                        <th class="min-w-125px">Attend Work</th>
                                        <th class="min-w-125px">Off work</th>
                                        <th class="min-w-125px">Leave Work</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                    @foreach ($employees as $employee)
                                        @php
                                            $data = $employee->getAttendanceData($employee->id, request()->get('month') ?? date('Y-m'));
                                            
                                            if (isset($data['error_code'])) {
                                                redirect()
                                                    ->back()
                                                    ->with('message', [
                                                        'title' => 'Api call error',
                                                        'type' => 'error',
                                                        'msg' => $data['message'],
                                                    ]);
                                            }
                                        @endphp
                                        <tr>
                                            <td class="text-gray-800">{{ $employee->name }}</td>
                                            <td>{{ ucwords($employee->position) }}</td>
                                            <td>{{ $data['working_days'] ?? '0' }} Days</td>
                                            <td>{{ $data['absent_days'] ?? '0' }} Days</td>
                                            <td>{{ $data['leave_days'] ?? '0' }} Days</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->
@endsection
