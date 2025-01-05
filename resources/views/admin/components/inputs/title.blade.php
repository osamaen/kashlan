

<div class="row mb-6">
    <div class="col-lg-2 col-form-label  fw-bold fs-6">
    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
        <span class="required">@lang('admin.title')
            (@lang('admin.'.$locale)): 
            {{-- {!! $locale=='ar' ? '<i class="text-danger">*</i>' : '' !!} --}}
        </span>
    </label>
    </div>


<div class="col-lg-10 fv-row fv-plugins-icon-container">
    <input type="text" name="{{$locale}}[title]" class="form-control  {{$locale!='ar' ? 'ltr':''}}" placeholder="" value="{{isset($item) && $item->translate($locale)
    !=null ? $item->translate($locale)->title : old($locale.'.title') }}">

</div>
<div class="fv-plugins-message-container invalid-feedback">
        @error($locale.'.title')
        <p class="invalid-feedback text-danger {{$locale=='ar' ? 'text-right rtl':''}}" role="alert">
            {{ $message }}
        </p>
        @enderror
    </div>
</div>


