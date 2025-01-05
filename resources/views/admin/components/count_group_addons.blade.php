<div class="input-group" style="justify-content: center;">
    <span class="input-group-btn">
        <a href="{{$create_child_route}}"
           @if(isset($create_btn_modal))
            data-toggle="modal" data-target="#ajaxModal"
           @endif
           class="btn btn-success btn-icon btn-sm"
           data-rel="tooltip" data-placement="top"
           data-original-title="{{trans('admin.create')}}"> <i
                class="fa fa-plus"></i>
        </a>
    </span>
    <span class="input-group-addon input-group-addon-sm">
        <span class="badge badge-{{($item_count > 0 ? 'info' : 'danger')}} \">
         {{$item_count}}
        </span>
    </span>

    <span class="input-group-btn">
        <a href="{{$show_child_route}}"
           @if(isset($show_btn_modal))
            data-toggle="modal" data-target="#ajaxModal"
           @endif
           class="btn btn-primary btn-icon btn-sm"
           data-rel="tooltip" data-placement="top"
           data-original-title="{{trans('admin.show')}}">
            <i class="fa fa-eye"></i>
        </a>
    </span>

    

</div>



