@extends('layouts.frontend.app')
@section('content')
<div class="container-fluid page-header py-5" style="height:700px; background-image:url('{{ $bunner_photo }}')">
    
</div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5 ">
        <div class="container py-5">
         

            <div class="row g-4">
                <div class="col-lg-12">
            
            
                        <div class="col-lg-12">
                          
                            <div class="row g-4">
                                <div class="col-lg-4">
                                    <div class=" ">
                                        <a href="#">
                                            <img src="{{ $item->image_path}}" class="img-fluid rounded" alt="Image">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <h4 class="fw-bold mb-3" style="color: #cfad53;">{{ $item->title}}</h4>
                                    <p class="mb-3">{{ $item->short_description}}</p>
                           
                                    <p class="mb-4 " >{!! $item->description !!}</p>

                                
                                </div>
                               
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
@endsection
