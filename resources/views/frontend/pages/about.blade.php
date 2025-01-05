@extends('layouts.frontend.app')
@section('content')


        <div class="container-fluid page-header py-5 " style="height:500px; background-image:url('{{ $item->image_path }}')" >
      
        </div>
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">{{$item->title}}</h1>
                <h6 style="overflow-wrap: anywhere;">
                                    
                    {!! $item->description !!}
                </h6>
            </div>
        </div>
        <!-- Checkout Page End -->
        @include($frontend_includes_folder . '.banner_photo')
        @include($frontend_includes_folder . '.our_brands')

@endsection