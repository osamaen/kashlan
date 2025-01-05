@php
    $status_class = $data->status == 1 ? 'btn-success' : 'btn-warning';
    $status_icon = $data->status == 1 ? 'check' : 'ban';
    $status_title = $data->status == 1 ? trans('admin.inactive') : trans('admin.active');

    $new_status_class = $data->new_status == 1 ? 'btn-success' : 'btn-warning';
    $new_status_icon = $data->new_status == 1 ? 'star-half-full' : 'star-o';
    $new_status_title = $data->new_status == 1 ? trans('admin.set_not_new') : trans('admin.set_new');

    $athome_status_class = $data->at_home == 1 ? 'btn-success' : 'btn-warning';
    $athome_status_icon = $data->at_home == 1 ? 'home' : 'ban';
    $athome_status_title = $data->at_home == 1 ? trans('admin.not_at_home') : trans('admin.at_home');

    $in_nav_status_class = $data->in_nav == 1 ? 'btn-success' : 'btn-warning';
    $in_nav_status_icon = $data->in_nav == 1 ? 'film' : 'ban';
    $in_nav_status_title = $data->in_nav == 1 ? trans('admin.not_in_nav') : trans('admin.in_nav');

    $is_expert_class = $data->is_expert == 1 ? 'btn-success' : 'btn-warning';
    $is_expert_icon = $data->is_expert == 1 ? 'star' : 'star';
    $is_expert_title = $data->is_expert == 1 ? 'الغاء تفعيل كخبير' : 'تفعيل كخبير';

    $is_by_expert_class = $data->is_by_expert == 1 ? 'btn-success' : 'btn-warning';
    $is_by_expert_icon = $data->is_by_expert == 1 ? 'bookmark' : 'bookmark';
    $is_by_expert_title = $data->is_by_expert == 1 ? 'الغاء تفعيل كمعتمد من خبير' : 'تفعيل كمعتمد من خبير';

@endphp
<div class="btn-group">
    @if ($data->deleted_at == null)
     
        @if (in_array('active', $module_actions))
            <a href="{{ route($module_name . '.active', $data->id) }}"
                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 {{ $status_class }}"
                data-container="body" data-rel="tooltip" data-placement="top"
                data-loading-text="<i class='fa fa-spinner fa-spin'></i>" data-original-title="{{ $status_title }}"
                title="{{ $status_title }}" onclick="active(this,event);">
                <i class="fa fa-{{ $status_icon }} "></i>
            </a>
        @endif

        @if (in_array('in_nav', $module_actions))
            <a href="{{ route($module_name . '.in_nav', $data->id) }}"
                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 {{ $in_nav_status_class }}"
                data-container="body" data-rel="tooltip" data-placement="top"
                data-loading-text="<i class='fa fa-spinner fa-spin'></i>"
                data-original-title="{{ $in_nav_status_title }}" title="{{ $in_nav_status_title }}"
                onclick="inNav(this,event);">
                <i class="fa fa-{{ $in_nav_status_icon }} "></i>
            </a>
        @endif
        @if (in_array('at_home', $module_actions))
            <a href="{{ route($module_name . '.athome', $data->id) }}"
                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 {{ $athome_status_class }}"
                data-container="body" data-rel="tooltip" data-placement="top"
                data-loading-text="<i class='fa fa-spinner fa-spin'></i>"
                data-original-title="{{ $athome_status_title }}" title="{{ $athome_status_title }}"
                onclick="atHome(this,event);">
                <i class="fa fa-{{ $athome_status_icon }} "></i>
            </a>
        @endif
        @if (in_array('set_new', $module_actions))
            <a href="{{ route($module_name . '.new_product', $data->id) }}"
                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 {{ $new_status_class }}"
                data-container="body" data-rel="tooltip" data-placement="top"
                data-loading-text="<i class='fa fa-spinner fa-spin'></i>" data-original-title="{{ $new_status_title }}"
                title="{{ $new_status_title }}" onclick="setNew(this,event);">
                <i class="fa fa-{{ $new_status_icon }} "></i>
            </a>
        @endif
        @if (in_array('edit', $module_actions))
            <a href="{{ route($module_name . '.edit', $data->id) }}"
                @if (isset($actions_modal) && in_array('edit', $actions_modal)) data-toggle="modal" data-target="#ajaxModal" @endif
                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-container="body"
                data-rel="tooltip" data-placement="top" data-original-title="{{ trans('admin.edit') }}">
                <i class="fa fa-edit"></i>
            </a>
        @endif
        @if (in_array('delete', $module_actions))
            <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                data-container="body" data-rel="tooltip" data-placement="top" data-original-title="@lang('admin.delete')"
                onclick="deleteItem('{{ route($module_name . '.destroy', [$data->id]) }}')">
                <i class="fa fa-trash"></i>
            </a>
        @endif
    @else
        @if (in_array('delete', $module_actions))
            <button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-container="body"
                data-rel="tooltip" data-placement="top" title="@lang('admin.restore')"
                data-original-title="@lang('admin.restore')"
                onclick="restoreItem('{{ route($module_name . '.restore', [$data->id]) }}')">
                <i class="fa fa-undo"></i>
            </button>
        @endif
        @if (in_array('delete', $module_actions))
            <button class="btn btn-danger btn-sm" data-container="body" data-rel="tooltip" data-placement="top"
                title="@lang('admin.force_delete')" data-original-title="@lang('admin.force_delete')"
                onclick="deleteItem('{{ route($module_name . '.destroy', $data->id) }}')">
                <i class="fa fa-trash"></i>
            </button>
        @endif
    @endif










    {{-- <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
        <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
        <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black"></path>
                <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black"></path>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </a>
    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
        <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </a>
    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
        <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </a> --}}







</div>
