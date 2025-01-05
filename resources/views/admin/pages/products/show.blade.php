@extends('admin.pages.show')

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
                                                    !=null ? $item->translate($locale)->title : old($locale.'.title') }}" readonly>
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
            <label class="col-lg-2 col-form-label  fw-bold fs-6"> العلامة التجارية :</label>
            <div class="col-lg-10 fv-row fv-plugins-icon-container">
                <select class="form-control" name="brand_id" id="brand_id" disabled>
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
                <select class="form-control" name="category_id" id="category_id" disabled>
                    <option value="">اختر--</option>
                    @foreach ($categories as $main_category)
                        <option value="{{ $main_category->id }}"
                            {{ old('category_id') == $main_category->id || request('category_id') == $main_category->id ? 'selected' : (isset($item) && $item->category_id == $main_category->id ? 'selected' : null) }}>
                            {{ $main_category->title }}</option>
                    @endforeach
                </select>
             
            </div>
        </div>
        <div class="row"  id="image_div">
            <input type="hidden" id="x1" name="x1">
            <input type="hidden" id="y1" name="y1">
            <input type="hidden" id="x2" name="x2">
            <input type="hidden" id="y2" name="y2">
            <input type="hidden" id="filesize" name="filesize">
            <input type="hidden" id="filetype" name="filetype">
            <input type="hidden" id="filedim" name="filedim">
            <input type="hidden" id="h" name="h">
            <input type="hidden" id="w" name="w">
            <label for="image_file" class="col-lg-2 col-form-label"> </label>
            <div class="col-lg-8" id="interface">
                @if(isset($item) && !empty($item->image))
                <img id="preview" src="{{asset($uploads_folder.'/'.$module_name.'/'.$item->image)}}" class="img-thumbnail" style="width: -webkit-fill-available;"/>
                @else
                <img id="preview" style="    width: inherit;">
                @endif
            </div>
        </div>

    

@endsection
