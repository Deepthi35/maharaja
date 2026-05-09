@extends('frontend.app')
@section('title')
    {{ $page->title ?? null }}
@endsection
@section('seotitle')
    {{ $page->seo_title ?? null }}
@endsection
@section('seodescription')
    {{ $page->seo_description ?? null }}
@endsection
@section('seokeywords')
    {{ $page->seo_keywords ?? null }}
@endsection
@section('content')
    @if ($sliders->count() > 0)
        <section class="home-slider has-divider text-light  bg-dark">
            @foreach ($sliders as $index => $slider)
                <div class="item">
                    <div class="container">
                        <div class="row align-items-center justify-content-between o-hidden">
                            <div class="col-md-6 aos-init aos-animate" data-aos="fade-left">
                                <div class="inner-pic">
                                    <figure> <img src="{{ asset(SLIDER_IMAGE_PATH . $slider->image) }}"
                                            alt="{{ $slider->image_alt_text }}">
                                    </figure>
                                </div>
                            </div>
                            @if ($slider->title || $slider->tagline || $slider->button_name || $slider->button_url)
                                <div class="col-md-6 text-end text-right  ">
                                    @if ($slider->title)
                                        @if ($index == 0)
                                            <h1 class="display-1">{!! $slider->title !!}</h1>
                                        @else
                                            <h2 class="display-1">{!! $slider->title !!}</h2>
                                        @endif
                                    @endif
                                    @if ($slider->tagline)
                                        <p class="lead">{!! $slider->tagline !!}</p>
                                    @endif
                                    @if ($slider->button_name && $slider->button_url)
                                        <a href="{{ $slider->button_url }}" class="btn btn-secondary btn-lg"
                                            target="{{ $slider->new_window ? '_target' : '' }}">
                                            {{ $slider->button_name }}
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    @endif
    <section class="bg-secondary about">
        <figure class="pos-pic about-left-pic"><img src="{{ asset('images/about-bg.svg') }}" alt="about bg image" />
        </figure>
        <figure class="pos-pic about-right-pic"><img src="{{ asset('images/about-bg.svg') }}" alt="about bg image" />
        </figure>
        <div class="container">
            <div class="row justify-content-between o-hidden">
                <div class="col-md-7">
                    <h2 class="section-title">
                        {!! applicationSettings('welcome-title') !!}
                    </h2>
                    {!! applicationSettings('welcome-description') !!}
                    <a class="btn btn-secondary"
                        href="{{ applicationSettings('welcome-button-url') }}">{!! applicationSettings('welcome-button-text') !!}</a>
                </div>
                <div class="col-md-5 about-left" data-aos="fade-left">
                    <div
                        data-flickity='{ "autoPlay": true, "imagesLoaded": true, "wrapAround": true, "prevNextButtons": false }'>
                        @php($data = applicationSettings('welcome-gallery'))
                        @if($data )
                        @foreach (json_decode($data, true) as $key => $image)
                            <div class="carousel-cell mx-3 pb-1">
                                <figure class="m-0">
                                    <img src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . $image['path']) }}"
                                        alt="{{ $image['alt_text'] }}">
                                </figure>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-dark vintage text-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-4">
                    <h2 class="section-title text-light">{!! applicationSettings('classic-vintage-title') !!}</h2>
                </div>
                <div class="col-md-8">
                    <div class="v-inner lead">
                        {!! applicationSettings('classic-vintage-description') !!}
                    </div>
                </div>
            </div>
            <div class="row min-vh-70 mb-3">
                <div class="col-4">
                    <div class="h-100 vintage-left-pic">
                        <figure class="m-0 left-pic ">
                            <img class="object-fit-cover  w-100 h-100"
                                src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('classic-vintage-image-1')) }}"
                                alt="{{ applicationSettingsAltText('classic-vintage-image-1') }}" />
                        </figure>
                    </div>
                </div>
                <div class="col-8 d-flex flex-column">
                    <div class="row flex-grow-1">
                        <div class="col-6">
                            <div class="h-100  vintage-right-pic">
                                <figure class="m-0 h-100">
                                    <img class="object-fit-cover  w-100 h-100"
                                        src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('classic-vintage-image-2')) }}"
                                        alt="{{ applicationSettingsAltText('classic-vintage-image-2') }}" />
                                </figure>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="h-100 vintage-right-pic">
                                <figure class="m-0 h-100 ">
                                    <img class="object-fit-cover  w-100 h-100"
                                        src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('classic-vintage-image-3')) }}"
                                        alt="{{ applicationSettingsAltText('classic-vintage-image-3') }}" />
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 flex-grow-1">
                        <div class="col-6">
                            <div class="h-100 vintage-right-pic">
                                <figure class="m-0 h-100 ">
                                    <img class="object-fit-cover  w-100 h-100"
                                        src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('classic-vintage-image-4')) }}"
                                        alt="{{ applicationSettingsAltText('classic-vintage-image-4') }}" />
                                </figure>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="h-100 vintage-right-pic">
                                <div class="card card-body h-100 bg-primary border-radius-0 text-center">
                                    <div class="flex-grow-1">
                                        
                                        <div class="h3">Book Your Table Today!</div>
                                        
                                        <div>Experience the flavors of our exquisite cuisine, crafted with authentic spices and traditional recipes</div>
                                    </div>
                                    <div class="contact-loc-name">
                                        <a href="tel:+1 402-505-4488" class="my-1 btn btn-outline-white"><img src="{{ asset('frontend/img/icons/interface/phone1.svg') }}" alt="Phone icon" class="phone-icon pr-1">OMAHA</a>
                                        <a href="tel:+1 531-207-1921" class="btn btn-outline-white"><img src="{{ asset('frontend/img/icons/interface/phone1.svg') }}" alt="Phone icon" class="phone-icon pr-1">PAPILLION </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('pages.our-popular-dishes')
    <section class="bg-dark text-light food-menu">
        <div class="container">
            <div class="card card-body border-0 o-hidden bg-primary text-light delivered ">
                <div class="row">
                    <div class="col-md-7">
                        <h3>{!! applicationSettings('get-your-favourite-title') !!}</h3>
                        {!! applicationSettings('get-your-favourite-descriptiion') !!}
                        @if (applicationSettings('get-your-favourite-button') != '')
                            <a href="{!! applicationSettings('get-your-favourite-button-url') !!}"
                                class="btn btn-white text-uppercase customize-btn">{!! applicationSettings('get-your-favourite-button') !!}</a>
                        @endif
                    </div>
                </div>
                <figure class="delivered-pic">
                    
                    <img 
                    src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('get-your-favourite-image')) }}"
                    alt="{{ applicationSettingsAltText('get-your-favourite-image') }}" />
                    
                    

                </figure>
            </div>
            <div class="card card-body border-0 o-hidden bg-primary text-light food-list">
                <h2 class="text-center section-title">Menu A LA Carte</h2>
                <div class="row menu-list">
                    @if ($featuredCategories->count() > 0)
                        @foreach ($featuredCategories as $featuredCategory)
                            <div class="{{ $featuredCategory->type == 'as-for-cat' ? 'as-for-cat' : 'col-md-4 block' }} {{ $featuredCategory->type == 'as-nav-cat' ? 'as-nav-cat' : 'col-md-4 block' }} col-md-4 block">
                                <h2 class="product-title">{{ $featuredCategory->name }}</h2>
                                <ul>
                                    @foreach ($featuredCategory->products as $product)
                                        <li class="{{ $product->sub_title ? '' : 'menu-prize' }}">
                                            <em>{{ $product->title }}</em>
                                            @if ($product->sub_title != '')
                                                <span> {{ $product->sub_title }} </span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    @endif
                </div>

                @if  (applicationSettings('our-menu-text-url') != '')
                <div class="text-center mt-5">
                    <a href="{{ applicationSettings('our-menu-text-url') }}" class="btn btn-white text-uppercase">{{ applicationSettings('our-menu-text') }}</a>
                </div>
                @endif

            </div>
            <div class="party-orders mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-body bg-primary text-light">
                            <div class="inner">
                                <h3>{!! applicationSettings('from-small-to-large-title') !!}</h3>
                                {!! applicationSettings('from-small-to-large-description') !!}
                                <div class=" mt-3">
                                @if (applicationSettings('from-small-text-url') != '')
                                    <a class="btn btn-white text-uppercase"
                                        href="{{ applicationSettings('from-small-text-url') }}">{!! applicationSettings('from-small-text') !!}</a>
                                @endif
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 party-orders-right">
                        <div class="card">
                            <div
                                data-flickity='{ "autoPlay": true, "imagesLoaded": true, "wrapAround": true, "pageDots": false, "prevNextButtons": true }'>
                                @php($data = applicationSettings('from-small-to-large-gallery'))
                                @if($data )
                                @foreach (json_decode($data, true) as $key => $image)
                                    <div class="carousel-cell mx-3 ">
                                        <figure class="m-0">
                                            <img src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . $image['path']) }}"
                                                alt="{{ $image['alt_text'] }}">
                                        </figure>
                                    </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </section>
@if(applicationSettings('popup-toggle') == 1)
<div class="pagepopup" id="page-popup">
    <div class="modal fade bd-example-modal-lg" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closePopup()">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                    <div class="p-3">
                        <div class="text-center">
                            @if (applicationSettings('popup-title'))
                                <h3 class="m-1 text-primary">{!! applicationSettings('popup-title') !!}</h3>
                            @endif

                            @if (applicationSettings('popup-image'))
                                <img src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('popup-image')) }}" 
                                    class="popup-image img-fluid" 
                                    alt="{{ applicationSettingsAltText('popup-image') }}" />
                            @endif

                            @if (applicationSettings('popup-text'))
                                <div class="my-2 text-dark">{!! applicationSettings('popup-text') !!}</div>
                            @endif

                            @if (applicationSettings('popup-button-text'))
                                <a href="{!! applicationSettings('popup-button-url') !!}" 
                                    class="btn btn-small btn-secondary">
                                    {!! applicationSettings('popup-button-text') !!}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if(applicationSettings('popup-once-day') == 1)
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (!localStorage.getItem('popupShown')) {
            $('#confirmation-modal').modal('show');
        }
    });

    function closePopup() {
        $('#confirmation-modal').modal('hide');
        localStorage.setItem('popupShown', 'true'); 
    }
</script>
@else
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#confirmation-modal').modal('show');
    });

    function closePopup() {
        $('#confirmation-modal').modal('hide');
    }
</script>
@endif 
@endsection
