@extends('admin.pages.form')

@section('form-inputs')
    <div class="alert alert-info">
        <div class="row">
            <div class="col-6">
                <p>- {{ trans('admin.img_allow_note.type', ['[jpg, jpeg, png]']) }}</p>
                <p>- الصورة الاولى : {{ trans('admin.img_allow_note.min_w', [$image_width1]) }} -
                    {{ trans('admin.img_allow_note.ratio', ['[' . $image_ratio1 . ']']) }}</p>
                <p>- الصورة الثانية : {{ trans('admin.img_allow_note.min_w', [$image_width2]) }} -
                    {{ trans('admin.img_allow_note.ratio', ['[' . $image_ratio2 . ']']) }}</p>
                <p>- الصورة الثالثة : {{ trans('admin.img_allow_note.min_w', [$image_width3]) }} -
                    {{ trans('admin.img_allow_note.ratio', ['[' . $image_ratio3 . ']']) }}</p>
                <p>- الصورة الرابعة : {{ trans('admin.img_allow_note.min_w', [$image_width4]) }} -
                    {{ trans('admin.img_allow_note.ratio', ['[' . $image_ratio4 . ']']) }}</p>
                <p>- الصورة الخامسة : {{ trans('admin.img_allow_note.min_w', [$image_width5]) }} -
                    {{ trans('admin.img_allow_note.ratio', ['[' . $image_ratio5 . ']']) }}</p>

            </div>
            <div class="col-6">
                <img width="400" height="300" src="{{ asset('portfolio.jpg') }}">
            </div>

        </div>
    </div>
    {{-- <div class="d-flex overflow-auto h-200px mb-3">
            <img   src="{{asset('portfolio.jpg')}}">
    </div> --}}

    <div class="tab-content" id="myTabContent">

        <div class="row">
            <div class="image-box m-2">
                <div class="row">
                    <label for="image1" class="col-form-label col-lg-2 text-left">@lang('admin.image1'):</label>
                    <div class="col-10">
                        <input type="file" class="form-control" name="image1" id="image1"
                            onchange="initGrop1(1, '{{ $image_width1 }}','{{ $image_height1 }}', event);" />
                        @error('image1')
                            <p class="invalid-feedback text-danger text-right rtl" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                        <p class="text-danger" id="error1"></p>
                    </div>
                </div>

                <div class="row" id="image_div1">
                    <div class="col-lg-8" id="interface1">
                        @if (isset($item) && !empty($item->image1))
                            {{-- <button type="button" class="btn btn-danger btn-flat confirm btn-icon delimg"
                                data-toggle="tooltip" data-original-title="@lang('admin.delete_image')" data-placement="top"
                                onclick="deleteItem('{{ route($module_name . '.delete_image', $item->id) }}')">
                                <i class="fa fa-trash"></i></button> --}}
                            <img id="preview1" src="{{ asset($uploads_folder . '/' . $module_name . '/' . $item->image1) }}"
                                class="img-thumbnail" style="    width: 300px;" />
                        @else
                            <img id="preview1" style="    width: 300px;">
                        @endif
                    </div>
                </div>
            </div>

            <div class="image-box m-2">
                <div class="row">
                    <label for="image2" class="col-form-label col-lg-2 text-left">@lang('admin.image2'):</label>
                    <div class="col-10">
                        <input type="file" class="form-control" name="image2" id="image2"
                            onchange="initGrop1(2, '{{ $image_width2 }}','{{ $image_height2 }}', event);" />
                        @error('image2')
                            <p class="invalid-feedback text-danger text-right rtl" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                        <p class="text-danger" id="error2"></p>
                    </div>
                </div>

                <div class="row" id="image_div2">
                    <div class="col-lg-8" id="interface2">

                        @if (isset($item) && !empty($item->image2))
                            {{-- <button type="button" class="btn btn-danger btn-flat confirm btn-icon delimg"
                                data-toggle="tooltip" data-original-title="@lang('admin.delete_image')" data-placement="top"
                                onclick="deleteItem('{{ route($module_name . '.delete_image', $item->id) }}')">
                                <i class="fa fa-trash"></i></button> --}}
                            <img id="preview2" src="{{ asset($uploads_folder . '/' . $module_name . '/' . $item->image2) }}"
                                class="img-thumbnail" style="    width: 300px;" />
                        @else
                            <img id="preview2" style="    width: 300px;">
                        @endif

                    </div>
                </div>
            </div>

            <div class="image-box m-2">
                <div class="row">
                    <label for="image3" class="col-form-label col-lg-2 text-left">@lang('admin.image3'):</label>
                    <div class="col-10">
                        <input type="file" class="form-control" name="image3" id="image3"
                            onchange="initGrop1(3, '{{ $image_width3 }}','{{ $image_height3 }}', event);" />
                        @error('image3')
                            <p class="invalid-feedback text-danger text-right rtl" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                        <p class="text-danger" id="error3"></p>
                    </div>
                </div>

                <div class="row" id="image_div3">
                    <div class="col-lg-8" id="interface3">
                        @if (isset($item) && !empty($item->image3))
                            {{-- <button type="button" class="btn btn-danger btn-flat confirm btn-icon delimg"
                                data-toggle="tooltip" data-original-title="@lang('admin.delete_image')" data-placement="top"
                                onclick="deleteItem('{{ route($module_name . '.delete_image', $item->id) }}')">
                                <i class="fa fa-trash"></i></button> --}}
                            <img id="preview3" src="{{ asset($uploads_folder . '/' . $module_name . '/' . $item->image3) }}"
                                class="img-thumbnail" style="    width: 300px;" />
                        @else
                            <img id="preview3" style="    width: 300px;">
                        @endif
                    </div>
                </div>
            </div>

            <div class="image-box m-2">
                <div class="row">
                    <label for="image4" class="col-form-label col-lg-2 text-left">@lang('admin.image4'):</label>
                    <div class="col-10">
                        <input type="file" class="form-control" name="image4" id="image4"
                            onchange="initGrop1(4, '{{ $image_width4 }}','{{ $image_height4 }}', event);" />
                        @error('image4')
                            <p class="invalid-feedback text-danger text-right rtl" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                        <p class="text-danger" id="error4"></p>
                    </div>
                </div>

                <div class="row " id="image_div4">
                    <div class="col-lg-8" id="interface4">

                        @if (isset($item) && !empty($item->image4))
                            {{-- <button type="button" class="btn btn-danger btn-flat confirm btn-icon delimg"
                                data-toggle="tooltip" data-original-title="@lang('admin.delete_image')" data-placement="top"
                                onclick="deleteItem('{{ route($module_name . '.delete_image', $item->id) }}')">
                                <i class="fa fa-trash"></i></button> --}}
                            <img id="preview4" src="{{ asset($uploads_folder . '/' . $module_name . '/' . $item->image4) }}"
                                class="img-thumbnail" style="    width: 300px;" />
                        @else
                            <img id="preview4" style="    width: 300px;">
                        @endif



                    </div>
                </div>
            </div>

            <div class="image-box">
                <div class="row">
                    <label for="image5" class="col-form-label col-lg-2 text-left">@lang('admin.image5'):</label>
                    <div class="col-10">
                        <input type="file" class="form-control" name="image5" id="image5"
                            onchange="initGrop1(5, '{{ $image_width5 }}','{{ $image_height5 }}', event);" />
                        @error('image5')
                            <p class="invalid-feedback text-danger text-right rtl" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                        <p class="text-danger" id="error5"></p>
                    </div>
                </div>

                <div class="row" id="image_div5">
                    <div class="col-lg-8" id="interface5">

                        @if (isset($item) && !empty($item->image5))
                            {{-- <button type="button" class="btn btn-danger btn-flat confirm btn-icon delimg"
                                data-toggle="tooltip" data-original-title="@lang('admin.delete_image')" data-placement="top"
                                onclick="deleteItem('{{ route($module_name . '.delete_image', $item->id) }}')">
                                <i class="fa fa-trash"></i></button> --}}
                            <img id="preview5" src="{{ asset($uploads_folder . '/' . $module_name . '/' . $item->image5) }}"
                                class="img-thumbnail" style="    width: 200px;" />
                        @else
                            <img id="preview5" style="    width: 300px;">
                        @endif


                    </div>
                </div>
            </div>
        </div>




        <div class="row" id="image_div1">
            <input type="hidden" id="x1_1" name="x1_1">
            <input type="hidden" id="y1_1" name="y1_1">
            <input type="hidden" id="x2_1" name="x2_1">
            <input type="hidden" id="y2_1" name="y2_1">
            <input type="hidden" id="w1" name="w1">
            <input type="hidden" id="h1" name="h1">

            <input type="hidden" name="image_width1" value="{{ $image_width1 }}">
            <input type="hidden" name="image_height1" value="{{ $image_height1 }}">
            {{-- <div class="col-lg-8" id="interface1">
                <img id="preview1" style="width: inherit;">
            </div> --}}
        </div>
        <!-- Repeat for image2, image3, image4, and image5 with appropriate changes in id and name attributes -->

        <div class="row" id="image_div2">
            <input type="hidden" id="x1_2" name="x1_2">
            <input type="hidden" id="y1_2" name="y1_2">
            <input type="hidden" id="x2_2" name="x2_2">
            <input type="hidden" id="y2_2" name="y2_2">
            <input type="hidden" id="w2" name="w2">
            <input type="hidden" id="h2" name="h2">
            {{-- <div class="col-lg-8" id="interface2">
                <img id="preview2" style="width: inherit;">
            </div> --}}
            <input type="hidden" name="image_width2" value="{{ $image_width2 }}">
            <input type="hidden" name="image_height2" value="{{ $image_height2 }}">
        </div>
        <!-- Repeat for image2, image3, image4, and image5 with appropriate changes in id and name attributes -->

        <div class="row" id="image_div3">
            <input type="hidden" id="x1_3" name="x1_3">
            <input type="hidden" id="y1_3" name="y1_3">
            <input type="hidden" id="x2_3" name="x2_3">
            <input type="hidden" id="y2_3" name="y2_3">
            <input type="hidden" id="w3" name="w3">
            <input type="hidden" id="h3" name="h3">
            <input type="hidden" name="image_width3" value="{{ $image_width3 }}">
            <input type="hidden" name="image_height3" value="{{ $image_height3 }}">
        </div>
        <!-- Repeat for image2, image3, image4, and image5 with appropriate changes in id and name attributes -->

        <div class="row" id="image_div4">
            <input type="hidden" id="x1_4" name="x1_4">
            <input type="hidden" id="y1_4" name="y1_4">
            <input type="hidden" id="x2_4" name="x2_4">
            <input type="hidden" id="y2_4" name="y2_4">
            <input type="hidden" id="w4" name="w4">
            <input type="hidden" id="h4" name="h4">
            <input type="hidden" name="image_width4" value="{{ $image_width4 }}">
            <input type="hidden" name="image_height4" value="{{ $image_height4 }}">
        </div>
        <!-- Repeat for image2, image3, image4, and image5 with appropriate changes in id and name attributes -->

        <div class="row" id="image_div5">
            <input type="hidden" id="x1_5" name="x1_5">
            <input type="hidden" id="y1_5" name="y1_5">
            <input type="hidden" id="x2_5" name="x2_5">
            <input type="hidden" id="y2_5" name="y2_5">
            <input type="hidden" id="w5" name="w5">
            <input type="hidden" id="h5" name="h5">
            <input type="hidden" name="image_width5" value="{{ $image_width5 }}">
            <input type="hidden" name="image_height5" value="{{ $image_height5 }}">
        </div>

    </div>
    </div>
@endsection
