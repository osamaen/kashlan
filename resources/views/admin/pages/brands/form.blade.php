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
            @include('admin.components.inputs.title')
            @include('admin.components.inputs.short_description')
        </div>
        @endforeach
    {{-- <div class="d-flex flex-column mb-8">
        <label class="fs-6 fw-bold mb-2">{{ __('messages.image') }}</label>
        <input class="form-control " type="file" name="image" accept=".png, .jpg, .jpeg">
    </div> --}}

    @include('admin.components.inputs.image')
</div>
@endsection
