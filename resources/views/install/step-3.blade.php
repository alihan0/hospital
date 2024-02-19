@extends('install.master')

@section('content')
<div class="row mt-4">
    <div class="col-12 card">
        <div class="card-body">
            <h4 class="card-title">{{ __('install.step3_title') }}</h4>
            <p class="text-muted mb-4">{{ __('install.step3_detail') }}</p>
            
            <div class="row justify-content-center">
                <div class="col-6 text-start">
                    <form id="installForm">
                        <div class="row mb-3">
                          <label for="logo_header_white" class="col-4 col-form-label">{{ __('install.form.logo_header_white') }}</label>
                          <div class="col-8">
                            <input type="file" class="form-control" id="logo_header_white" name="logo_header_white" onchange="upload('logo_header_white', 'logo_header_white_data')">
                            <span class="form-text">{!! __('install.form.logo_header_white_desc') !!}</span>
                            <input type="hidden" name="logo_header_white_data" id="logo_header_white_data">
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label for="logo_footer_white" class="col-4 col-form-label">{{ __('install.form.logo_footer_white') }}</label>
                            <div class="col-8">
                              <input type="file" class="form-control" id="logo_footer_white" name="logo_footer_white" onchange="upload('logo_footer_white', 'logo_footer_white_data')">
                              <span class="form-text">{!! __('install.form.logo_footer_white_desc') !!}</span>
                              <input type="hidden" name="logo_footer_white_data" id="logo_footer_white_data">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="logo_header_dark" class="col-4 col-form-label">{{ __('install.form.logo_header_dark') }}</label>
                            <div class="col-8">
                              <input type="file" class="form-control" id="logo_header_dark" name="logo_header_dark" onchange="upload('logo_header_dark','logo_header_dark_data')">
                              <input type="hidden" name="logo_header_dark_data" id="logo_header_dark_data">
                              <span class="form-text">{!! __('install.form.logo_header_dark_desc') !!}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="logo_footer_dark" class="col-4 col-form-label">{{ __('install.form.logo_footer_dark') }}</label>
                            <div class="col-8">
                              <input type="file" class="form-control" id="logo_footer_dark" name="logo_footer_dark" onchange="upload('logo_footer_dark','logo_footer_dark_data')">
                              <span class="form-text">{!! __('install.form.logo_footer_dark_desc') !!}</span>
                              <input type="hidden" name="logo_footer_dark_data" id="logo_footer_dark_data">

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="logo_favicon" class="col-4 col-form-label">{{ __('install.form.logo_favicon') }}</label>
                            <div class="col-8">
                              <input type="file" class="form-control" id="logo_favicon" name="logo_favicon" onchange="upload('logo_favicon','favicon_data')">
                              <span class="form-text">{!! __('install.form.logo_favicon_desc') !!}</span>
                              <input type="hidden" name="favicon_data" id="favicon_data">
                            </div>
                        </div>
                        
                        <ul>
                            <li>
                                <p class="text-muted">{!! __('install.note1') !!}</p>
                            </li>
                            <li>
                                <p class="text-muted">{!! __('install.note2') !!}</p>
                            </li>
                            <li>
                                <p class="text-muted">{!! __('install.note3') !!}</p>
                            </li>
                        </ul>
                        
                        
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
            axios.post('/install/save-2', form).then((res) => {
                toastr[res.data.type](res.data.message);
                if(res.data.status){
                    window.location.assign('/install/step-4');
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