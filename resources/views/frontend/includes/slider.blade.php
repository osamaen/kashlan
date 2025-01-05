                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">

                    <div style="height: 100% !important ;width:100%" class="carousel-inner" role="listbox">
                        @foreach ($sliders as $key => $slider)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }} rounded">
                                <img src="{{ $slider->image_path }}" class="img-fluid w-100 h-100 bg-secondary rounded"
                                    alt="">
                                

                                    {{-- <div class="carousel-caption d-flex align-items-center justify-content-center h-100 w-50" style="left: 0;">
                                        <a href="{{ route('sliders.details', $slider->id) }}" class="w-100">
                                            <div class="home-description  p-3 rounded">
                                                <span class="home-title">{{ $slider->title }}</span>
                                                <div class="home-desc">
                                                    {!! $slider->short_description !!}
                                                </div>
                                            </div>
                                        </a>
                                    </div> --}}


                            </div>
                        @endforeach
                        
                        <div class="social-bar">
                            <div class="social-icons">
                                @foreach ($socials as $social)
                                <a target="_blank" href="{{$social->link}}">{!! $social->icon !!}</a>
                                @endforeach
                                <!-- يمكنك إضافة المزيد من الأيقونات حسب الحاجة -->
                            </div>
                            <div class="follow-us">
                                <h6>FOLLOW US</h6>
                            </div>
                        </div>
                    </div>

                    <button
                        style="    opacity: 1;
                                background: white;
                            }"
                        class="carousel-control-prev slider-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <i class="fas fa-chevron-left" style="color: black"></i>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button style="    opacity: 1;
                    background: white;
                            }"
                        class="carousel-control-next slider-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <i class="fas fa-chevron-right" style="color: black"></i>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
