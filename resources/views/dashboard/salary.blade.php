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
                            Employee Salary</h1>
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
                            <li class="breadcrumb-item text-muted">Salary</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <div class="d-flex align-items-center fw-bold gap-4">
                        <!--begin::Label-->
                        <div class="text-gray-400 fs-7">Month</div>
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
                                        class="form-control form-control-solid w-250px ps-13" placeholder="Search slip" />
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-custom-table-toolbar="base">
                                    <!--begin::Filter-->
                                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end">
                                        <i class="ki-outline ki-filter fs-2"></i>Filter</button>
                                    <!--begin::Menu 1-->
                                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                        <!--begin::Header-->
                                        <div class="px-7 py-5">
                                            <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Separator-->
                                        <div class="separator border-gray-200"></div>
                                        <!--end::Separator-->
                                        <!--begin::Content-->
                                        <div class="px-7 py-5" data-kt-custom-table-filter="form">
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <label class="form-label fs-6 fw-semibold">Position :</label>
                                                <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                                    data-placeholder="Select option" data-allow-clear="true"
                                                    data-kt-custom-table-filter="position" data-hide-search="true">
                                                    <option></option>
                                                    <option value="Staff">Staff</option>
                                                    <option value="Lead">Lead</option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="Supervisor">Supervisor</option>
                                                    <option value="Director">Director</option>
                                                </select>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <label class="form-label fs-6 fw-semibold">Employee Status :</label>
                                                <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                                    data-placeholder="Select option" data-allow-clear="true"
                                                    data-kt-custom-table-filter="status" data-hide-search="true">
                                                    <option></option>
                                                    <option value="Permanent">Permanent</option>
                                                    <option value="Contract">Contract</option>
                                                    <option value="Freelance">Freelance</option>
                                                </select>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <label class="form-label fs-6 fw-semibold">Approval Status :</label>
                                                <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                                    data-placeholder="Select option" data-allow-clear="true"
                                                    data-kt-custom-table-filter="approval" data-hide-search="true">
                                                    <option></option>
                                                    <option value="Approved">Approved</option>
                                                    <option value="Rejected">Rejected</option>
                                                    <option value="Draft">Draft</option>
                                                </select>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Actions-->
                                            <div class="d-flex justify-content-end">
                                                <button type="reset"
                                                    class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                                    data-kt-menu-dismiss="true"
                                                    data-kt-custom-table-filter="reset">Reset</button>
                                                <button type="submit" class="btn btn-primary fw-semibold px-6"
                                                    data-kt-menu-dismiss="true"
                                                    data-kt-custom-table-filter="filter">Apply</button>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Menu 1-->
                                    <!--end::Filter-->
                                    <a href={{ route('slip.generate', ['month' => request()->get('month') ?? date('Y-m')]) }}
                                        class="btn btn-primary">
                                        <i class="ki-outline ki-add-item fs-2"></i>Generate Slip</a>
                                    {{-- <a href="#" class="btn fw-bold btn-primary w-100"><i
                                            class="ki-outline ki-add-item fs-2"></i>Generate Slip</a> --}}
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Card toolbar-->
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
                                        <th class="min-w-125px">Employee Status</th>
                                        <th class="min-w-125px">Working Period</th>
                                        <th class="min-w-125px">Approval Status</th>
                                        <th class="text-end min-w-100px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                    @foreach ($slips as $slip)
                                        <tr>
                                            <td class="text-gray-800">{{ ucwords($slip->employee->name) }}</td>
                                            <td>{{ ucfirst($slip->employee->position) }}</td>
                                            <td>
                                                @if ($slip->employee->status === 'permanent')
                                                    <div class="text-info">Permanent</div>
                                                @elseif ($slip->employee->status === 'contract')
                                                    <div class="text-warning">Contract</div>
                                                @else
                                                    <div class="text-primary">Freelance</div>
                                                @endif
                                            </td>
                                            <td>{{ $slip->employee->working_period }}</td>
                                            <td>
                                                @if ($slip->status === 'approved')
                                                    <div class="badge py-3 px-4 fs-7 badge-light-success">Approved</div>
                                                @elseif($slip->status === 'rejected')
                                                    <div class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</div>
                                                @else
                                                    <div class="badge py-3 px-4 fs-7 badge-light-dark">Draft</div>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <a href={{ route('salary.slip', ['id' => $slip->id]) }}
                                                    class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"><i
                                                        class="ki-outline ki-eye fs-5 ms-1"></i>View
                                                </a>
                                            </td>
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
