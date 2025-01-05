<!DOCTYPE html>

@if (app()->getLocale() == 'ar')
    <html lang="ar" dir="rtl">
@else
    <html lang="en">
@endif

<head>
    <meta charset="utf-8">


    @if (app()->getLocale() == 'ar')
        <title>قشلان | {{ $pageTitle }}</title>
    @else
        <title>kashlan | {{ $pageTitle }}</title>
    @endif


    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />

    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />



    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,100,0,0" />





    @if (app()->getLocale() == 'ar')
        <style>
            @media (min-width: 768px) {

                .slider-control-next,
                .slider-control-prev {
                    width: 48px;
                    height: 48px;
                    border-radius: 48px;
                    border: 1px solid var(--bs-white);
                    background: var(--bs-primary);
                    position: absolute;
                    top: 93%;
                    left: 92%;
                    transform: translateY(-50%);
                }
            }


            .text-light,
            p {

                text-align: right
            }
        </style>
    @else
        <style>
            @media (min-width: 768px) {

                .slider-control-next,
                .slider-control-prev {
                    width: 48px;
                    height: 48px;
                    border-radius: 48px;
                    border: 1px solid var(--bs-white);
                    background: var(--bs-primary);
                    position: absolute;
                    top: 93%;
                    right: 92%;
                    transform: translateY(-50%);
                }
            }
        </style>
    @endif
    <style>
        .fruite-item {
            border: 1px solid #bab8b8 !important;
        }

        .fruite .fruite-item:hover {
            box-shadow: 0 0 11px rgb(0 0 0 / 17%);
        }

        .category-title:hover {

            color: var(--bs-primary);
        }

        .swiper-container {
            width: 100%;
            height: 100%;
            margin-top: 20px;
        }

        .swiper-slide {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .item-card {
            width: 30%;
            /* Three items per row in each slide */
            margin: 10px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            text-align: center;
        }

        .item-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        a:hover {
            color: #cfad53;
        }

        .fab:hover {
            color: #cfad53;
        }

        .news-title {
            position: relative;
            overflow: hidden;
        }

        .news-title::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: transparent;
            border-radius: 0;
            /* البداية بدون زاوية منحنية */
            z-index: -1;
            transition: transform 0.5s ease-in-out, border-radius 0.5s ease-in-out;
        }

        .news-title:hover::before {
            animation: backgroundExpand 0.5s ease-in-out forwards;
        }

        @keyframes backgroundExpand {
            0% {
                transform: translateX(100%) translateY(100%);
                background-color: transparent;
                border-radius: 0;
                /* زاوية حادة عند البداية */
            }

            50% {
                background-color: #f3f3f3;
                /* إدخال اللون أثناء الانتقال */
            }

            100% {
                transform: translateX(0) translateY(0);
                background-color: #f3f3f3;
                /* اللون النهائي */
                border-radius: 15px;
                /* زاوية منحنية عند النهاية */
            }
        }

        .navbar .navbar-nav .nav-link {
            font-size: 20px;

        }


        .accordion-button:not(.collapsed) {
            color: #cfad53;
            background-color: unset;

        }

        .accordion-button:focus {
            border-color: #edf0e6 !important;

        }

        .brand-category:hover {
            color: #000000 !important;
        }

        .paragraph {
            color: #7f7f7f;
        }

        .paragraph:hover {
            color: #000000 !important;
        }

        .carousel-item {
            position: relative;
        }

        .social-bar {
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            width: 42px;
            height: fit-content;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px 0 0 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
        }

        .social-icons {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .social-icons a {
            margin: 5px 0;
            color: #333;
            font-size: 18px;
            text-decoration: none;
        }

        .follow-us {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            transform: rotate(180deg);
            font-size: 12px;
            color: #333;
        }



        .btn.border-secondary:hover {
            background: #cfad53 !important;
            color: var(--bs-white) !important;
        }

        .border-secondary {
            border-color: #cfad53 !important;
        }



        .accordion-button {
            display: flex;
            justify-content: space-between;
            /* لضمان توزيع المساحة بين العناصر */
            align-items: center;
            text-align: left;
        }

        .accordion-button::after {
            margin-left: 10px;
            /* إضافة مسافة بين النص والسهم */
            margin-right: 10px;
            /* لضمان أن التباعد يعمل في كلتا اللغتين */
        }

        /* تنسيق محدد للغة العربية */




        .carousel-caption {
            position: absolute;
            top: 0;
            right: 50%;
            height: 100%;
            width: 41%;
            left: 0;
            z-index: 10;
        }

        .home-description {
            /* background: rgba(255, 255, 255, 0.8);  */
            padding: 20px;
            border-radius: 10px;
            height: 100%;
            /* أخذ الارتفاع الكامل */
            overflow: auto;
            /* التمرير عند الحاجة */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .carousel-item {
            position: relative;
        }

        img {
            object-fit: cover;
        }



        .more:hover {
            background: #cfad53 !important;
            color: var(--bs-white) !important;
        }



        .parallax-section {
            position: relative;
            overflow: hidden;
        }

        .parallax-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: translateY(0);
            transition: transform 0.1s linear;
        }



        .social-bar {
            display: none;
            /* إخفاء العنصر بشكل افتراضي */
        }

        @media (min-width: 768px) {
            .social-bar {
                display: flex;
                /* عرض العنصر على الشاشات الكبيرة */
            }
        }

        @media (max-width: 768px) {
            .logo {
                width: 200px
                    /* عرض العنصر على الشاشات الكبيرة */
            }
        }

        .navbar-light .navbar-nav .nav-link {
            color: rgb(0 0 0);
        }

        /* html, body {
    height: 100%;
    margin: 0;
} */
        /*
body {
    display: flex;
    flex-direction: column;
} */

        .container-fluid.contact {
            flex: 1;
        }

        .footer {
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .menu-icon {
            display: inline-block;
        }

        .menu-icon div {
            width: 25px;
            height: 2px;
            background-color: #333;
            margin: 5px 0;
            transition: 0.4s;
        }

        .menu-icon div:last-child {
            width: 15px;
            /* نصف طول الخطين الآخرين */
        }


    </style>

</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3">
                        <span class="material-symbols-outlined">
                            sentiment_satisfied
                            </span>
                        <a href="#" style="color:#000000">{{ $contacts->address }}</a>
                    </small>
                </div>
                <div class="top-link pe-2">
                    <small class="me-3">
                        <i class="fas fa-map-marker-alt me-2 text-white"></i>
                        <a href="#" style="color:#000000">{{ $contacts->address }}</a>
                    </small>
                    <small class="me-3">
                        <i class="fa fa-mobile-alt me-2 text-white">
                        </i>
                        <a href="#" style="color:#000000">{{ $contacts->phone }}</a>
                    </small>

                </div>

            </div>

        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl  mt-5">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <img class="logo" src="{{ asset('l-removebg-preview.png') }}">
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        {{-- <a href="{{ route('home') }}"
                        class="nav-item nav-link {{ request()->route()->named('home') ? 'active' : '' }}">{{ trans('frontend.home') }}</a>
                         --}}
                        @foreach ($menus->where('in_nav', 1) as $menu)
                            <a class="nav-item nav-link me-4 {{ request()->route()->named($menu->name)? 'active': '' }}"
                                href="{{ route($menu->name) }}">
                                {{ $menu->title }}
                            </a>
                        @endforeach


                    </div>
                    <div class="d-flex m-3 me-0">
                        <a href="" style="font-size: xx-large;color:#000000"  class="material-symbols-outlined mx-2">
                            search
                        </a>
                        <a href="" style="font-size: xx-large ;color:#000000" class="material-symbols-outlined mx-3">
                            shopping_cart
                        </a>

                        {{-- <span
                            class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                            id="cart-count" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"></span> --}}
                      
                        {{-- <div class="menu-icon mx-1">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div> --}}
                        <div class="language mx-1" style="font-size:x-large ;width: max-content;">
                            
                            @if (app()->getLocale() == 'ar')
                            
                                <a class="top-item-link lang"
                                    href="{{ LaravelLocalization::getLocalizedURL('en') }}">
                                    <div class="menu-icon mx-1">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    
                                    
                                    
                                    En  
                                 </a>
                            @else
                        
                                <a class="top-item-link lang"
                                    href="{{ LaravelLocalization::getLocalizedURL('ar') }}">
                                    <div class="menu-icon mx-1">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>Ar</a>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Modal Search Start -->

    <!-- Modal Search End -->

    @yield('content')



    @include('frontend.includes.footer')
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>




    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <!-- Template Javascript -->
    {{-- <script src="js/main.js"></script> --}}

    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 1,
                spaceBetween: 10,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                // Optional parameters for navigation and other functionalities
            });

            // Handle tab click to switch slides
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                var target = $(e.target).attr("href");
                var index = $(target).index();
                swiper.slideTo(index);
            });


            AOS.init({
                duration: 1200, // مدة التأثير بالميلي ثانية
            });

            document.addEventListener('scroll', function() {
                var parallaxImage = document.querySelector('.parallax-image');
                var scrollPosition = window.pageYOffset;
                parallaxImage.style.transform = 'translateY(' + scrollPosition * 0.5 + 'px)';
            });


        });




        document.addEventListener('DOMContentLoaded', function() {
            const cartCount = document.getElementById('cart-count');

            // استعادة السلة من التخزين المحلي
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    const productId = this.getAttribute('data-id');
                    const productTitle = this.getAttribute('data-title');
                    const productPrice = this.getAttribute('data-price');
                    const productImage = this.getAttribute('data-image');

                    const product = {
                        id: productId,
                        title: productTitle,
                        price: productPrice,
                        image: productImage,
                        quantity: 1
                    };

                    // تحقق ما إذا كان المنتج موجودًا في السلة
                    const existingProductIndex = cart.findIndex(item => item.id === productId);
                    if (existingProductIndex > -1) {
                        // زيادة الكمية إذا كان المنتج موجودًا بالفعل
                        cart[existingProductIndex].quantity += 1;
                    } else {
                        // إضافة المنتج إذا كان جديدًا
                        cart.push(product);
                    }

                    updateCartCount();
                    saveCartToLocalStorage();
                });
            });

            function updateCartCount() {
                const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
                if (cartCount) {
                    cartCount.textContent = totalItems;
                }
            }

            function saveCartToLocalStorage() {
                localStorage.setItem('cart', JSON.stringify(cart));
            }

            // استعادة حالة السلة عند تحميل الصفحة
            updateCartCount();
        });






        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.copy-link').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const productLink = this.getAttribute('data-link');

                    // إنشاء عنصر مؤقت لنسخ الرابط
                    const tempInput = document.createElement('input');
                    document.body.appendChild(tempInput);
                    tempInput.value = productLink;
                    tempInput.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);

                    // تنبيه المستخدم بنجاح النسخ
                    // alert('تم نسخ الرابط إلى الحافظة');
                });
            });
        });
    </script>
    @stack('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.add-to-cart').on('click', function(e) {
                e.preventDefault();
                var imageUrl = $(this).data('image');
                $.fancybox.open({
                    src: imageUrl,
                    opts: {
                        caption: $(this).data('title'),
                        buttons: [
                            "zoom",
                            "close"
                        ]
                    }
                });
            });
        });
        $('.share-button').on('click', function(e) {
            e.preventDefault();
            var link = $(this).data('link');

            if (navigator.share) {
                navigator.share({
                    title: 'Check out this product',
                    url: link
                }).then(() => {
                    console.log('Thanks for sharing!');
                }).catch(console.error);
            } else {
                // Fallback for browsers that do not support Web Share API
                alert('Web Share API is not supported in your browser.');
            }
        });


        document.getElementById('emailInput').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                newsletter(document.getElementById('newsletterForm'), event);
            }
        });

        function newsletter(form, e) {
            e.preventDefault();
            $('#msg_email').text('');

            var url = $(form).attr('action');
            var data = $(form).serialize();
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                dataType: 'json',
                beforeSend: function() {
                    $(form).find('button[type="submit"]').prop('disabled', true);
                    $('.error_txt').html('');
                },
                success: function(data) {
                    var html = '';
                    if (data.status == 'success') {
                        html = `<p class="alert alert-success form_msg">${data.message}</p>`;
                        form.reset();
                    } else {
                        html = `<p class="alert alert-danger form_msg">${data.message}</p>`;
                    }
                    $('#newform_msg').html(html);

                    setTimeout(function() {
                        $('#newform_msg').html('');
                    }, 3000);
                    $(form).find('button[type="submit"]').prop('disabled', false);
                },
                error: function(res) {
                    $(form).find('button[type="submit"]').prop('disabled', false);
                    if (res.status === 422) {
                        $.each(res.responseJSON.errors, function(key, value) {
                            var nKey = key.replace('.', '_');
                            $('#box_' + nKey).addClass('has-error');
                            $('#msg_' + nKey).html(value);
                        });
                    } else {
                        var html = `<p class="alert alert-danger form_msg">Error</p>`;
                        $('#newform_msg').html(html);
                    }
                }
            });
        }


        function focused(element) {
            element.parentElement.classList.add('is-focused');
        }

        function defocused(element) {
            element.parentElement.classList.remove('is-focused');
        }
    </script>

</body>

</html>
