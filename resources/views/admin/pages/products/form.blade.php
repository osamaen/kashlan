@extends('admin.pages.form')

@section('form-inputs')
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
            <div id="tab-{{ $locale }}" class="tab-pane fade {{ $locale == 'ar' ? 'active show ' : '' }}"
                role="tabpanel">
                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label  fw-bold fs-6">
                        <span class="required">@lang('admin.title')
                            (@lang('admin.' . $locale))
                            :

                        </span>
                    </label>

                    <div class="col-lg-10 fv-row fv-plugins-icon-container">
                        <input type="text" name="{{ $locale }}[title]"
                            class="form-control  {{ $locale != 'ar' ? 'ltr' : '' }}" placeholder=""
                            value="{{ isset($item) && $item->translate($locale) != null
                                ? $item->translate($locale)->title
                                : old($locale . '.title') }}">
                        <div class="fv-plugins-message-container invalid-feedback">
                            @error($locale . '.title')
                                <p class="invalid-feedback text-danger {{ $locale == 'ar' ? 'text-right rtl' : '' }}"
                                    role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                </div>

                @include('admin.components.inputs.description')


            </div>
        @endforeach
        {{-- @include('admin.components.inputs.short_description') --}}

        <div class="row mb-6">
            <label class="col-lg-2 col-form-label  fw-bold fs-6"> العلامة التجارية :</label>
            <div class="col-lg-10 fv-row fv-plugins-icon-container">
                <select class="form-control" name="brand_id" id="brand_id">
                    <option value="">اختر--</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}"
                            {{ old('brand_id') == $brand->id || request('brand_id') == $brand->id ? 'selected' : (isset($item) && $item->brand_id == $brand->id ? 'selected' : null) }}>
                            {{ $brand->title }}</option>
                    @endforeach
                </select>
                @error('rating_val')
                    <p class="invalid-feedback text-danger {{ $locale == 'ar' ? 'text-right rtl' : '' }}" role="alert">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-2 col-form-label  fw-bold fs-6"> الصنف :</label>
            <div class="col-lg-10 fv-row fv-plugins-icon-container">
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">اختر--</option>
                    @foreach ($categories as $main_category)
                        <option value="{{ $main_category->id }}"
                            {{ old('category_id') == $main_category->id || request('category_id') == $main_category->id ? 'selected' : (isset($item) && $item->category_id == $main_category->id ? 'selected' : null) }}>
                            {{ $main_category->title }}</option>
                    @endforeach
                </select>
             
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-2 col-form-label  fw-bold fs-6"> المنتج جديد :</label>
            <div class="col-lg-10 fv-row fv-plugins-icon-container">
                <label class="form-check form-switch form-check-custom form-check-solid">
                    <!--begin::Input-->
                    <input class="form-check-input" name="is_new" type="checkbox" value="1"
                        id="is_new" checked="checked">
               
                </label>
         
            </div>
        </div>

        @include('admin.components.inputs.image')
    @endsection
