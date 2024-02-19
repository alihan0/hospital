@extends('install.master')

@section('content')
<p>{{ __('install.detail', ['name' => env('APP_NAME')]) }}</p>
<p>{{ __('install.detail2') }}</p>

<div class="row justify-content-center"> <!-- Rowu ortalamak için 'justify-content-center' sınıfını ekledik -->
    <div class="text-center col-md-4">
        <div class="card mt-4 maintenance-box">
            <div class="card-body">
                <i class="far fa-play-circle" style="font-size:55px"></i>                                            
                <h6 class="text-uppercase mt-3">{{ __('install.complted_title') }}<h6>
                <p class="text-muted mt-3">{{ __('install.completed_details') }}</p>
                <a href="/install/step-1" class="btn btn-primary">{{ __('install.start_btn') }} <i class="far fa-play-circle"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection