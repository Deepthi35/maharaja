@extends('frontend.app')
@section('title')
    {{ $blogPosts->title ?? null }}
@endsection
@section('seotitle')
    {{ $blogPosts->seo_title ?? null }}
@endsection
@section('seodescription')
    {{ $blogPosts->seo_description ?? null }}
@endsection
@section('seokeywords')
    {{ $blogPosts->seo_keywords ?? null }}
@endsection
@section('content')
    {{-- ----------inner-banner------------- --}}
    <section class="bg-dark text-light header-inner p-0 jarallax o-hidden text-center inner-banner custom-inner-banner"
        data-overlay data-jarallax data-speed="0.2">
        @if (applicationSettings('careers-banner') != '')
            <img src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('careers-banner')) }}"
                alt="{{ applicationSettingsAltText('careers-banner') }}" class="jarallax-img opacity-30">
        @else
            <img src="{{ asset('frontend/img/inner-1.jpg') }}" alt="{!! applicationSettings('careers-title') !!} Image"
                class="jarallax-img opacity-30">
        @endif
        <div class="container py-5 layer-2 mb-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{!! applicationSettings('careers-title') !!}</li>
                </ol>
            </nav>
            <h1 class="display-1">{!! applicationSettings('careers-title') !!}</h1>
            <p>{!! applicationSettings('careers-tagline') !!}</p>
        </div>
    </section>
    {{-- ----------end of inner-banner------------- --}}
    <section class="careers-page">
        <div class="container">
            <h2 class="text-center">{!! applicationSettings('careers-sub-title') !!}</h2>
            <div class="des text-center">{!! applicationSettings('careers-description') !!}</div>
            <div class="text-light jarallax  inside-form" data-jarallax data-speed="0.5">
                <img src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('career-hear-from-image')) }}"
                    alt="{{ applicationSettingsAltText('career-hear-from-image') }}" class="jarallax-img">
               
                    <div class="row min-vh-60 align-items-center">
                        <div class="col text-left">
                            <div class="inner">
                                <h3>{!! applicationSettings('career-hear-from-title') !!}</h3>
                                <div class="form-des">{!! applicationSettings('career-hear-from-description') !!}</div>
                                <form action="{{ url('career-form-submission') }}" method="POST" id="contact-form" enctype="multipart/form-data">
                                    {{ csrf_field() }}
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('full_name', 'Full Name:') !!}
        {!! Form::text('full_name', null, [
            'class' => 'form-control',
            'required',
        ]) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('phone', 'Phone:') !!}
        {!! Form::text('phone', null, [
            'class' => 'form-control numbers-input',
            'data-parsley-type' => 'digits',
            'required',
            'maxlength' => 10,
            'minlength' => 10,
        ]) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, [
            'class' => 'form-control',
            'required',
        ]) !!}
    </div>

    <!-- Designation Field -->
    <div class="form-group col-sm-6">
        <label for="designation">Designation:</label>
        <select name="designation" class="form-control select2" required>
            <option value="" disabled selected>Select Designation</option>
            <option value="Junior">Junior</option>
            <option value="Senior">Senior</option>
        </select>
    </div>

    <div class="form-group1 image_input image_input_required col-sm-6">
        {!! Form::label('resume', 'Upload Resume:') !!}
        <div class="input-group">
            <div class="custom-file">

                {!! Form::file('resume', [
                    'class' => 'custom-file-input',
                    'accept' => '.pdf,.doc,.docx,',
                    'data-parsley-fileextension' => 'pdf,doc,docx',
                    'required',
                ]) !!}
                {!! Form::label('resume', 'Upload Resume', ['class' => 'custom-file-label']) !!}

            </div>
        </div>
    </div>
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('message', 'Message:') !!}
        {!! Form::textarea('message', null, ['class' => 'form-control', 'required']) !!}
    </div>
</div>       
                                    <button class="btn btn-secondary" type="submit" id="contact_btn">SUBMIT</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </div>
        </div>
    </section>








   
    @if ($faqCategory)
        @include('common.faqs', ['faqs' => $faqCategory->faqs]);
    @endif
    @include('pages.statistics')
@endsection
