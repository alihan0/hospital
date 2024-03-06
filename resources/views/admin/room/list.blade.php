@extends('admin.master')

@section('title')
    {{ __('common.title.rooms') }} - {{ env('APP_NAME') }}
@endsection

@section('style')
    <style>
        .pricing-box{
            cursor:pointer;
        }
        .pricing-box:hover{
            background-color: #f8f9fa;
        }
    </style>
@endsection

@section('content')
<!-- start page title -->
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-8">
            <h6 class="page-title">{{ __('common.title.rooms') }}</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/admin/"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="/admin/rooms">{{ __('common.title.rooms') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('common.title.list') }}</li>
            </ol>
        </div>
        
        <div class="col-4 d-flex justify-content-end">
            <div class="float-end align-self-center">        
                <button onclick="window.location.assign('/admin/rooms/new')" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('common.button.new') }} {{ __('common.title.room') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

@php
    $roomsByFloor = $rooms->groupBy('floor');
@endphp

@foreach ($roomsByFloor as $floor => $roomsOnFloor)

<div class="row bg-light p-4 mb-4 pt-4">
    <h3 class="fw-bold border-bottom pb-3 mb-4">{{ __('common.title.floor') }}: {{ $floor }}</h3>
    @foreach ($roomsOnFloor as $room)
    
    <div class="col-xl-3 col-md-6">
        <div class="card pricing-box" onclick="window.location.assign('/admin/rooms/detail/{{ $room->id }}')">
            <div class="card-body p-4">
                <div class="d-flex mt-2">
                    <div class="flex-shrink-0 align-self-center">
                        <i class="fas fa-bed fs-1"></i>
                    </div>                                            
                    <div class="flex-grow-1 ms-auto text-end">
                        <h4>{{ __('common.title.room') }}: {{ $room->room_no }}</h4>
                        <p class="text-muted mb-0">{{ __('common.title.beds') }}: {{ $room->Beds->count() }}</p>
                    </div>
                </div>
                <div class="pricing-features mt-5 pt-2 d-flex justify-content-between">
                    <div class="border border-2 border-warning p-4 text-center w-50 m-2">
                        <i class="fas fa-male fs-2 text-warning"></i>
                    </div>
                    <div class="border p-4 text-center w-50 m-2">
                        <i class="fas fa-male"></i>
                    </div>
                    <div class="border p-4 text-center w-50 m-2">
                        <i class="fas fa-male"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endforeach


@endsection