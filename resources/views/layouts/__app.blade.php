<!DOCTYPE html>
<html lang="pt-br">

<head>
    <base href="">
    <title>@yield('title', 'APSystem - Sistema de Gestão de Vendas')</title>
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside----------------------------------------------------------------------------------------------------------->
            @include('layouts.includes.aside')
            <!--end::Aside------------------------------------------------------------------------------------------------------------->


            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <!--begin::Header----------------------------------------------------------------------------------------------------------------->
                @include('layouts.includes.header')
                <!--end::Header------------------------------------------------------------------------------------------------------------------->



                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Toolbar------------------------------------------------------------------------------------------------------------->
                    {{-- @include('layouts.includes.toolbar') --}}
                    <!--end::Toolbar--------------------------------------------------------------------------------------------------------------->

                    <!--begin::Conteudo (@YELD)---------------------------------------------------------------------------------------------------->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div class="container-fluid">

                            {{ url()->current() }}

                            {{-- {{ $slot }} --}}

                            {{-- @yield('content-main') --}}
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Conteudo (@YELD)------------------------------------------------------------------------------------------------------>
                </div>
                <!--end::Content-->


                <!--begin::Footer------------------------------------------------------------------------------------------------------------------->
                @include('layouts.includes.footer')
                <!--end::--------------------------------------------------------------------------------------------------------------------------->


            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

    <!-- Utilitarios Drawer, Modal, Chat Drawer etc.. ---------------------------------------------------------------------------------------------->
    <!-- Utilitarios Drawer, Modal, Chat Drawer etc.. ---------------------------------------------------------------------------------------------->

    <!--end::Main-->
    {{-- <script>var hostUrl = "assets/";</script> --}}
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    {{-- <script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script> --}}
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    {{-- <script src="assets/js/custom/apps/chat/chat.js"></script>
	<script src="assets/js/custom/modals/create-app.js"></script>
	<script src="assets/js/custom/modals/upgrade-plan.js"></script> --}}
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->

    @livewireScripts


</body>
<!--end::Body-->

</html>
