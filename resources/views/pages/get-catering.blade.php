@if($whyChooseOurCatering && ($whyChooseOurCatering->count() > 0))
<div class="card card-body border-0 mt-5 o-hidden bg-primary text-light catering-list about">
    <figure class="pos-pic about-left-pic"><img src="{{ asset('images/about-bg.svg') }}" alt="about bg image" />
    </figure>
    <figure class="pos-pic about-right-pic"><img src="{{ asset('images/about-bg.svg') }}" alt="about bg image" />
    </figure>
    <h2 class="text-center section-title">{{ getServiceCategory('why-choose-us-catering')->display_name }}</h2>
    
    <div class="row  align-items-center">
               
        <div class="col-md-6">
            <ul class="list-unstyled mb-0">
                
                @foreach ($whyChooseOurCatering as $index => $ourCatering)
                <li class="d-flex py-2">
                <div class="icon-round icon-round-xs bg-secondary mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="injected-svg icon bg-primary" data-src="assets/img/icons/interface/check.svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path d="M18.1206 5.4111C18.5021 4.92016 19.1753 4.86046 19.6241 5.27776C20.073 5.69506 20.1276 6.43133 19.746 6.92227L10.6794 18.5889C10.2919 19.0876 9.60523 19.1401 9.15801 18.7053L4.35802 14.0386C3.91772 13.6106 3.87806 12.8732 4.26944 12.3916C4.66082 11.91 5.33503 11.8666 5.77533 12.2947L9.76023 16.1689L18.1206 5.4111Z" fill="#212529"></path>
                    </svg>
                </div>
                <span>
                    <span class="font-weight-bold">{{ $ourCatering->title }}</span>{!! \Illuminate\Support\Str::limit($ourCatering->short_description, 170, '...') !!}</span>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6 about-left" data-aos="fade-left">
            <div 
                data-flickity='{ "autoPlay": true, "imagesLoaded": true, "wrapAround": true, "prevNextButtons": false }'>
             
                @foreach ($whyChooseOurCatering as $index => $ourCatering)
                <div class="carousel-cell mx-3 pb-1">
                    <figure class="m-0">
                        <img  src="{{ asset(SERVICE_IMAGE_PATH . $ourCatering->image) }}" alt="{{ $ourCatering->title }}">
                    </figure>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>
@endif
@if ($ourCaterings && ($ourCaterings->count() > 0 ) )
    <div class="row mb-4 mt-4">
        <div class="col">
            <h3 class="h1 text-center text-primary">{{ getServiceCategory('catering-services')->display_name }}</h3>
        </div>
    </div>
    <div class="caterings-list">
        @foreach ($ourCaterings as $ourCatering)
        <div class="card shadow text-dark mb-5  p-3">
            <div class="row align-items-center justify-content-around block">
                <div class="col-md-5 col-xl-6 mb-4 mb-md-0 pic">
                    <img class="w-100 rounded" src="{{ asset(SERVICE_IMAGE_PATH . $ourCatering->image) }}" alt="{{ $ourCatering->title }}">
                </div>
                <div class="col-md-7 col-xl-6 content">
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <div class="my-3"><span class="h1 text-dark">{{ $ourCatering->title }}</span></div>
                            {!! $ourCatering->short_description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif

