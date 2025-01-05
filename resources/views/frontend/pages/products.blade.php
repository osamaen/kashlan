@extends('layouts.frontend.app')
@section('content')
    <div class="container-fluid page-header py-5" style="height:700px; background-image:url('{{ $bunner_photo }}')">

    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-xl-4">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="mb-4 ">{{ trans('frontend.brands') }}</h2>
                                </div>
                                <div class="col-5" style="align-self: center;">
                                    <p>Brands / Lily / tissue </p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-6" style="align-self: center;">
                                    @if (app()->getLocale() == 'ar')
                                        <h6 class=""> {{ trans('frontend.brands') }} /
                                            {{ trans('frontend.products') }} /</h6>
                                    @else
                                        <h6 class=""> {{ trans('frontend.products') }} /
                                            {{ trans('frontend.brands') }} /</h6>
                                    @endif
                                </div>
                                <div class="col-6" style="align-self: center;">
                                    <input type="search" class="form-control " placeholder="">
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-8">
                            <div class="row g-4">
                                <div class="col-xl-4">

                                </div>
                                <div class="col-8"></div>
                                <div class="col-xl-4">
                                    box
                                </div>
                            </div>
                            <div class="row g-4 " style="justify-content: end;">
                                <div class="col-xl-4">

                                </div>
                                <div class="col-8"></div>
                                <div class="col-xl-4">
                                    <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                        <label for="fruits">Default Sorting:</label>
                                        <select id="fruits" name="fruitlist"
                                            class="border-0 form-select-sm bg-light me-3" form="fruitform">
                                            <option value="volvo">Nothing</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-12">

                    <div class="row g-4">
                        <div class="col-lg-4">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">

                                                <div class="accordion" id="brandsAccordion">
                                                    @foreach ($brands as $brand)
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header">
                                                                <button class="accordion-button collapsed "
                                                                    style=" font-size: 20px;" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapse{{ $brand->id }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse{{ $brand->id }}">

                                                                    {{ $brand->title }}

                                                                </button>
                                                            </h2>
                                                            <div id="collapse{{ $brand->id }}"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="heading{{ $brand->id }}"
                                                                data-bs-parent="#brandsAccordion">
                                                                <div class="accordion-body">
                                                                    <ul>


                                                                        @foreach ($brand->categories as $category)
                                                                            <p class="brand-category"
                                                                                style="font-size: medium; 
                                                                       ">
                                                                                <a href="{{ route('products') . '?category_id=' . $category->id }}"
                                                                                    class="brand-category"
                                                                                    style="color: #dee2e6">
                                                                                    {{ $category->title }}</a>




                                                                            </p></br>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4 class="mb-2">{{ trans('frontend.filer_weight') }}</h4>
                                        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput"
                                            min="0" max="500" value="0"
                                            oninput="amount.value=rangeInput.value">
                                        <output id="amount" name="amount" min-velue="0" max-value="500"
                                            for="rangeInput">0</output>
                                    </div>
                                </div>

                                <div class="col-lg-12">

                                </div>
                                <div class="col-lg-12">
                                    <div class="position-relative">
                                        <img src="{{ asset('filter_photo.png') }}" class="img-fluid w-100 rounded"
                                            alt="">
                                        <div class="position-absolute"
                                            style="top: 50%; right: 10px; transform: translateY(-50%);">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row g-4 ">

                                @foreach ($items as $product)
                                    <a class="col-md-6 col-lg-6 col-xl-4"
                                        href="{{ route('products.details', $product->id) }}">
                                        <div class="text-center">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{ $product->image_path }}"
                                                        class="img-fluid w-100 rounded-top" alt="">
                                                </div>

                                                {{-- <div class="p-4 text-center">
                                                    
                                                </div> --}}
                                            </div>
                                            {{-- <button class="btn btn-icon share-button"  data-link="{{ route('products.details', ['id' => $product->id]) }}">
                                                <i class="fas fa-share-alt product-icon"
                                                    style="color:#898989"></i>
                                            </button> --}}

                                            <button class="btn btn-icon share-button" data-link="{{ route('products.details', ['id' => $product->id]) }}">
                                                <span class="material-symbols-outlined">
                                                    share
                                                </span>
                                            </button>
                                            <button class="btn btn-icon add-to-cart" data-id="{{ $product->id }}"
                                                data-image="{{ $product->image_path }}"
                                                data-title="{{ $product->title }}">
                                                <span class="material-symbols-outlined product-icon">
                                                    zoom_in
                                                </span>
                                            </button>
                                            {{-- <button class="btn btn-icon add-to-cart"  data-id="{{ $product->id }}"
                                                data-title="{{ $product->title }}"
                                                data-image="{{ $product->image_path }}">
                                                <i class="fas fa-search-plus product-icon"
                                                    style="color: #898989"></i>
                                            </button> --}}
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->


    @include($frontend_includes_folder . '.banner_photo')

    @include($frontend_includes_folder . '.our_brands')
@endsection
