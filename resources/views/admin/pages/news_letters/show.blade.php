@extends('admin.pages.show')

@section('form-inputs')


@section('widget-toolbar')
@if($item->deleted_at==null)


<a href="{{route($module_name.'.active',$item->id)}}"
   class="btn btn-xs btn-white btn-{{$item->status==1 ? 'primary': 'warning'}}" title=""
   data-rel="tooltip" data-placement="top"
   data-original-title="{{$item->status==1 ? trans('admin.inactive'): trans('admin.active')}}"
   data-loading-text="<i class='fa fa-spinner fa-spin '></i>"
   onclick="active(this,event);">
    <i class="ace-icon fa fa-{{$item->status==1 ? 'check': 'ban'}}"></i>
</a>

<a class="btn btn-white btn-info btn-xs" href="{{route($module_name.'.edit',$item->id)}}" data-rel="tooltip"
   data-placement="top" title="@lang('admin.edit')" data-original-title=" @lang('admin.edit')">
    <i class="ace-icon fa fa-pencil"></i>
</a>


<a class="btn btn-white btn-danger btn-xs" data-rel="tooltip" data-placement="top" title=""
        data-original-title=" حذف "
        onclick="event.preventDefault();deleteItem('{{route($module_name . '.destroy', [$item->id, 'soft_delete'])}}')">
    <i class="ace-icon fa fa-trash-o"></i>
</a>


@else
<button class="btn btn-white btn-info btn-xs"
        data-rel="tooltip" data-placement="top"
        title="@lang('admin.restore')"
        data-original-title="@lang('admin.restore')"
        onclick="restoreItem('{{route($module_name.'.restore',[$item->id])}}')">
    <i class="fa fa-undo"></i>
</button>

</button>
@endif
@endsection
    <div class="d-flex overflow-auto h-55px mb-3">
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
            @foreach (config('translatable.locales') as $locale)
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ $locale == 'ar' ? 'active' : '' }}"
                        href="#tab-{{ $locale }}" data-bs-toggle="tab">@lang('admin.' . $locale)</a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="tab-content" id="myTabContent">
        @foreach (config('translatable.locales') as $locale)

        <div id="tab-{{$locale}}" class="tab-pane fade {{$locale=='ar' ? 'active show ' : ''}}" role="tabpanel">
            <div class="row mb-6">
                <label class="col-lg-2 col-form-label  fw-bold fs-6">
                    <span class="required">@lang('admin.title')
                        (@lang('admin.'.$locale)): 
                        {{-- {!! $locale=='ar' ? '<i class="text-danger">*</i>' : '' !!} --}}
                    </span>
                </label>
            
                <div class="col-lg-10 fv-row fv-plugins-icon-container">
                <input type="text" name="{{$locale}}[title]" class="form-control  {{$locale!='ar' ? 'ltr':''}}" placeholder="" value="{{isset($item) && $item->translate($locale)
                                                    !=null ? $item->translate($locale)->title : old($locale.'.title') }}">
                <div class="fv-plugins-message-container invalid-feedback">
                    @error($locale.'.title')
                    <p class="invalid-feedback text-danger {{$locale=='ar' ? 'text-right rtl':''}}" role="alert">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            </div>

            

        </div>
        @endforeach
      

    

@endsection
