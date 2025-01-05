
<div class="image-box">
    <div class="row">
    <label for="image" class="col-form-label col-lg-2 text-left">@lang('admin.image')
        :</label>
    <div class="col-10">
        <input type="file"  class="form-control " name="image" id="image" onchange="initGrop('{{$image_width}}','{{$image_height}}' ,event);" />
        @error('image')
        <p class="invalid-feedback text-danger text-right rtl" role="alert">
            {{ $message }}
        </p>
        @enderror
        <p class="text-danger" id="error"></p>
    </div>
</div>

</div>


 {{-- <div class="d-flex flex-column mb-8">
        <label class="fs-6 fw-bold mb-2">{{ __('messages.image') }}</label>
        <input class="form-control " type="file" name="image" accept=".png, .jpg, .jpeg">
    </div> --}}


<div class="row"  id="image_div">
    <input type="hidden" id="x1" name="x1">
    <input type="hidden" id="y1" name="y1">
    <input type="hidden" id="x2" name="x2">
    <input type="hidden" id="y2" name="y2">
    <input type="hidden" id="filesize" name="filesize">
    <input type="hidden" id="filetype" name="filetype">
    <input type="hidden" id="filedim" name="filedim">
    <input type="hidden" id="h" name="h">
    <input type="hidden" id="w" name="w">
    <label for="image_file" class="col-lg-2 col-form-label"> </label>
    <div class="col-lg-8" id="interface">
        @if(isset($item) && !empty($item->image))
        <button type="button" class="btn btn-danger btn-flat confirm btn-icon delimg" data-toggle="tooltip" data-original-title="@lang('admin.delete_image')" data-placement="top" onclick="deleteItem('{{route($module_name.'.delete_image',$item->id)}}')">
            <i class="fa fa-trash"></i></button>
        <img id="preview" src="{{asset($uploads_folder.'/'.$module_name.'/'.$item->image)}}" class="img-thumbnail" style="width: -webkit-fill-available;"/>
        @else
        <img id="preview" style="    width: inherit;">
        @endif
    </div>
</div>
</div>