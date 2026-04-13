@extends('frontend.app')
@section('title')
    {{ $page->title }}
@endsection
@section('seotitle')
    {{ $page->seo_title }}
@endsection
@section('seodescription')
    {{ $page->seo_description }}
@endsection
@section('seokeywords')
    {{ $page->seo_keywords }}
@endsection
@section('content')
    <section class="text-banner bg-secondary">
        <figure class="inner-pic"><img src="{{ asset('images/about-bg.svg') }}" alt="about bg image" />
        </figure>
        <div class="container">
            <h1 class="display-4">{{ $page->banner_title != '' ? $page->banner_title : $page->title }}</h1>
            <nav aria-label="breadcrumb text-light">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    @if ($page->parentName)
                    @if($page->parentName->type == 'nopage')
                   
                    @else
                    <li class="breadcrumb-item">
                        <a href="{{ url('/' . $page->parentName->slug) }}">{{$page->type}}{{ $page->parentName->title }}</a>
                    </li>
                    @endif
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="contact-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="contact-section bg-primary card-body text-light">
                        <h2 class="h1 text-center">Get In Touch</h2>
                        <div class="get-in-touch">
                            <ul>
                                <li><img src="{{ asset('frontend/img/icons/interface/map-marker1.svg') }}"
                                        alt="Address icon" class="address-icon">
                                    {!! applicationSettings('contact-address') !!}</li>
                                <li><img src="{{ asset('frontend/img/icons/interface/mail1.svg') }}" alt="Address icon"
                                        class="email-icon">
                                    <a
                                        href="mailto:{{ applicationSettings('primary-mail') }}">{{ applicationSettings('primary-mail') }}</a>
                                </li>
                                <li>
                                    <img src="{{ asset('frontend/img/icons/interface/phone1.svg') }}" alt="Email icon"
                                        class="phone-icon">
                                    <a
                                        href="tel:{{ applicationSettings('primary-phone-number') }}">{{ applicationSettings('primary-phone-number') }}</a>
                                    <a
                                        href="tel:{{ applicationSettings('secondary-phone-number') }}">{{ applicationSettings('secondary-phone-number') }}</a>

                                </li>
                            </ul>
                        </div>
                        <div class="text-center mb-4">
                            <h2 class="h1 get-in-title">{!! applicationSettings('hear-from-you') !!}</h2>
                        </div>

                        <form action="{{ url('contact-form-submission') }}" method="POST" id="contact-form">
                            {{ csrf_field() }}
                            
                            <div class="row">
                                @honeypot
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="name" placeholder="Name*" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone Number*"
                                        data-parsley-type="digits" data-parsley-length="[10, 10]" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control" name="email" data-parsely-type="email"
                                        placeholder="Email Address*" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" minlength="10" rows="5" placeholder="Your Message*" required></textarea>
                            </div>
                            <div class="g-recaptcha" data-callback="imNotARobot"
                                data-sitekey="6LeTO4koAAAAAHbW14CJZP-Vxrxw0hF0r_pJkyym"></div>
                            <div id="captchaerrors"></div>
                            <br />
                            <button class="btn btn-secondary" type="submit" id="contact_btn">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('pages.get-testimonials')
    @include('pages.location')
@endsection
