@extends('layouts.frontend.app')
@section('content')
    <style>
        .carousel-indicators [data-bs-target] {
            background-color: #272727;
        }

        .carousel-indicators .active {
            background-color: #cfad53;
        }


        .carousel-indicators {

            bottom: 1 !important;

        }

        .vesitable-item:hover {
            transition: transform 1s;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

            /* زيادة حجم العنصر */
        }

        .news-img:hover {
            transition: transform 1s;
            transform: scale(1.05);
        }

        .fruite-item p,
        .fruite-item h6.mb-2 {
            transition: color 0.5s ease;
            /* تبطيء تغيير اللون لنصف ثانية */
        }

        .fruite-item:hover p,
        .fruite-item:hover h6.mb-2 {
            color: #cfad53;
            /* تحديد اللون الأحمر عند التحويم */
        }



        .product-icon:hover {
            color: #cfad53 !important;
    
        }
    </style>
    <div class="container-fluid py-3  hero-header">
        <div>
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-12">
                    @include($frontend_includes_folder . '.slider')
                </div>
            </div>
        </div>
    </div>


    @include($frontend_includes_folder . '.categories')

    @include($frontend_includes_folder . '.trending_products')

    @include($frontend_includes_folder . '.banner_photo')

    @include($frontend_includes_folder . '.our_brands')

    @include($frontend_includes_folder . '.brand_portfolio')

    @include($frontend_includes_folder . '.latest_news')
@endsection
