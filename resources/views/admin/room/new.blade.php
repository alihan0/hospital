@extends('admin.master')

@section('title')
    {{ __('common.title.rooms') }} - {{ env('APP_NAME') }}
@endsection

@section('content')
<!-- start page title -->
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-8">
            <h6 class="page-title">{{ __('common.button.new') }} {{ __('common.title.room') }}</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/admin/"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="/admin/rooms">{{ __('common.title.rooms') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('common.title.new') }}</li>
            </ol>
        </div>
        
        <div class="col-4 d-flex justify-content-end">
            <div class="float-end align-self-center">        
                <button onclick="window.location.assign('/admin/rooms')" class="btn btn-primary"><i class="fas fa-list"></i> {{ __('common.button.list') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->


<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="h4 card-title border-bottom pb-3 ">{{ __('common.button.new') }} {{ __('common.title.room') }}</div>

                <form action="javascript:;" onsubmit="createRoom()" id="room">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="floor" class="form-label">{{ __('common.form.floor') }}</label>
                                <input type="text" class="form-control" id="floor" name="floor" aria-describedby="emailHelp">
                              </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="room" class="form-label">{{ __('common.form.room_no') }}</label>
                                <input type="text" class="form-control" id="room" name="room">
                              </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="bathroom" class="form-label">{{ __('common.form.bathroom') }}</label>
                                <select name="bathroom" id="bathroom" class="form-control">
                                    <option value="">{{ __('common.form.select') }}</option>
                                    <option value="1">{{ __('common.form.in_floor') }}</option>
                                    <option value="2">{{ __('common.form.in_room') }}</option>
                                    <option value="3">{{ __('common.form.in_institution') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="toilet" class="form-label">{{ __('common.form.toilet') }}</label>
                                <select name="toilet" id="toilet" class="form-control">
                                    <option value="">{{ __('common.form.select') }}</option>
                                    <option value="1">{{ __('common.form.in_floor') }}</option>
                                    <option value="2">{{ __('common.form.in_room') }}</option>
                                    <option value="3">{{ __('common.form.in_institution') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="window" class="form-label">{{ __('common.form.window') }}</label>
                                <select name="window" id="window" class="form-control">
                                    <option value="">{{ __('common.form.select') }}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="heating" class="form-label">{{ __('common.form.heating') }}</label>
                                <select name="heating" id="heating" class="form-control">
                                    <option value="">{{ __('common.form.select') }}</option>
                                    <option value="natural_gas">{{ __('common.form.natural_gas') }}</option>
                                    <option value="electric_heater">{{ __('common.form.electric_heater') }}</option>
                                    <option value="air_conditioning">{{ __('common.form.air_conditioning') }}</option>
                                    <option value="stove">{{ __('common.form.stove') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="facade" class="form-label">{{ __('common.form.facade') }}</label>
                                <select name="facade" id="facade" class="form-control">
                                    <option value="">{{ __('common.form.select') }}</option>
                                    <option value="north">{{ __('common.form.north') }}</option>
                                    <option value="south">{{ __('common.form.south') }}</option>
                                    <option value="east">{{ __('common.form.east') }}</option>
                                    <option value="west">{{ __('common.form.west') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="flooring" class="form-label">{{ __('common.form.flooring') }}</label>
                                <select name="flooring" id="flooring" class="form-control">
                                    <option value="">{{ __('common.form.select') }}</option>
                                    <option value="parquet">{{ __('common.form.parquet') }}</option>
                                    <option value="tile">{{ __('common.form.tile') }}</option>
                                    <option value="carpet_flooring">{{ __('common.form.carpet_flooring') }}</option>
                                    <option value="pvc">{{ __('common.form.pvc') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="width" class="form-label">{{ __('common.form.width') }} <sup>(m2)</sup></label>
                                <input type="text" class="form-control" id="width" name="width">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="height" class="form-label">{{ __('common.form.height') }} <sup>(m)</sup></label>
                                <input type="text" class="form-control" id="height" name="height">
                            </div>
                        </div>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary float-end"><i class="fas fa-plus"></i> {{ __('common.button.create') }}</button>
                  </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    
<script>
    function createRoom(){
        var form = $("#room").serialize()

        fastPost('/admin/rooms/create', form, '/admin/rooms')
    }
</script>
@endsection