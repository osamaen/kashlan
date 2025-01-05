@extends('layouts.admin.app')

@section('content')

            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table  id="ajaxTable" class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted">
                                {{-- <th class="w-25px">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check">
                                    </div>
                                </th> --}}
                                <th class="20">#</th>
                                <th class="20">{{ __('messages.image') }}</th>
                                <th class="70">{{ __('messages.title') }}</th>
                                <th class="70">{{ __('messages.action') }}</th>
                            </tr>
                        </thead>

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
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script type="text/javascript">


    jQuery(function ($) {

        // console.log("f");
        datatable_settings.columns = [
            {data: 'id', name: 'id', "orderable": false,"sClass":  "text-center"},
            {data: 'image', name: 'image', "orderable": true,"sClass":  "text-center"},
            {data: 'title', name: 'title', "orderable": true,"sClass":  "text-center"},
            {data: 'actions', name: 'actions', "orderable": false,"sClass":  "text-center"},
        ]
        datatable_settings.datatableInit('#ajaxTable');



    });
</script>
@endpush