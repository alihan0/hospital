@extends('install.master')

@section('content')
<div class="row mt-4">
    <div class="col-12 card">
        <div class="card-body">
            <h4 class="card-title">{{ __('install.step2_title') }}</h4>
            <p class="text-muted mb-4">{{ __('install.step2_detail') }}</p>
            
            <div class="row justify-content-center">
                <div class="col-6 text-start">
                    <form id="installForm">
                        <div class="row mb-3">
                          <label for="site_name" class="col-4 col-form-label">{{ __('install.form.site_name') }}</label>
                          <div class="col-8">
                            <input type="text" class="form-control" id="site_name" name="site_name">
                            <span class="form-text">{{ __('install.form.site_name_desc') }}</span>
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label for="domain_name" class="col-4 col-form-label">{{ __('install.form.domain_name') }}</label>
                            <div class="col-8">
                              <input type="text" class="form-control" id="domain_name" name="domain_name">
                              <span class="form-text">{{ __('install.form.domain_name_desc') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="site_url" class="col-4 col-form-label">{{ __('install.form.site_url') }}</label>
                            <div class="col-8">
                              <input type="text" class="form-control" id="site_url" name="site_url">
                              <span class="form-text">{{ __('install.form.site_url_desc') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="site_description" class="col-4 col-form-label">{{ __('install.form.site_description') }}</label>
                            <div class="col-8">
                              <input type="text" class="form-control" id="site_description" name="site_description">
                              <span class="form-text">{{ __('install.form.site_description_desc') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="site_keywords" class="col-4 col-form-label">{{ __('install.form.site_keywords') }}</label>
                            <div class="col-8">
                              <input type="text" class="form-control" id="site_keywords" name="site_keywords">
                              <span class="form-text">{{ __('install.form.site_keywords_desc') }}</span>
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
            axios.post('/install/save-1', form).then((res) => {
                toastr[res.data.type](res.data.message);
                if(res.data.status){
                    window.location.assign('/install/step-3');
                }else{
                    button.html('Continue <i class="fas fa-chevron-right"></i>')
                    button.prop('disabled', false);
                }
           
            });
        }, 1000) 
    }
</script>
@endsection