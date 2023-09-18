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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">View
                            Employee Details</h1>
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
                            <li class="breadcrumb-item text-muted">
                                <a href={{ route('employee') }} class="text-muted text-hover-primary">Employee</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Profile</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <!--begin::Delete button-->
                        <a href="#" onclick="confirm('{{ route('employee.delete', encrypt($employee->id)) }}')"
                            class="btn btn-sm fw-bold btn-danger"><i class="ki-outline ki-trash fs-6 me-1"></i>Delete
                            Employee</a>
                        <!--end::Delete button-->
                        <!--begin::Primary button-->
                        <a href="#" onc class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_data"><i class="ki-outline ki-user-edit fs-6 me-1"></i>Edit
                            Data</a>
                        <!--end::Primary button-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column">
                        <!--begin::Sidebar-->
                        <div class="flex-column flex-lg-row-auto mb-4">
                            <!--begin::Card-->
                            <div class="card mb-5 mb-xl-8">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Summary-->
                                    <table class="w-full" style="width: 100%">
                                        <tr>
                                            <td rowspan="3">
                                                <!--begin::User Info-->
                                                <div class="d-flex flex-center flex-column gap-2">
                                                    <!--begin:: Avatar -->
                                                    <div class="symbol symbol-circle symbol-75px overflow-hidden me-3">
                                                        @php
                                                            $option = ['primary', 'danger', 'warning', 'success', 'info'];
                                                            $index = array_rand($option);
                                                        @endphp
                                                        <div
                                                            class="symbol-label fs-1 bg-light-{{ $option[$index] }} text-{{ $option[$index] }}">
                                                            {{ ucwords($employee->name[0]) }}</div>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Name-->
                                                    <div class="fs-3 text-gray-800 fw-bold mb-3">
                                                        {{ $employee->name }}</div>
                                                    <!--end::Name-->
                                                    <!--begin::Position-->
                                                    <div class="mb-9">
                                                        <!--begin::Badge-->
                                                        <div class="badge badge-lg badge-light-primary d-inline px-4">
                                                            {{ ucwords($employee->position) }}</div>
                                                        <!--begin::Badge-->
                                                    </div>
                                                    <!--end::Position-->
                                                </div>
                                                <!--end::User Info-->
                                            </td>
                                            <td>
                                                <!--begin::Details item-->
                                                <div class="text-gray-600">Email</div>
                                                <div class="fw-bold">{{ $employee->email }}</div>
                                                <!--begin::Details item-->
                                            </td>
                                            <td>
                                                <!--begin::Details item-->
                                                <div class="text-gray-600">Birth Place</div>
                                                <div class="fw-bold">{{ ucwords($employee->birth_place) }}</div>
                                                <!--begin::Details item-->
                                            </td>
                                            <td>
                                                <!--begin::Details item-->
                                                <div class="text-gray-600">Birth Date</div>
                                                <div class="fw-bold">{{ date('d F Y', strtotime($employee->birth_date)) }}
                                                </div>
                                                <!--begin::Details item-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::Details item-->
                                                <div class="text-gray-600">Gender</div>
                                                <div class="fw-bold">{{ ucwords($employee->gender) }}</div>
                                                <!--begin::Details item-->
                                            </td>
                                            <td>
                                                <!--begin::Details item-->
                                                <div class="text-gray-600">Employee Status</div>
                                                <div class="fw-bold">{{ ucwords($employee->status) }}</div>
                                                <!--begin::Details item-->
                                            </td>
                                            <td>
                                                <!--begin::Details item-->
                                                <div class="text-gray-600">BPJS Insurance</div>
                                                <div
                                                    class="fw-bold text-{{ $employee->insurance ? 'success' : 'danger' }}">
                                                    {{ $employee->insurance ? 'Yes' : 'No' }}</div>
                                                <!--begin::Details item-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!--begin::Details item-->
                                                <div class="text-gray-600">Working Period</div>
                                                <div class="fw-bold">
                                                    {{ $employee->getWorkingPeriod() }}</div>
                                                <!--begin::Details item-->
                                            </td>
                                            <td>
                                                <!--begin::Details item-->
                                                <div class="text-gray-600">Basic Salary</div>
                                                <div class="fw-bold">{{ currency_format($employee->basic_salary) }}</div>
                                                <!--begin::Details item-->
                                            </td>
                                            <td>
                                                <!--begin::Details item-->
                                                <div class="text-gray-600">Basic Allowance</div>
                                                <div class="fw-bold">{{ currency_format($employee->allowance) }}
                                                </div>
                                                <!--begin::Details item-->
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Sidebar-->
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid">
                            <!--begin::Card-->
                            <div class="card pt-4">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Salary Slip</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Search-->
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                                            <input type="text" data-kt-custom-table-filter="search"
                                                class="form-control form-control-solid w-250px ps-13"
                                                placeholder="Search slip" />
                                        </div>
                                        <!--end::Search-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table wrapper-->
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_custom">
                                        <thead>
                                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                <th class="w-200px">Month Period</th>
                                                <th class="min-w-125px">Approval Status</th>
                                                <th class="text-end min-w-100px">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 fw-semibold">
                                            @foreach ($employee->slip as $slip)
                                                <tr>
                                                    <td>{{ date('F Y', strtotime($slip->month_period)) }}</td>
                                                    <td>
                                                        @if ($slip->status === 'approved')
                                                            <div class="badge py-3 px-4 fs-7 badge-light-success">Approved
                                                            </div>
                                                        @elseif($slip->status === 'rejected')
                                                            <div class="badge py-3 px-4 fs-7 badge-light-danger">Rejected
                                                            </div>
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
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Layout-->
                    <!--begin::Modals-->
                    @include('dashboard.employee_modal')
                    <!--end::Modals-->
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
        let employee = @json($employee);

        for (var key in employee) {
            if (key === 'birth_date' || key === 'join_date') {
                let value = moment(employee[key]).format('DD MMMM Y');

                $('[name=' + key + ']').flatpickr({
                    dateFormat: "d F Y",
                    defaultDate: value,
                });
            } else {
                $('[name=' + key + ']').val(key === 'basic_salary' || key === 'allowance' ? formatCurrency(employee[key]) :
                    employee[key])
            }

        }
    </script>
@endsection
