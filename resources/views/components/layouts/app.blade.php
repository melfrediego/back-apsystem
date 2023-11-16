<!DOCTYPE html>
<html llang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="">
    <title>{{ $title ?? 'Page Title' }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />


    {{-- Criar um style para essas modificações --}}
    <style>
        .aside-dark .menu .menu-item .menu-link .menu-title {
            color: #e0e0e0;
        }

        .select2-container--bootstrap5 .select2-selection--single .select2-selection__rendered{
            color:  #181c32;
        }

        .badge {
            /* display: inline-block;
            padding: 0.5em 0.85em;
            font-size: .85rem;
            font-weight: 600;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline; */
            border-radius: 1rem;
        }

       
    </style>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
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

                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        @if (Request::segment(2) == 'create' || Request::segment(2) == 'edit')
                            <div class="container-xxl w-1000px">
                            @else
                                <div class="container-fluid">
                        @endif
                        {{ $slot }}
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
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
    {{-- @stack('scripts') --}}
    {{-- <script>var hostUrl = "assets/";</script> --}}
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
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
    {{-- @stack('scripts') --}}
</body>
<!--end::Body-->

</html>
