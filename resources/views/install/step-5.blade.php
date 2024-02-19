@extends('install.master')

@section('content')
<div class="row mt-4">
    <div class="col-12 card">
        <div class="card-body">
            <h4 class="card-title">{{ __('install.step5_title') }}</h4>
            <p class="text-muted mb-4">{{ __('install.step5_detail') }}</p>
            
            <div class="row justify-content-center">
                <div class="col-6 text-start">
                    <form id="installForm">
                        <div class="row mb-3">
                          <label for="name" class="col-4 col-form-label">{{ __('install.form.name') }}</label>
                          <div class="col-8">
                            <input type="text" class="form-control" id="name" name="name">
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-4 col-form-label">{{ __('install.form.email') }}</label>
                            <div class="col-8">
                              <input type="text" class="form-control" id="email" name="email">                           
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-4 col-form-label">{{ __('install.form.password') }}</label>
                            <div class="col-8">
                              <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                      </form>
                </div>
                <div class="d-flex justify-content-end">
                    <button onclick="submitForm()" class="btn btn-primary">Continue <i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function submitForm(){

        var button = $(event.currentTarget);
        button.html('<i class="fas fa-spinner fa-spin"></i>')
        button.prop('disabled', true);

        var form = $("#installForm").serialize();
        setTimeout(() => {
            axios.post('/install/save-4', form).then((res) => {
                toastr[res.data.type](res.data.message);
                if(res.data.status){
                    window.location.assign('/install/completed');
                }else{
                    button.html('Continue <i class="fas fa-chevron-right"></i>')
                    button.prop('disabled', false);
                }
           
            });
        }, 1000) 
    }
   

</script>
@endsection