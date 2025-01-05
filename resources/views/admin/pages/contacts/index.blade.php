@extends('layouts.admin.app')

@section('content')
@section('widget-toolbar')
<span> </span>
@endsection
<div class="card-body py-3">
<form class="form-horizontal form" role="form" action="{{isset($item) ? route($module_name.'.update' , $item->id) : route($module_name.'.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($item))
    @method("PUT")
    @endif
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
            <div id="tab-{{ $locale }}" class="tab-pane fade {{ $locale == 'ar' ? 'active show ' : '' }}" role="tabpanel">

                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label required fw-bold fs-6">
                        <span class="">@lang('admin.title')
                            (@lang('admin.' . $locale))
                            :
                            {{-- {!! $locale=='ar' ? '<i class="text-danger">*</i>' : '' !!} --}}
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



                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label  fw-bold fs-6">
                        <span class="">@lang('admin.address')
                            (@lang('admin.' . $locale)):
                            {{-- {!! $locale=='ar' ? '<i class="text-danger">*</i>' : '' !!} --}}
                        </span>
                    </label>

                    <div class="col-lg-10 fv-row fv-plugins-icon-container">
                        <input type="text" name="{{ $locale }}[address]"
                            class="form-control  {{ $locale != 'ar' ? 'ltr' : '' }}" placeholder=""
                            value="{{ isset($item) && $item->translate($locale) != null
                                ? $item->translate($locale)->address
                                : old($locale . '.address') }}">
                        <div class="fv-plugins-message-container invalid-feedback">
                            @error($locale . '.address')
                                <p class="invalid-feedback text-danger {{ $locale == 'ar' ? 'text-right rtl' : '' }}"
                                    role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>





                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label  fw-bold fs-6">
                        <span class="">@lang('admin.opening')
                            (@lang('admin.' . $locale)):
                            {{-- {!! $locale=='ar' ? '<i class="text-danger">*</i>' : '' !!} --}}
                        </span>
                    </label>

                    <div class="col-lg-10 fv-row fv-plugins-icon-container">
                        <input type="text" name="{{ $locale }}[opening]"
                            class="form-control  {{ $locale != 'ar' ? 'ltr' : '' }}" placeholder=""
                            value="{{ isset($item) && $item->translate($locale) != null
                                ? $item->translate($locale)->opening
                                : old($locale . '.title') }}">
                        <div class="fv-plugins-message-container invalid-feedback">
                            @error($locale . '.opening')
                                <p class="invalid-feedback text-danger {{ $locale == 'ar' ? 'text-right rtl' : '' }}"
                                    role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>


               

            </div>
        @endforeach

        <div class="row mb-6">
            <label class="col-lg-2 col-form-label  fw-bold fs-6">
                <span class="">@lang('admin.fax')
                    (@lang('admin.' . $locale)):
                    {{-- {!! $locale=='ar' ? '<i class="text-danger">*</i>' : '' !!} --}}
                </span>
            </label>

            <div class="col-lg-10 fv-row fv-plugins-icon-container">
                <input type="text" name="fax"
                    class="form-control  {{ $locale != 'ar' ? 'ltr' : '' }}" placeholder=""
                    value="{{ isset($item)
                        ? $item->fax
                        : old('fax') }}">
              
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-2 col-form-label  fw-bold fs-6">
                <span class="">@lang('admin.mobile')
                    (@lang('admin.' . $locale)):
                    {{-- {!! $locale=='ar' ? '<i class="text-danger">*</i>' : '' !!} --}}
                </span>
            </label>

            <div class="col-lg-10 fv-row fv-plugins-icon-container">
                <input type="text" name="mobile"
                    class="form-control  {{ $locale != 'ar' ? 'ltr' : '' }}" placeholder=""
                    value="{{isset($item) && $item['mobile']  !=null ? $item['mobile'] : old('mobile') }}">
              
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-2 col-form-label  fw-bold fs-6">
                <span class="">@lang('admin.phone')
                    (@lang('admin.' . $locale)):
                    {{-- {!! $locale=='ar' ? '<i class="text-danger">*</i>' : '' !!} --}}
                </span>
            </label>

            <div class="col-lg-10 fv-row fv-plugins-icon-container">
                <input type="text" name="phone"
                    class="form-control  {{ $locale != 'ar' ? 'ltr' : '' }}" placeholder=""
                    value="{{isset($item) && $item['phone']  !=null ? $item['phone'] : old('phone') }}">
               
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-2 col-form-label  fw-bold fs-6">
                <span class="">@lang('admin.email')
                    (@lang('admin.' . $locale)):
                    {{-- {!! $locale=='ar' ? '<i class="text-danger">*</i>' : '' !!} --}}
                </span>
            </label>

            <div class="col-lg-10 fv-row fv-plugins-icon-container">
                <input name="email" value="{{isset($item) && $item['email']  !=null ? $item['email'] : old('email') }}"  id="email" class="form-control ltr text-left" />
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-2 col-form-label  fw-bold fs-6">
                <span class="">@lang('admin.map')
                    (@lang('admin.' . $locale)):
                    {{-- {!! $locale=='ar' ? '<i class="text-danger">*</i>' : '' !!} --}}
                </span>
            </label>

            <div class="col-lg-10 fv-row fv-plugins-icon-container">
                <textarea name="map" rows="7" id="map" class="form-control ltr text-left">{{isset($item) && $item['map']  !=null ? $item['map'] : old('map') }}</textarea>
                
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-2">
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fa fa-save"></i> {{ trans('admin.save') }}</button>
            </div>
        </div>
    </div>
@endsection
