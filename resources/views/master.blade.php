<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>X-Payroll - Simple payroll management</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="X-Payroll" />
    <link rel="shortcut icon" href="{{ asset('src/media/logos/logo.ico') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('src/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    @section('css')
    @show
</head>
<!--end::Head-->
<!--begin::Body-->

@if (auth()->check())

    <body id="kt_app_body" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true"
        data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
        data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    @else

        <body id="kt_body" class="auth-bg bgi-size-cover bgi-attachment-fixed bgi-position-center">
@endif

<!--begin::Theme mode setup on page load-->
<script>
    var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
</script>

@yield('content')

<!--end::body-->
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('src/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('src/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
@auth
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('src/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
@endauth
@if (session('message'))
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toastr-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "3000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        let message = `{{ session('message')['msg'] }}`;
        let title = `{{ session('message')['title'] }}`;
        let type = `{{ session('message')['type'] }}`;

        if (type === 'success') {
            toastr.success(message, title);
        } else {
            toastr.error(message, title);
        }
    </script>
@endif
@section('js')
@show
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>
