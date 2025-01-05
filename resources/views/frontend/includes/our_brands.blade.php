<style>


 .carousel-item .more-button {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 15px;
    background: unset;
}  


</style>







<div class="container-fluid  py-5  " style="margin-bottom: 2.5rem !important;"> 
    <div class="container">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="text-primary" style="font-family: unset ; font-weight:300" >
                        {{ trans('frontend.our_brands') }}
                    </h1>
                </div>
            </div>

            <div id="brandsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($brands->chunk(4) as $chunk)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <div class="row">
                            @foreach ($chunk as $brand)
                                <div class="col-md-6 col-lg-6 col-xl-3 mb-5">
                                    
                                    <div class="text-center fruite-item position-relative p-4 border rounded">
                                        <img src="{{ $brand->image_path }}" class="img-fluid rounded mb-2" alt="{{ $brand->name }}">
                                
                                        <a  href="{{ route('brands.details', $brand->id) }}" 
                                            class="btn rounded my-2  text-primary more more-button"  
                                            style=" left: 50%; transform: translateX(-50%);background:#c5c5c5 ; 
                                            color:white !important
                                            ">
                                             المزيد
                                         </a>
                                    </div>
                                    
                                 
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                

                </div>
                <div class="carousel-indicators" style="bottom: -60px;">
                    @foreach ($brands->chunk(4) as $index => $chunk)
                        <button type="button" data-bs-target="#brandsCarousel" data-bs-slide-to="{{ $index }}"
                            class="@if ($loop->first) active @endif" aria-current="true"
                            aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
            </div>

        </div>
    </div>


</div>
