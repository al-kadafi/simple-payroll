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
                            Overtime Data</h1>
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
                            <li class="breadcrumb-item text-muted">Overtime List</li>
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
                                        class="form-control form-control-solid w-250px ps-13" placeholder="Search user" />
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-custom-table-toolbar="base">
                                    <!--begin::Add data-->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_add_data">
                                        <i class="ki-outline ki-add-item fs-2"></i>Add Data</button>
                                    <!--end::Add data-->
                                </div>
                                <!--begin::Modal - Add data-->
                                <div class="modal fade" data-bs-focus="false" id="kt_modal_add_data" tabindex="-1"
                                    aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-500px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header" id="kt_modal_add_data_header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bold">Overtime Data</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                    data-bs-dismiss="modal">
                                                    <i class="ki-outline ki-cross fs-1"></i>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body px-5 my-3">
                                                <!--begin::Form-->
                                                <form id="kt_modal_add_data_form" class="form" method="POST"
                                                    action={{ route('overtime.store') }}>
                                                    @csrf
                                                    <!--begin::Scroll-->
                                                    <div class="d-flex flex-column scroll-y px-3"
                                                        id="kt_modal_add_data_scroll" data-kt-scroll="true"
                                                        data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                                                        data-kt-scroll-dependencies="#kt_modal_add_data_header"
                                                        data-kt-scroll-wrappers="#kt_modal_add_data_scroll"
                                                        data-kt-scroll-offset="300px">
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-semibold fs-6 mb-2">Employee</label>
                                                            <!--end::Label-->
                                                            <div class="input-group flex-nowrap">
                                                                <span class="input-group-text">
                                                                    <i class="ki-duotone ki-user fs-3"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span><span
                                                                            class="path3"></span><span
                                                                            class="path4"></span><span
                                                                            class="path5"></span><span
                                                                            class="path6"></span></i>
                                                                </span>
                                                                <div class="overflow-hidden flex-grow-1">
                                                                    <!--begin::Select-->
                                                                    <select name="employee_id"
                                                                        class="form-select mb-3 mb-lg-0 rounded-start-0"
                                                                        data-control="select2"
                                                                        data-dropdown-parent="#kt_modal_add_data"
                                                                        data-placeholder="Select Employee"
                                                                        data-allow-clear="false" required>
                                                                        <option></option>
                                                                        @foreach ($employees as $employee)
                                                                            <option value={{ $employee->id }}>
                                                                                {{ $employee->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <!--end::Select-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-semibold fs-6 mb-2">Start Time</label>
                                                            <!--end::Label-->
                                                            <div class="input-group">
                                                                <span class="input-group-text">
                                                                    <i class="ki-duotone ki-calendar fs-2"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span></i>
                                                                </span>
                                                                <!--begin::Input-->
                                                                <input name="start_time"
                                                                    class="form-control mb-3 mb-lg-0 kt_datetime_picker"
                                                                    placeholder="Select start time" required />
                                                                <!--end::Input-->
                                                            </div>

                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-semibold fs-6 mb-2">End Time</label>
                                                            <!--end::Label-->
                                                            <div class="input-group">
                                                                <span class="input-group-text">
                                                                    <i class="ki-duotone ki-calendar fs-2"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span></i>
                                                                </span>
                                                                <!--begin::Input-->
                                                                <input name="end_time"
                                                                    class="form-control mb-3 mb-lg-0 kt_datetime_picker"
                                                                    placeholder="Select end time" required />
                                                                <!--end::Input-->
                                                            </div>
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="fw-semibold fs-6 mb-2">Reason</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <textarea name="reason" class="form-control mb-3 mb-lg-0" placeholder="Describe overtime reason here"
                                                                style="height: 150px"></textarea>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Scroll-->
                                                    <!--begin::Actions-->
                                                    <div class="text-end pt-10 px-4">
                                                        <button type="reset" class="btn btn-light me-3"
                                                            data-bs-dismiss="modal">Discard</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            data-kt-users-modal-action="submit">
                                                            <span class="indicator-label">Submit</span>
                                                            <span class="indicator-progress">Please wait...
                                                                <span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                                        <th class="min-w-125px">Date</th>
                                        <th class="min-w-125px">Duration</th>
                                        <th class="min-w-125px">Reason</th>
                                        <th class="text-end min-w-100px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                    @foreach ($overtimes as $overtime)
                                        <tr>
                                            <td class="text-gray-800">{{ $overtime->employee->name }}</td>
                                            <td>{{ date('d F Y', strtotime($overtime->start_time)) }}</td>
                                            <td>{{ $overtime->duration }}</td>
                                            <td>{{ $overtime->reason ?? '-' }}</td>
                                            <td class="text-end">
                                                <a href="#"
                                                    class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end">Action
                                                    <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href={{ route('download_slip') }}
                                                            class="menu-link px-3">Edit</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href='#'
                                                            onclick="confirmDelete('{{ route('overtime.delete', encrypt($overtime->id)) }}')"
                                                            class="menu-link px-3">Delete
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
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
@section('js')
    @parent
    <script>
        $(".kt_datetime_picker").flatpickr({
            enableTime: true,
            dateFormat: "d M Y H:i",
        });
    </script>
@endsection
