@extends('install.master')

@section('content')
<div class="row mt-4">
    <div class="col-12 card">
        <div class="card-body">
            <h4 class="card-title">{{ __('install.step4_title') }}</h4>
            <p class="text-muted mb-4">{{ __('install.step4_detail') }}</p>
            
            <div class="row justify-content-center">
                <div class="col-6 text-start">
                    <form id="installForm">
                        <div class="row mb-3">
                          <label for="primary_color" class="col-4 col-form-label">{{ __('install.form.primary_color') }}</label>
                          <div class="col-8">
                            <input type="color" class="form-control form-control-color" id="primary_color" name="primary_color">
                            <span class="form-text">{!! __('install.form.primary_color_desc') !!}</span>
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label for="secondary_color" class="col-4 col-form-label">{{ __('install.form.secondary_color') }}</label>
                            <div class="col-8">
                              <input type="color" class="form-control form-control-color" id="secondary_color" name="secondary_color">
                              <span class="form-text">{!! __('install.form.secondary_color_desc') !!}</span>                            
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tertiary_color" class="col-4 col-form-label">{{ __('install.form.tertiary_color') }}</label>
                            <div class="col-8">
                              <input type="color" class="form-control form-control-color" id="tertiary_color" name="tertiary_color">
                              <span class="form-text">{!! __('install.form.tertiary_color_desc') !!}</span>
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
            axios.post('/install/save-3', form).then((res) => {
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
    

    function upload(img,to) {
        // Dosya inputundan dosyayı seç
        var fileInput = document.getElementById(img);
        var file = fileInput.files[0];

        // FormData nesnesi oluştur
        var formData = new FormData();
        formData.append('file', file);

        // Axios kullanarak POST isteği gönder
        axios.post('/upload/logo', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function (response) {
            // Başarılı olursa burası çalışır
            $("#"+to).val(response.data.file_path)
            toastr["success"](response.data.message)
        })
        .catch(function (error) {
            // Hata olursa burası çalışır
            console.error(error);
        });
    }

</script>
@endsection