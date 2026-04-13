@if (applicationSettings('hours-of-operation') != '')
<div class="container">
<div class="card card-body border-0 o-hidden bg-primary text-light delivered hours-of-operation">
    <div class="row">
        <div class="col-md-7">
            {!! applicationSettings('hours-of-operation') !!}
        </div>
    </div>
    <figure class="delivered-pic">    <img 
        src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('get-your-favourite-image')) }}"
        alt="{{ applicationSettingsAltText('get-your-favourite-image') }}" /> </figure>
</div>
</div>
@endif