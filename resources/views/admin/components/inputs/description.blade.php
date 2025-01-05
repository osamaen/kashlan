<div class="row mb-3">

    <div class="col-lg-2 col-form-label  fw-bold fs-6">
    <label for="{{$locale}}[description]" >@lang('admin.description')
        (@lang('admin.'.$locale))
        : </label>
    </div>
    <div class="col-lg-10 fv-row fv-plugins-icon-container">
        <textarea name="{{$locale}}[description]" id="{{$locale}}_description" class="form-control {{$locale=='ar' ? 'textarea_rtl':'textarea_ltr'}}">{{isset($item) && $item->translate($locale) !=null ? $item->translate($locale)->description : old($locale.'.description') }}</textarea>
    </div>
</div>