@extends('layouts.frontend.app')
@section('content')
    <div class="container-fluid page-header py-5">
    
    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
         

            <div class="row g-4">
                <div class="col-lg-12">
            
            
                        <div class="col-lg-12">
                          
                            <div class="row g-4 ">

                                @foreach ($news as $new)
                                    {{-- <a class="col-md-6 col-lg-6 col-xl-4"
                                        href="{{ route('news.details', $brand->id) }}">
                                        <div>
                                            <div class="rounded position-relative ">
                                                <div class="fruite-img">
                                                    <img src="{{ $brand->image_path }}"
                                                        class="img-fluid w-100 rounded-top" alt="">
                                                </div>

                                                <div class="p-4 ">

                                                </div>
                                            </div>
                                        </div>
                                    </a> --}}

                                    <div class="col-md-6 col-lg-4">
                                        <a href="{{ route('news.details', $new->id) }}">
                                            <div class="service-item   border ">
                                                <img src="{{ $new->image_path }}" class="img-fluid  w-100" alt="">
                                                <div class="px-4 news-title">
                                                    <div class="service-content text-center p-4 rounded">
                                                        <h6 class="paragraph" >{{ $new->title }}</h6>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
@endsection
