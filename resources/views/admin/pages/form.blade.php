@extends('layouts.admin.app')
@section('content')
    <div class="card-body py-3">
        @if (Schema::hasColumn($module_name, 'image'))
            <div class="alert alert-info">
                <p>- {{ trans('admin.img_allow_note.type', ['[jpg, jpeg, png]']) }}</p>
                <p>- {{ trans('admin.img_allow_note.ratio', ['[' . $image_ratio . ']']) }}</p>
                <p>- {{ trans('admin.img_allow_note.min_w', [$image_width]) }}</p>
            </div>
        @endif
        <form class="form-horizontal form" role="form"
            action="{{ isset($item) ? route($module_name . '.update', $item->id) : route($module_name . '.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($item))
                @method('PUT')
            @endif

            @yield('form-inputs')

            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fa fa-save"></i> {{ trans('admin.save') }}</button>
                </div>
            </div>
        </form>
        <div>

        </div>

    </div>

    </div>

    </div>

    </div>
@endsection

@push('js')
@endpush
