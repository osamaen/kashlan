<div class="container-fluid fruite py-5" >
    <div class="container">
        <div class="text-center">
            <div class="row g-4">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="text-primary" style="font-family: unset ; font-weight:300" >
                        {{trans('frontend.latest_news')}}
                    </h1>
                </div>
            </div>

            <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($news->chunk(3) as $chunk)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <div class="row g-4 justify-content-center" >
                                @foreach ($chunk as $new)
                                <div class="col-md-6 col-lg-4">
                                    <a href="{{ route('news.details', ['id' => $new->id]) }}" class="text-decoration-none">
                                        <div class="news-item rounded  overflow-hidden">
                                            <div class="vesitable-img">
                                            <img src="{{ $new->image_path }}" class="img-fluid news-img rounded-top w-100" alt="">
                                        </div>
                                            <div class="px-4 rounded-bottom">
                                                <div class="text-center rounded py-4">
                                                    {!! $new->description !!}
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
                <div class="carousel-indicators" style="bottom: -60px;">
                    @foreach ($news->chunk(3) as $index => $chunk)
                        <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="{{ $index }}"
                            class="@if ($loop->first) active @endif" aria-current="true"
                            aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
            </div>

        </div>
    </div>


</div>
