@extends('layouts.frontend.app')
@section('content')
    <div class="container-fluid  py-5" style="height:700px; background-image:url('')"> 
    
    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
          

            <div class="row g-4">
                <div class="col-lg-12">
            

                            <div class="row g-4 ">

                                @foreach ($brands as $brand)
                                    <a class="col-md-6 col-lg-6 col-xl-3"
                                        href="{{ route('brands.details', $brand->id) }}">
                                        <div>
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{ $brand->image_path }}"
                                                        class="img-fluid w-100 rounded-top" alt="">
                                                </div>

                      
                                            </div>
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
@endsection
