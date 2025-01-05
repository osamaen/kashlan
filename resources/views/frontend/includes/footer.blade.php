<style>

.input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
    margin-left: -1px;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}


.input-group.input-group-dynamic .form-control1:not(:first-child), .input-group.input-group-static .form-control1:not(:first-child) {
    border-left: 0;
    padding-left: 0;
}




.input-group.input-group-dynamic .form-control1, .input-group.input-group-dynamic .form-control1:focus, .input-group.input-group-static .form-control1, .input-group.input-group-static .form-control1:focus {
    background-image: linear-gradient(0deg, #e91e63 2px, rgba(156, 39, 176, 0) 0), linear-gradient(0deg, #d2d2d2 1px, hsla(0, 0%, 82%, 0) 0);
    border-radius: 0 !important;
}


.input-group.input-group-dynamic .form-control1, .input-group.input-group-static .form-control1 {
    background: no-repeat bottom, 50% calc(100% - 1px);
    background-size: 0 100%, 100% 100%;
    transition: .2s ease;
}

.input-group.input-group-dynamic .form-control1, .input-group.input-group-dynamic .form-control1:focus, .input-group.input-group-static .form-control, .input-group.input-group-static .form-control1:focus {
    background-image: linear-gradient(0deg, #e91e63 2px, rgba(156, 39, 176, 0) 0), linear-gradient(0deg, #d2d2d2 1px, hsla(0, 0%, 82%, 0) 0);
    border-radius: 0 !important;
}

.input-group>.form-control1, .input-group>.form-select {
    position: relative;
    flex: 1 1 auto;
    width: 1%;
    min-width: 0;
}


.form-control1 {
    display: block;
    width: 100%;
    padding: .5rem 0;
    font-size: .875rem;
    font-weight: 400;
    line-height: 1.4rem;
    color: white;
    background-color: transparent;
    background-clip: padding-box;
    border: 1px solid #d2d6da;
    appearance: none;
    border-radius: .375rem;
    transition: .2s ease;
}


.form-control1 {
    border: none;
}

.input-group .form-label {
    position: absolute;
    top: .6125rem;
    margin-left: 0;
    transition: all .2s ease;
}

.form-label, label {
    font-size: .875rem;
    font-weight: 400;
    margin-bottom: .5rem;
    color: white;
    margin-left: .25rem;
}
.input-group.input-group-dynamic .form-control1, .input-group.input-group-dynamic .form-control1:focus, .input-group.input-group-static .form-control1, .input-group.input-group-static .form-control1:focus {
    background-image: linear-gradient(0deg, #cfad53 2px, rgba(156, 39, 176, 0) 0), linear-gradient(0deg, #d2d2d2 1px, hsla(0, 0%, 82%, 0) 0);
    border-radius: 0 !important;
}

:focus-visible {
    outline: -webkit-focus-ring-color auto 0px !important;

}


.input-group.input-group-dynamic .form-control1:focus, .input-group.input-group-static .form-control1:focus {
    background-size: 100% 100%, 100% 100%;
}

.input-group.input-group-dynamic.is-focused .form-label, .input-group.input-group-static.is-focused .form-label {
    top: -.7rem;
}

.input-group.input-group-dynamic.is-filled .form-label, .input-group.input-group-dynamic.is-focused .form-label, .input-group.input-group-static.is-filled .form-label, .input-group.input-group-static.is-focused .form-label {
    font-size: .6875rem !important;
}

.input-group.input-group-dynamic.is-focused label, .input-group.input-group-static.is-focused label {
    color: #cfad53;
}
</style>





<div class="container-fluid text-white-50 footer pt-5 mt-5" style="background: #454648">
    <div class="container py-5">
        
        <div class="row g-5">
            <div class="col-lg-4 col-md-6 ">
                <div class="footer-item">
                    <h4 class="text-light mb-3">
                        <img alt="Logo" src="{{asset('logo-2.png')}}" class="h-50px logo" />
                    </h4>

                    <p class="mb-4">
                        typesetting, remaining essentially unchanged. It was
                        popung of 

                        
                    </p>
                        <div class="d-flex justify-content-start pt-3 border-top-1" style="    border-top: 1px #9E9E9E solid;">
                            {{-- <a class="btn   me-2 btn-md-square " href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn  me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn  me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn  btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                       
                        --}}

                            @foreach ($socials as $social)
                            <a class="btn   me-2 btn-md-square " target="_blank" href="{{$social->link}}" style="color:white">{!! $social->icon !!}</a>
                            @endforeach
                       
                        </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer-item">
                    <h3 class="text-light mb-5">{{trans('frontend.contacts')}}</h3>
                    <p> <i class="fas fa-map-marker-alt mx-2 text-white"></i>{{$contacts->address}}</p>
                    <p><i class="fa fa-phone-alt  mx-2 text-white" ></i>{{$contacts->phone}}</p>
                    <p><i class="fas fa-envelope mx-2 text-white" ></i>{{$contacts->email}}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h3 class="text-light mb-3">{{trans('frontend.newsletter')}}</h3>
                    <p class="mb-4">
                        {{trans('news_letters.text')}}
                        </p>

                        <div id="newform_msg"></div>
                        <form id="newsletterForm" action="{{ route('send_news_letter') }}" method="POST" onsubmit="newsletter(this, event)">
                            @csrf
                            <div class="form">
                                {{-- <div class="input-wrapper">
                                    <input class="form-control" name="email" type="email" placeholder="@lang('frontend.your_email')" id="emailInput">
                                </div> --}}
                                <!-- زر الإرسال مخفي -->
                                <button type="submit" style="display: none;">Submit</button>
                            </div>
                            <small id="msg_email" class="text-error"></small>



                            <div class="input-group input-group-dynamic mb-4">
                                <label class="form-label">@lang('frontend.your_email')</label>
                                <input type="text" class="form-control1" onfocus="focused(this)" onfocusout="defocused(this)">
                                </div>
                        </form>
                        


                </div>
            </div>
       
        </div>
    </div>
</div>