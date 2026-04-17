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
                    @php
                        $contactLocations = App\Models\Location::where('publish', 1)->orderBy('id')->get();
                    @endphp
                    <div class="contact-section bg-primary card-body text-light">
                        <h2 class="h1 text-center">Get In Touch</h2>
                        <div class="contact-locations-row">
                            {{-- Location 1 --}}
                            <div class="contact-loc-block">
                                @if(!empty($contactLocations[0]))
                                    <div class="contact-loc-name">
                                        <span class="material-symbols-outlined">location_on</span>
                                        {{ $contactLocations[0]->location_name }}
                                    </div>
                                @endif
                                <ul>
                                    <li>
                                        <img src="{{ asset('frontend/img/icons/interface/map-marker1.svg') }}" alt="Address icon" class="address-icon">
                                        {!! applicationSettings('contact-address') !!}
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/img/icons/interface/mail1.svg') }}" alt="Email icon" class="email-icon">
                                        <a href="mailto:{{ applicationSettings('primary-mail') }}">{{ applicationSettings('primary-mail') }}</a>
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/img/icons/interface/phone1.svg') }}" alt="Phone icon" class="phone-icon">
                                        <a href="tel:{{ applicationSettings('primary-phone-number') }}">{{ applicationSettings('primary-phone-number') }}</a>
                                    </li>
                                </ul>
                            </div>

                            @if(!empty($contactLocations[1]))
                            <div class="contact-loc-divider"></div>
                            {{-- Location 2 --}}
                            <div class="contact-loc-block">
                                <div class="contact-loc-name">
                                    <span class="material-symbols-outlined">location_on</span>
                                    {{ $contactLocations[1]->location_name }}
                                </div>
                                <ul>
                                    @if(applicationSettings('location-2-map-location'))
                                    <li>
                                        <img src="{{ asset('frontend/img/icons/interface/map-marker1.svg') }}" alt="Address icon" class="address-icon">
                                        {!! applicationSettings('location-2-map-location') !!}
                                    </li>
                                    @endif
                                    @if(applicationSettings('location-2-mail'))
                                    <li>
                                        <img src="{{ asset('frontend/img/icons/interface/mail1.svg') }}" alt="Email icon" class="email-icon">
                                        <a href="mailto:{{ applicationSettings('location-2-mail') }}">{{ applicationSettings('location-2-mail') }}</a>
                                    </li>
                                    @endif
                                    @if(applicationSettings('location-2-phone'))
                                    <li>
                                        <img src="{{ asset('frontend/img/icons/interface/phone1.svg') }}" alt="Phone icon" class="phone-icon">
                                        <a href="tel:{{ applicationSettings('location-2-phone') }}">{{ applicationSettings('location-2-phone') }}</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            @endif
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

<style>
    .contact-locations-row {
        display: flex;
        align-items: flex-start;
        justify-content: center;
        gap: 0;
        padding: 30px 0 30px;
    }
    .contact-loc-block {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .contact-loc-name {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(0,0,0,0.3);
        color: #FFD54F;
        font-family: 'Laila', serif;
        font-size: 22px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        padding: 8px 22px;
        border-radius: 25px;
        margin-bottom: 20px;
    }
    .contact-loc-name .material-symbols-outlined {
        font-size: 24px;
    }
    .contact-loc-block ul {
        list-style: none;
        margin: 0;
        padding: 0;
        width: 100%;
        max-width: 350px;
    }
    .contact-loc-block ul li {
        display: flex !important;
        align-items: flex-start;
        gap: 12px;
        margin: 0 0 20px 0 !important;
        padding: 0 !important;
        font-size: 16px;
        line-height: 1.5;
        position: static !important;
    }
    .contact-loc-block ul li::before {
        display: none !important;
    }
    .contact-loc-block ul li img {
        width: 24px;
        height: 24px;
        margin: 2px 0 0 0 !important;
        flex-shrink: 0;
        display: block !important;
        vertical-align: top;
    }
    .contact-loc-block ul li a,
    .contact-loc-block ul li p {
        color: #fff;
        font-size: 16px;
        font-weight: 400;
        margin: 0;
        display: inline;
    }
    .contact-loc-divider {
        width: 2px;
        align-self: stretch;
        background: rgba(255,255,255,0.25);
        margin: 0 25px;
        flex-shrink: 0;
    }
    @media(max-width: 768px) {
        .contact-locations-row {
            flex-direction: column;
            align-items: center;
        }
        .contact-loc-divider {
            width: 80%;
            height: 1px;
            margin: 20px 0;
        }
    }
</style>
@endsection
