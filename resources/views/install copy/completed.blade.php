@extends('install.master')

@section('content')
<p>{{ __('install.detail', ['name' => env('APP_NAME')]) }}</p>
<p>{{ __('install.detail2') }}</p>

<div class="row justify-content-center"> <!-- Rowu ortalamak için 'justify-content-center' sınıfını ekledik -->
    <div class="text-center col-md-4">
        <div class="card mt-4 maintenance-box">
            <div class="card-body">
                <i class="fas fa-check-circle text-success" style="font-size:55px"></i>                                            
                <h6 class="text-uppercase mt-3">{{ __('install.completed_title') }}<h6>
                <a href="/install/complete" class="btn btn-primary">{{ __('install.use_btn') }} <i class="far fa-play-circle"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection