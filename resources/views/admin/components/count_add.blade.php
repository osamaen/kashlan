<div class="input-group">
    <span class="input-group-btn">
        <a href="{{$create_child_route}}"
           @if(isset($create_btn_modal))
            data-toggle="modal" data-target="#ajaxModal"
           @endif
           class="btn btn-success btn-sm"
           data-rel="tooltip" data-placement="top"
           data-original-title="{{trans('admin.create')}}"> <i
                class="fa fa-plus"></i>
        </a>
    </span>
    <span class="input-group-addon input-group-addon-xs">
        <span class="badge badge-{{($item_count > 0 ? 'info' : 'danger')}} \">
         {{$item_count}}
        </span>
    </span>



</div>
