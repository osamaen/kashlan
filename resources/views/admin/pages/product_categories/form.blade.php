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
        <div class="row mb-6">
            <label class="col-lg-2 col-form-label  fw-bold fs-6"> التصنيف الرئيسي :</label>
            <div class="col-lg-10 fv-row fv-plugins-icon-container">
                <select class="form-control" name="parent_id" id="parent_id" >
                    <option value="">رئيسي لا يتبع لتصنيف</option>
                    @foreach($main_products_cats as $main_category)
                        <option value="{{$main_category->id}}"
                            {{(old('parent_id')== $main_category->id || request('category_id')== $main_category->id) ? 'selected' : (isset($item) && $item->parent_id == $main_category->id ? 'selected':null) }}>{{$main_category->title}}</option>
                    @endforeach
                </select>
                @error('rating_val')
                <p class="invalid-feedback text-danger {{$locale=='ar' ? 'text-right rtl':''}}" role="alert">
                    {{ $message }}
                </p>
                @enderror
            </div>
        </div>

        @include('admin.components.inputs.image')

@endsection
