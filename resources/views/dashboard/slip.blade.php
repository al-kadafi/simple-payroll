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
                            Salary Detail</h1>
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
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href={{ route('salary') }} class="text-muted text-hover-primary">Salary</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">View Slip</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        @if (auth()->user()->role === 'staff')
                            <!--begin::Download button-->
                            <a href="#" class="btn btn-sm btn-flex btn-secondary fw-bold">
                                <i class="ki-outline ki-file-down fs-6 me-1"></i>Download</a>
                            <!--end::Download button-->
                            <!--begin::Print button-->
                            <a href="#" class="btn btn-sm fw-bold btn-primary"> <i
                                    class="ki-outline ki-printer fs-6 me-1"></i>Print</a>
                            <!--end::Print button-->
                        @else
                            <!--begin::Download button-->
                            <a href="#" class="btn btn-sm btn-flex btn-secondary fw-bold">
                                <i class="ki-outline ki-file-sheet fs-6 me-1"></i>Set to Draft</a>
                            <!--end::Download button-->
                            <!--begin::Print button-->
                            <a href="#" class="btn btn-sm fw-bold btn-danger"> <i
                                    class="ki-outline ki-cross-square fs-6 me-1"></i>Reject Slip</a>
                            <!--end::Print button-->
                            <!--begin::Print button-->
                            <a href="#" class="btn btn-sm fw-bold btn-primary"> <i
                                    class="ki-outline ki-check-square fs-6 me-1"></i>Approve Slip</a>
                            <!--end::Print button-->
                        @endif
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
                    <!--begin::Invoice 2 main-->
                    <div class="card">
                        <!--begin::Body-->
                        <div class="card-body p-lg-20">
                            <!--begin::Layout-->
                            <div class="d-flex flex-column flex-xl-row">
                                <!--begin::Content-->
                                <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
                                    <!--begin::Invoice 2 content-->
                                    <div class="mt-n1">
                                        <!--begin::Top-->
                                        <div class="d-flex flex-stack align-items-center pb-10">
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-3 text-gray-800">Salary Slip</div>
                                            <!--end::Label-->
                                            <!--begin::Action-->
                                            <div class="badge py-3 px-4 fs-7 badge-light-success">Approved</div>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Top-->
                                        <!--begin::Wrapper-->
                                        <div class="m-0">
                                            <!--begin::Content-->
                                            <div class="flex-grow-1">
                                                <!--begin::Table-->
                                                <div class="table-responsive border-bottom mb-9">
                                                    <table class="table mb-3">
                                                        <thead>
                                                            <tr class="border-bottom fs-6 fw-bold text-muted">
                                                                <th class="min-w-175px pb-2">Description</th>
                                                                <th class="min-w-70px text-end pb-2">Note</th>
                                                                <th class="min-w-100px text-end pb-2">Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="fw-bold text-gray-700 fs-6 text-end">
                                                                <td class="d-flex align-items-center pt-6">
                                                                    <i
                                                                        class="fa fa-genderless text-danger fs-2 me-2"></i>Basic
                                                                    Salary
                                                                </td>
                                                                <td class="pt-6">-</td>
                                                                <td class="pt-6 text-dark fw-bold">
                                                                    {{ currency_format(5000000) }}</td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-6 text-end">
                                                                <td class="d-flex align-items-center">
                                                                    <i
                                                                        class="fa fa-genderless text-success fs-2 me-2"></i>Basic
                                                                    Allowance
                                                                </td>
                                                                <td>-</td>
                                                                <td class="fs-6 text-dark fw-bold">
                                                                    {{ currency_format(2000000) }}</td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-6 text-end">
                                                                <td class="d-flex align-items-center">
                                                                    <i
                                                                        class="fa fa-genderless text-primary fs-2 me-2"></i>Insentif
                                                                </td>
                                                                <td>-</td>
                                                                <td class="fs-6 text-dark fw-bold">
                                                                    {{ currency_format(1000000) }}</td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-6 text-end">
                                                                <td class="d-flex align-items-center">
                                                                    <i
                                                                        class="fa fa-genderless text-warning fs-2 me-2"></i>Extra
                                                                    Time
                                                                </td>
                                                                <td>6 Hours</td>
                                                                <td class="fs-6 text-dark fw-bold">
                                                                    {{ currency_format(500000) }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--end::Table-->
                                                <!--begin::Container-->
                                                <div class="d-flex justify-content-end">
                                                    <!--begin::Section-->
                                                    <div class="mw-300px">
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-stack mb-3">
                                                            <!--begin::Accountname-->
                                                            <div class="fw-bold pe-10 text-gray-600 fs-6">Subtotal
                                                            </div>
                                                            <!--end::Accountname-->
                                                            <!--begin::Label-->
                                                            <div class="text-end fw-bolder fs-6 text-gray-800">
                                                                {{ currency_format(10000000) }}
                                                            </div>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-stack mb-3">
                                                            <!--begin::Accountname-->
                                                            <div class="fw-semibold pe-10 text-gray-600 fs-7">NWNP</div>
                                                            <!--end::Accountname-->
                                                            <!--begin::Label-->
                                                            <div class="text-end fw-bold fs-6 text-gray-800">-
                                                                {{ currency_format(100000) }}</div>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-stack mb-3">
                                                            <!--begin::Accountnumber-->
                                                            <div class="fw-semibold pe-10 text-gray-600 fs-7">BPJS</div>
                                                            <!--end::Accountnumber-->
                                                            <!--begin::Number-->
                                                            <div class="text-end fw-bold fs-6 text-gray-800">-
                                                                {{ currency_format(100000) }}
                                                            </div>
                                                            <!--end::Number-->
                                                        </div>
                                                        <!--end::Item-->

                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Container-->
                                                <div class="separator py-1 mb-6"></div>
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Code-->
                                                    <div class="fw-bold pe-10 text-gray-600 fs-6">Grand Total</div>
                                                    <!--end::Code-->
                                                    <!--begin::Label-->
                                                    <div class="text-end text-dark fw-bolder fs-6 text-gray-800">
                                                        {{ currency_format(9800000) }}
                                                    </div>
                                                    <!--end::Label-->
                                                </div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Invoice 2 content-->
                                </div>
                                <!--end::Content-->
                                <!--begin::Sidebar-->
                                <div class="m-0">
                                    <!--begin::Invoice 2 sidebar-->
                                    <div
                                        class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-350px p-9 bg-lighten">
                                        <!--begin::Title-->
                                        <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">EMPLOYEE DETAILS</h6>
                                        <!--end::Title-->
                                        <!--begin::Item-->
                                        <div class="mb-6">
                                            <div class="fw-semibold text-gray-600 fs-7">Name:</div>
                                            <div class="fw-bold text-gray-800 fs-6">{{ $employee->name }}</div>
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="mb-6">
                                            <div class="fw-semibold text-gray-600 fs-7">Position:</div>
                                            <div class="fw-bold text-gray-800 fs-6">{{ ucfirst($employee->position) }}
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="mb-6">
                                            <div class="fw-semibold text-gray-600 fs-7">Employee Status:</div>
                                            @if ($employee->status === 'permanent')
                                                <div class="fw-bold fs-6 text-info">Permanent Employee</div>
                                            @elseif ($employee->status === 'contract')
                                                <div class="fw-bold fs-6 text-warning">Contract Employee</div>
                                            @else
                                                <div class="fw-bold fs-6 text-primary">Freelance Employee</div>
                                            @endif
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="mb-6">
                                            <div class="fw-semibold text-gray-600 fs-7">Working Period:</div>
                                            <div class="fw-bold text-gray-800 fs-6">
                                                {{ ucfirst($employee->working_period) }}
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Invoice 2 sidebar-->
                                </div>
                                <!--end::Sidebar-->
                            </div>
                            <!--end::Layout-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Invoice 2 main-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->
@endsection
