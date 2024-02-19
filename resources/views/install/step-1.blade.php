@extends('install.master')

@section('content')
    <div class="row mt-4">
        <div class="col-12 card">
            <div class="card-body">
                <h4 class="card-title">{{ __('install.contract_title') }}</h4>
                <p class="text-muted">{{ __('install.contract_detail') }}</p>
                <iframe class="border w-100 text-center" style="min-height: 400px" src="https://docs.google.com/document/d/e/2PACX-1vSCSkmvh3xvJWMbXck1-JF7e19Aw62VcnZUIa2r4kc_Kexzc-41wXPnzZnDCXXcc5c5hC7caY3WDOT2/pub?embedded=true"></iframe>
                <div class="form-check text-start mt-3 d-flex justify-content-between align-self-center">
                    <div class="align-self-center">
                        <input onclick="clickAgreement()" class="form-check-input" type="checkbox" value="" id="agreementCheck" required>
                        <label class="form-check-label" for="agreementCheck">
                            {!! __('install.agree_label') !!}
                        </label>
                    </div>
                    <div class="">
                        <button id="agreementButton" onclick="window.location.assign('/install/step-2')" class="btn btn-primary" disabled>{{ __('install.agree_btn') }} <i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    function clickAgreement(){
        if($("#agreementCheck").is(':checked')){
            $("#agreementButton").attr('disabled',false);
        }else{
            $("#agreementButton").attr('disabled',true);
        }
    }
</script>
@endsection