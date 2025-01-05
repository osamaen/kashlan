<!DOCTYPE html>

<html lang="en">

<head>
    <title>لوحة الادارة</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="https://unpkg.com/jcrop/dist/jcrop.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/global/plugins.bundle.rtl.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.bundle.rtl.css') }}" />
    <link rel="stylesheet" href="{{mix('css/admin.app.css')}}">
<style>


.card {

direction: rtl

}

.toolbar{

    direction: rtl
}

.ace-file-input{

    width: 100%;
}


.pagination {
    display: flex !important;
    flex-wrap: wrap !important;
    justify-content: center !important;
    margin: 0 !important;
}

.paginate_button {
    margin-right: .5rem;
}



.paginate_button.active a {
    z-index: 3;
    color: #fff;
    background-color: #009ef7;
    border-color: transparent;
}



.paginate_button a {
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: .475rem;
    height: 2.5rem;
    min-width: 2.5rem;
    font-weight: 500;
    font-size: 1.075rem;
    padding: .375rem .75rem;
}
</style>

<script>
    (function () {
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}'
        };
    })();
    var app_locale = '{!! config('app.locale') !!}';
    var table_settings = {};
    var asset = '{{asset('/')}}';
    var method_name = '{{$method_name}}';
    @if($module_name !='home')
    var index_route = '{{route($module_name.'.index')}}';
    @endif
    var module_name = '{{$module_name}}';
</script>


</head>


<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

        <!--begin::Page-->
        <div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            @include('admin.includes.sidebar')
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                @include('admin.includes.header')
             

                <div class="toolbar" id="kt_toolbar">
                    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack"
                        data-select2-id="select2-data-kt_toolbar_container">
                        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                            <span class="h-20px border-gray-200 border-start mx-4"></span>
                            <ol class="breadcrumb text-muted fs-6 fw-bold">
          
                                        <li class="breadcrumb-item">
                                            
                                            <a href="{{route('dashboard')}}"><i class="ace-icon fa fa-home home-icon"></i> @lang('home.module_title')</a>
                                        </li>
                    
                                        @if($method_name=='index' || $method_name==null)
                                        <li class="breadcrumb-item" class="active">{{$module_title}}</li>
                                        @else
                                        <li class="breadcrumb-item"><a href="{{route($module_name.'.index')}}"> {{$module_title}} </a></li>
                                        @endif
                    



                            </ol>
                        </div>
                    </div>
                </div>

                <div class="content d-flex flex-column " id="kt_content">

                    <div class="post d-flex " id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" class="container-fluid">

                 @if ($message = \Session::get('success'))
                    <div dir="rtl" class="alert alert-dismissible alert-success d-flex align-items-center ">
                        <!--begin::Icon-->
                        <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black"></path>
                                <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="black"></path>
                            </svg>
                        </span>

                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-dark">{{$message}}</h4>
                       
                        </div>

                        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                            <span class="svg-icon svg-icon-2x svg-icon-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                            </svg></span>
                        </button>
                        <!--end::Wrapper-->
                    </div>

                    @endif




                    @if ($message = \Session::get('error'))
                    <div dir="rtl" class="alert alert-dismissible alert-danger d-flex align-items-center ">
                        <!--begin::Icon-->
                        <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black"></path>
                                <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="black"></path>
                            </svg>
                        </span>

                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-dark">{{$message}}</h4>
                       
                        </div>

                        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                            <span class="svg-icon svg-icon-2x svg-icon-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                            </svg></span>
                        </button>
                        <!--end::Wrapper-->
                    </div>

                    @endif







                </div>
                <!--end::Wrapper-->
            </div>

            <div id="kt_content_container" class="container-fluid">
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <div class="row w-100">
        
                            <div class="col-4">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">{{ $method_title ?? '' }}</span>
        
                                </h3>
                            </div>
        
                            <div class="col-8 " style="    text-align: end;">
        
                                @hasSection('widget-toolbar')
                                @yield('widget-toolbar')
                            @else
                                @if($method_name=='index')
                                <a href="{{route($module_name.'.create')}}" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-plus"></i>{{trans('admin.create')}}</a>
                                @endif
                            @endif

                            </div>
        
        
                        </div>
        
        
                    </div>

                    @yield('content')
                  
                </div>
            </div>


   

            <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">

                <span class="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                            transform="rotate(90 13 6)" fill="black" />
                        <path
                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                            fill="black" />
                    </svg>
                </span>

            </div>


    
    
    <script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/modals/create-app.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{mix('js/admin.app.js')}}"></script>

    <script src="{{asset('js/script.js')}}"></script>

    {{-- <script src="{!! asset('admin/assets/plugins/custom/tinymce/tinymce.bundle.js') !!}"></script> --}}


    <script src="{!! asset('admin/assets/plugins/tinymce/tinymce.min.js') !!}"></script>
    <script src="{!! asset('admin/assets/js/tinymce_settings.js') !!}"></script>
    @stack('js')
</body>
<!--end::Body-->

</html>
