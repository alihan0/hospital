@extends('admin.master')

@section('title')
    {{ __('common.title.rooms') }} - {{ env('APP_NAME') }}
@endsection

@section('style')
    <style>
        .bed{
            cursor: pointer;
        }
        .bed:hover{
            background: #ddd !important
        }
        .remove-bed-btn:hover{
            color:red !important;
            opacity: 1 !important;
        }
    </style>
@endsection

@section('content')
<!-- start page title -->
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-8">
            <h6 class="page-title">{{ __('common.title.room_details') }}</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/admin/"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="/admin/rooms">{{ __('common.title.rooms') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('common.title.detail') }}</li>
            </ol>
        </div>
        
        <div class="col-4 d-flex justify-content-end">
            <div class="float-end align-self-center">        
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newBedModal"><i class="fas fa-plus"></i> {{ __('common.button.new_bed') }}</button>
                <button onclick="window.location.assign('/admin/rooms')" class="btn btn-primary"><i class="fas fa-list"></i> {{ __('common.button.list') }}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="newBedModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('common.title.new_bed') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>{{ __('common.text.new_bed') }}.</p>

          <div class="mb-3">
            <label for="bed_type" class="form-label">{{ __('common.form.bed_type') }}:</label>
            <select id="bed_type" class="form-control">
                <option value="0">{{ __('common.form.select') }}</option>
                <option value="1">{{ __('common.title.plinth') }}</option>
                <option value="2">{{ __('common.title.bunk_bed') }}</option>
                <option value="3">{{ __('common.title.stretcher') }}</option>
            </select>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('common.button.cancel') }}</button>
          <button type="button" class="btn btn-primary" onclick="newBed({{ $room->id }})">{{ __('common.button.save') }}</button>
        </div>
      </div>
    </div>
  </div>
<!-- end page title -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between">

                <div class="d-flex w-25">
                    <h4 class="fw-bold">{{ __('common.title.floor') }}: {{ $room->floor }}</h4>
                    <h4 class="fw-bold ms-3">{{ __('common.title.room') }}: {{ $room->room_no }}</h4>
                </div>
                <div class="d-flex justify-content-between align-self-center">
                    <h6 class="mx-2">{{ __('common.form.bathroom') }}: {{ $room->bathroom }}</h6>
                    <h6 class="mx-2">{{ __('common.form.toilet') }}: {{ $room->toilet }}</h6>
                    <h6 class="mx-2">{{ __('common.form.window') }}: {{ $room->window }}</h6>
                    <h6 class="mx-2">{{ __('common.form.heating') }}: {{ $room->heating }}</h6>
                    <h6 class="mx-2">{{ __('common.form.facade') }}: {{ $room->facade }}</h6>
                    <h6 class="mx-2">{{ __('common.form.flooring') }}: {{ $room->flooring }}</h6>
                    <h6 class="mx-2">{{ __('common.form.width') }}: {{ $room->width }}</h6>
                    <h6 class="mx-2">{{ __('common.form.height') }}: {{ $room->height }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title border-bottom pb-3">{{ __('common.title.beds') }}</h4>

                @foreach ($room->Beds as $bed)
                
                <div class="card directory-card bg-body-tertiary bed" data-bs-toggle="modal" data-bs-target="#bedDetailModal{{ $bed->id }}">
                    
                    <div class="card-body">
                        <small class="d-flex justify-content-end align-self-center text-end">{{ __('common.title.bed') }}#{{ $bed->id }}</small>
                        @if ($bed->Resident && $bed->Resident->status == 1)
                      
                        @if ($bed->Resident->Resident->gender == 'MALE')
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="img-fluid border border-3 border-primary img-thumbnail rounded-circle avatar-lg justify-content-center align-self-center d-flex">
                                        <i class="fas fa-male align-self-center fs-1 text-primary"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3 align-self-center">
                                <h5 class="text-primary font-size-18 mb-1"> {{ $bed->Resident->Resident->first_name.' '. $bed->Resident->Resident->last_name }}</h5>
                                <p class="font-size-12 mb-2">Creative Director</p>
                            </div>
                          </div>
                          @else
                          <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="img-fluid border border-3 border-danger img-thumbnail rounded-circle avatar-lg justify-content-center align-self-center d-flex">
                                    <i class="fas fa-male align-self-center fs-1 text-danger"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3 align-self-center">
                                <h5 class="text-danger font-size-18 mb-1"> {{ $bed->Resident->Resident->first_name.' '. $bed->Resident->Resident->last_name }}</h5>
                                <p class="font-size-12 mb-2">Creative Director</p>
                            </div>
                          </div>  
                          @endif
                          @else

                          <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="img-fluid border border-3 border-warning img-thumbnail rounded-circle avatar-lg justify-content-center align-self-center d-flex">
                                        <i class="fas fa-bed align-self-center fs-1 text-warning"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3 align-self-center">
                                <h5 class="text-warning font-size-18 mb-1">{{ __('common.title.empty_bed') }}</h5>
                            </div>
                          </div>
                          @endif 
                    </div>
                    <!-- end cardbody -->
                </div>



                <div class="modal fade" tabindex="-1" id="bedDetailModal{{ $bed->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">{{ __('common.title.bed_detail') }}</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="fw-bold fs-6">{{ __('common.form.bed_no') }}:</span>
                                <span>#{{ $bed->id }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="fw-bold fs-6">{{ __('common.form.bed_type') }}:</span>
                                @if ($bed->type == 1)
                                    <span class="btn btn-outline-warning">{{ __('common.title.plinth') }}</span>
                                @elseif($bed->type == 2)
                                    <span class="btn btn-outline-warning">{{ __('common.title.bunk_bed') }}</span>
                                @elseif($bed->type == 3)
                                    <span class="btn btn-outline-warning">{{ __('common.title.stretcher') }}</span>
                                @endif
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="fw-bold fs-6">{{ __('common.form.bed_status') }}:</span>
                                @if ($bed->status == 0)
                                    <span class="btn btn-outline-danger">{{ __('common.status.unavailable') }}</span>
                                @elseif($bed->status == 1)
                                    <span class="btn btn-outline-primary">{{ __('common.status.available') }}</span>
                                @elseif($bed->status == 2)
                                <span class="btn btn-outline-success">{{ __('common.status.filled') }}</span>
                                
                                @endif
                            </li>
                          </ul>

                          @if ($bed->status == 2)
                              <div class="card mt-4 border">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="img-fluid border border-3 {{ $bed->Resident->Resident->gender == "MALE" ? "border-primary" : "border-danger" }} img-thumbnail rounded-circle avatar-lg justify-content-center align-self-center d-flex">
                                                <i class="fas fa-male align-self-center fs-1 {{ $bed->Resident->Resident->gender == "MALE" ? "text-primary" : "text-danger" }}"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3 align-self-center">
                                            <h5 class="{{ $bed->Resident->Resident->gender == "MALE" ? "text-primary" : "text-danger" }} font-size-18 mb-1"> {{ $bed->Resident->Resident->first_name.' '. $bed->Resident->Resident->last_name }} ({{ \Carbon\Carbon::parse($bed->Resident->Resident->birthdate)->age }})
                                            </h5>
                                            <p class="font-size-12 mb-2">{{ \Carbon\Carbon::parse($bed->Resident->Resident->birthdate)->translatedFormat('j F Y') }}
                                            </p>
                                        </div>
                                      
                                        <a href="javascript:;" data-bs-dismiss="modal" data-bs-target="#deleteBedModal{{ $bed->id }}" data-bs-toggle="modal" class="btn align-self-center opacity-50 remove-bed-btn"><i class="fas fa-trash text-danger  fs-1"></i></a>
                                        
                                      </div>
                                </div>
                              </div>
                            @elseif($bed->status == 0)

                            <div class="card mt-4 border">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="img-fluid border border-3  img-thumbnail rounded-circle avatar-lg justify-content-center align-self-center d-flex">
                                                <i class="fas align-self-center fs-1  fa-exclamation-circle"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3 align-self-center">
                                            <h5 class="font-size-18 mb-1">
                                                {{ __('common.status.unavailable') }}
                                            </h5>
                                            <p class="font-size-12 mb-2">
                                                {{ __('common.status.unavailable_bed_text') }}
                                            </p>
                                        </div>
                                      </div>
                                </div>
                              </div>

                          @endif
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="modal fade" tabindex="-1" id="deleteBedModal{{ $bed->id }}">">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">{{ __('common.title.empty_the_bed') }}</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>{{ __('common.title.empty_the_bed_text') }}</p>

                          <div class="mb-3">
                            <label for="empty_reason" class="form-label">{{ __('common.form.empty_reason') }}</label>
                            <select name="empty_reason" id="empty_reason" class="form-control">
                                <option value="0">{{ __('common.form.select') }}</option>
                                <option value="1">{{ __('common.form.the_residentbecame_ex') }}</option>
                                <option value="2">{{ __('common.form.resident_left_the_institution') }}</option>
                                <option value="3">{{ __('common.form.the_resident_was_transferred_to_another_bed') }}</option>
                            </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('common.button.cancel') }}</button>
                          <button type="button" class="btn btn-primary" onclick="emptyBed({{ $bed->id }})">{{ __('common.button.apply') }}</button>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
                
                <!-- end card -->
                
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    
<script>

    function newBed(room){
        var type = $("#bed_type").val();

        fastPost('/admin/rooms/new-bed', {room:room, type:type});
    }

    function createRoom(){
        var form = $("#room").serialize()

        fastPost('/admin/rooms/create', form, '/admin/rooms')
    }

    function emptyBed(bed){
        var empty_reason = $("#empty_reason").val()
        fastPost('/admin/rooms/empty', {bed:bed, empty_reason:empty_reason});
    }
</script>
@endsection