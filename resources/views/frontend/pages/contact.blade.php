@extends('layouts.frontend.app')
@section('content')
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded">
                <div class="row g-4">
                    <div class="col-12">

                    </div>
                    <div class="col-lg-12">
                        <div class="h-100 rounded">
                            {!! $contacts->map !!}
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <form name="contact-form" id="contactForm" action="{{ route('send_email') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control border-0 py-3 mb-4"
                                        placeholder="{{ trans('frontend.Your_Name') }}">
                                    @if ($errors->has('first_name'))
                                        <p class="text-danger">{{ $errors->first('first_name') }}</p>
                                    @endif
                                </div>

                                <div class="col-6">
                                    <input type="text" class="form-control border-0 py-3 mb-4"
                                        placeholder="{{ trans('frontend.Your_Name') }}">
                                    @if ($errors->has('last_name'))
                                        <p class="text-danger">{{ $errors->first('last_name') }}</p>
                                    @endif
                                </div>
                            </div>
                            <input type="email" class="w-100 form-control border-0 py-3 mb-4"
                                placeholder="{{ trans('frontend.Your_Email') }}">
                            @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                            <input type="phone" class="w-100 form-control border-0 py-3 mb-4"
                                placeholder="{{ trans('frontend.phone') }}">
                            <input type="subject" class="w-100 form-control border-0 py-3 mb-4"
                                placeholder="{{ trans('frontend.subject') }}">
                            <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="{{ trans('frontend.message') }}"></textarea>


                         
                                <div class="row mb-4">
                                    <div class="col-3">
                                        <img src="{{ url('captcha') }}" alt="captcha">
                                    </div>
                                    <div class="col-9">
                                        <input type="text" placeholder="{{ trans('frontend.captcha') }}" class="w-100 form-control py-2" id="captcha" name="captcha">
                                    </div>
                                    @if ($errors->has('captcha'))
                                    <p class="text-danger">{{ $errors->first('captcha') }}</p>
                                @endif

                                </div>

                       

                                <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary "
                                    type="submit">
                                    {{ trans('frontend.submit') }}
                                </button>
                        </form>
                    </div>
                    <div class="col-lg-5">
                        <div class="d-flex p-4 rounded mb-4 bg-white">
                            <i class="fas fa-map-marker-alt fa-2x text-primary me-4" style="margin-left: 1rem"></i>
                            <div>

                                <p class="mb-2"> {{ $contacts->address }}</p>
                            </div>
                        </div>
                        <div class="d-flex p-4 rounded mb-4 bg-white">
                            <i class="fas fa-clock fa-2x text-primary me-4" style="margin-left: 1rem"></i>
                            <div>

                                <p class="mb-2">{{ $contacts->opening }}</p>
                            </div>
                        </div>
                        <div class="d-flex p-4 rounded mb-4 bg-white">
                            <i class="fas fa-envelope fa-2x text-primary me-4" style="margin-left: 1rem"></i>
                            <div>

                                <p class="mb-2">{{ $contacts->email }}</p>
                            </div>
                        </div>
                        <div class="d-flex p-4 rounded bg-white">
                            <i class="fa fa-phone-alt fa-2x text-primary me-4" style="margin-left: 1rem"></i>
                            <div>
                                {{-- <h4>Telephone</h4> --}}
                                <p>Fax: {{ $contacts->fax }}<br>
                                    Phone: {{ $contacts->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
