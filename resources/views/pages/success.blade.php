@extends('frontend.app')
@section('content')
<div class="thanks-section text-center text-light">
    <div class="container">
        @if (applicationSettings('contact-success-image') != '')
        <img 
        src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('contact-success-image')) }}"
        alt="{{ applicationSettingsAltText('contact-success-image') }}" />
        @endif
   {!! applicationSettings('contact-success-message') !!}
</div>
</div>
@endsection
