<style>

    .container-fluid .row {
            --bs-gutter-x: 1.5rem;
        }
    
        .container-fluid .img-fluid {
            object-fit: cover;
            height: 100%;
        }
    
        .container-fluid .h-100 {
            height: 100%;
        }
    
        .container-fluid .w-100 {
            width: 100%;
        }
    
        
        
        
        
        
        
        /*.custom-carousel-control {*/
        /*    position: absolute;*/
        /*    top: 50%;*/
        /*    transform: translateY(-50%);*/
        /*    width: 50px;*/
        /*    height: 50px;*/
        /*    background: white;*/
        /*    opacity: 1;*/
        /*}*/
        /*.carousel-control-prev{*/
            /*left: -60px;*/
            /* Adjust this value as needed to keep the button within the container */
        /*}*/
        /*.carousel-control-next{*/
            /*right: -60px; */
            
            /* Adjust this value as needed to keep the button within the container */
        /*}*/
        
        
        
        
        
        .brand-portfolio-prev, .brand-portfolio-next {
            position: absolute !important;
            top: 50% !important; 
            transform: translateY(-50%) !important;
            width: 50px !important;
            height: 50px !important;
            background: white !important;
            opacity: 1 !important;
            z-index: 10 !important; /* تأكد من أن الأزرار فوق العناصر الأخرى */
        }
    
        .brand-portfolio-prev {
            left: -60px !important; /* قيم سلبية لتحريك الزر إلى الخارج */
        }
    
        .brand-portfolio-next {
            right: -60px !important; /* قيم سلبية لتحريك الزر إلى الخارج */
        }
        
        
        
        
    </style>
    
    
    
    
    
    <div class="container-fluid fruite py-5  " style=" highet:500px   ;background-color: #f6f6f6">
        <div class="container">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-12 text-center mb-5">
                        <h1 class="text-primary" style="font-family: unset ; font-weight:300;color:black !important" >
                            {{ trans('frontend.brand_portfolio') }}</h1>
                    </div>
    
                </div>
                <div id="portfolioId" class="carousel slide position-relative" data-bs-ride="carousel">
    
                    <div style="height: 100% !important ;width:100%" class="carousel-inner" role="listbox">
                        
                                 @foreach ($portfolios as $portfolio)
              <div class="carousel-item @if ($loop->first) active @endif">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex flex-column gap-4">
                                    <div class="d-flex flex-row gap-4" style="flex: 1;">
                                        <div class="d-flex flex-column gap-4" style="flex: 1;">
                                            <img src="{{ asset($uploads_folder . '/' .  'portfolios' . '/' . $portfolio->image3) }}" class="rounded img-fluid" alt="">
                                            <img src="{{ asset($uploads_folder . '/' .  'portfolios' . '/' . $portfolio->image4) }}" class="rounded img-fluid" alt="">
                                        </div>
                                        <div style="flex: 1;">
                                                <img src="{{ asset($uploads_folder . '/' .  'portfolios' . '/' . $portfolio->image2) }}" class="rounded img-fluid w-100" alt="">
                                        </div>
                                    </div>
                                    <div>
                                        <img src="{{ asset($uploads_folder . '/' .  'portfolios' . '/' . $portfolio->image5) }}" class="rounded img-fluid h-100" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <img src="{{ asset($uploads_folder . '/' .  'portfolios' . '/' . $portfolio->image1) }}" class="img-fluid rounded w-100 h-100" alt="">
                            </div>
                        </div>
                   </div>
                @endforeach
                <button style="opacity:1;background: white;"  class="carousel-control-prev brand-portfolio-prev portfolio" type="button" data-bs-target="#portfolioId" data-bs-slide="prev">
                    <i class="fas fa-chevron-left" style="color: black"></i>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button style="opacity:1;background:white;"  class="carousel-control-next    brand-portfolio-next" type="button" data-bs-target="#portfolioId" data-bs-slide="next">
                        <i class="fas fa-chevron-right" style="color: black"></i>
                        <span class="visually-hidden">Next</span>
                </button>
            </div>
    
        </div></div>
    
    </div>
    </div>
    
    
    </div>
    