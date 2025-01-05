
<div class="row mb-6">
    <div class="col-lg-2 col-form-label  fw-bold fs-6">
        <label for="{{$locale}}[short_description]" >
            @lang('admin.short_description')
            (@lang('admin.'.$locale))
            : </label>
    </div>
    <div class="col-lg-10 fv-row fv-plugins-icon-container">
        <input name="{{$locale}}[short_description]" id="{{$locale}}_short_description" style="{{ $locale == 'en' ?' direction: ltr' : '' }}"  class="form-control " 
        value="{{isset($item) && $item->translate($locale) !=null ? $item->translate($locale)->short_description : old($locale.'.short_description') }}" />
    </div>
</div>
