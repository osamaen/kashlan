<div class="container-fluid fruite py-5  ">
    <div class="container">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-12 text-center mb-5">
                  <h1 class="text-primary" style="font-family: unset ; font-weight:300" >
                        {{ trans('frontend.trending_products') }}
                    </h1>
                </div>
            </div>

            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($trending_products->chunk(8) as $chunk)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <div class="row">
                                @foreach ($chunk as $product)
                                    <div class="col-md-3 col-lg-3 mb-3">
                                        <div class=" rounded position-relative vesitable-item"  style="background: #f5f5f5;">
                                            <a href="{{ route('products.details', ['id' => $product->id]) }}"
                                                class="text-decoration-none">

                                                <div class="p-4 pb-2 mb-2 rounded-bottom">
                                                    <div class="text-white rounded position-absolute"
                                                    style="top: 10px; left: 10px;">
                                                    {{-- <button class="btn btn-icon copy-link" data-link="{{ route('products.details', ['id' => $product->id]) }}">
                                                        <i class="fas fa-link product-icon" style="color: #898989"></i>
                                                    </button>
                                         --}}
                                                    {{-- <button class="btn btn-icon share-button"  data-link="{{ route('products.details', ['id' => $product->id]) }}">
                                                        <i class="fas fa-share-alt product-icon"
                                                            style="color:#898989"></i>
                                                    </button>
                                                    <button class="btn btn-icon add-to-cart"  data-id="{{ $product->id }}"
                                                        data-title="{{ $product->title }}"
                                                        data-image="{{ $product->image_path }}">
                                                        <i class="fas fa-search-plus product-icon"
                                                            style="color: #898989"></i>
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
                                                </div>
                                                </div>

                                                <div class="vesitable-img">
                                                    <img src="{{ $product->image_path }}"
                                                        class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                @if ($product->is_new == 1)
                                                    <div class="text-white  px-3 py-1 rounded position-absolute"
                                                        style="top: 10px; right: 10px; background:#fa6666">{{ trans('frontend.new') }}
                                                    </div>
                                                @endif
                                              


                                                <div class="p-4 pb-0 rounded-bottom">
                                                    {{-- <h4>Potatoes</h4> --}}
                                                    <p style="color: #000000 ;text-align: center;">{{ $product->title }}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        {{-- <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                                        <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a> --}}
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="carousel-indicators " style="bottom: -30px;">
                    @foreach ($trending_products->chunk(8) as $index => $chunk)
                        <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="{{ $index }}"
                            class="@if ($loop->first) active @endif" aria-current="true"
                            aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
            </div>

        </div>
    </div>


</div>
