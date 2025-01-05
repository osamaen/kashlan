@extends('layouts.frontend.app')
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5" style="height:700px; background-image:url('{{ $bunner_photo }}')">

    </div>

    <!-- Single Product Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-3">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <h4>Categories</h4>
                                <ul class="list-unstyled fruite-categorie">
                                    @foreach ($item->sub_cats as $category)
                                        <li style="font-size: x-large;">
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="{{ route('categories.details', ['id' => $item->id]) . '?category_id=' . $category->id }}">{{ $category->title }}</a>
                                                <span>({{ $category->products->count() }})</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>




                        </div>
                        <!--<div class="col-lg-12">-->
                        <!--    <div class="mb-3">-->
                        <!--        <h4 class="mb-2">Price</h4>-->
                        <!--        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput"-->
                        <!--            min="0" max="500" value="0"-->
                        <!--            oninput="amount.value=rangeInput.value">-->
                        <!--        <output id="amount" name="amount" min-velue="0" max-value="500"-->
                        <!--            for="rangeInput">0</output>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <div class="col-lg-12">
                        </div>
                        <div class="col-lg-12">
                            <div class="position-relative">
                                <img src="{{ asset('filter_photo.png') }}" class="img-fluid w-100 rounded" alt="">
                                <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="row g-4 ">

                        @foreach ($products as $product)
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

    @include($frontend_includes_folder . '.our_brands')
@endsection
