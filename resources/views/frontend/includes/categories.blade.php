<div class="container-fluid fruite py-5  " style="    background-color: #f6f6f6">
    <div class="container">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="text-primary" style="font-family: unset ; font-weight:300">{{ trans('frontend.categories') }}</h1>
                </div>

            </div>

            <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner">
                    @foreach ($main_categories->chunk(6) as $chunk)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <div class="row">
                                @foreach ($chunk as $main_category)
                                <div class="col-md-6 col-lg-4 mb-3">
                                        <a href="{{ route('categories.details', ['id' => $main_category->id]) }}"
                                            class="text-decoration-none">
                                        <div class="p-4 rounded position-relative fruite-item">
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                        <img src="{{ $main_category->image_path }}"
                                                            class="img-fluid rounded" alt="">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-2">{{ $main_category->title }}</h6>
                                                        <div class="d-flex mb-2" style="color: #747d88;">
                                                            @php
                                                                // عدد العناصر الكلي
                                                                $totalSubCats = count($main_category->sub_cats);
                                                            @endphp

                                                            <!-- حلقة Blade لعرض أول ثلاثة عناصر فقط -->
                                                            @foreach ($main_category->sub_cats->take(3) as $index => $sub_cat)
                                                                {{ $sub_cat->title }}
                                                                @if ($index < 2 && $index < $totalSubCats - 1)
                                                                    ,
                                                                    <!-- إضافة فاصلة بين العناصر إذا لم يكن العنصر الأخير -->
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <div class="d-flex mb-2">
                                                            <p class="me-2" style="color:black">{{ trans('frontend.more') }} -></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="carousel-indicators " style="bottom: -30px;">
                    @foreach ($main_categories->chunk(6) as $index => $chunk)
                        <button type="button" data-bs-target="#categoryCarousel" data-bs-slide-to="{{ $index }}"
                            class="@if ($loop->first) active @endif" aria-current="true"
                            aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
            </div>

        </div>
    </div>


</div>
