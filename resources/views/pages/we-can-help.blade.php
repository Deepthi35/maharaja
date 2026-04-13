
<section class="text-light jarallax we-can-help" data-jarallax data-speed="0.5">
    <img class="jarallax-img"
  src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('we-can-help-image')) }}"
  alt="{{ applicationSettingsAltText('we-can-help-image') }}">
    <div class="container">
      <div class="row min-vh-30 align-items-center">
        <div class="col text-center">
            <h2 class="title"><span> {!! applicationSettings('we-can-help-sub-title') !!}</span>
                {!! applicationSettings('we-can-help-title') !!}
           
            </h2>
            <a class="btn btn-secondary" href="{{ applicationSettings('we-can-help-url') }}"><span class="material-symbols-outlined">
                call
                </span> Give us a Call</a>
        </div>
      </div>
    </div>
  </section>

  
