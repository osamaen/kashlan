@extends('layouts.admin.app')

@section('content')

            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table id="ajaxTable" class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted bg-light">
                       
                                <th width="50">#</th>
                                <th width="100">@lang('admin.image')</th>
                                <th>@lang('admin.title')</th>
                                <th width="100">@lang('admin.order')</th>
                                <th width="130">@lang('admin.actions')</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                           
                          
                       
                   
                     
                   
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
        <!--end::Tables Widget 13-->
    </div>
    <!--end::Container-->
</div>
@endsection

@push('js')
    <script type="text/javascript">
        jQuery(function ($) {
            datatable_settings.columns = [
                {data: 'id', name: 'id', "orderable": false,"sClass":  "text-center"},
                {data: 'image', name: 'image', "orderable": true,"sClass":  "text-center"},
                {data: 'title', name: 'title', "orderable": true,"sClass":  "text-center"},
                {data: 'order_form', name: 'item_order', "orderable": true,"sClass":  "text-center"},
                {data: 'actions', name: 'actions', "orderable": false,"sClass":  "text-center"},
            ]
            datatable_settings.datatableInit('#ajaxTable');
        });
    </script>
@endpush
