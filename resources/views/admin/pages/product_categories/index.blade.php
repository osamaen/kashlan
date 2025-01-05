@extends('layouts.admin.app')

@section('content')


            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table id="ajaxTable" class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted">
                                <th width="50">#</th>
                                <th width="100">@lang('admin.image')</th>
                                <th>@lang('admin.title')</th>
                                @if(!request('category_id'))
                                <th>الاقسام الفرعية</th>
                               @endif
                            
                                {{-- <th width="100">@lang('admin.order')</th> --}}
                                <th width="100">@lang('admin.order')</th>
                                <th width="130">@lang('admin.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script type="text/javascript">
        jQuery(function ($) {
            datatable_settings.columns = [
                {data: 'id', name: 'id', "orderable": false,"sClass":  "text-center"},
                {data: 'image', name: 'image', "orderable": true,"sClass":  "text-center"},
                {data: 'title_link', name: 'title', "orderable": true,"sClass":  "text-center"},
                @if(!request('category_id'))
                {data: 'sub_cats_count', name: 'sub_cats_count', "orderable": false, "sClass":  "text-center"},
                @endif
           
                {data: 'order_form', name: 'item_order', "orderable": true,"sClass":  "text-center"},
                {data: 'actions', name: 'actions', "orderable": false,"sClass":  "text-center"},
            ]
            datatable_settings.datatableInit('#ajaxTable');
        });
    </script>
@endpush


{{-- 
@if(request('category_id'))
{data: 'count_group', name: 'count_group', "orderable": false, "sClass":  "text-center"},
@endif --}}