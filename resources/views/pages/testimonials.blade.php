@extends('frontend.app')


@section('title'){{ $testimonials->title ?? null }}@endsection
@section('seotitle'){{ $testimonials->seo_title ?? null }}@endsection
@section('seodescription'){{ $testimonials->seo_description ?? null }}@endsection
@section('seokeywords'){{ $testimonials->seo_keywords ?? null }}@endsection

<section class="bg-dark text-light header-inner p-0 jarallax o-hidden" data-overlay data-jarallax data-speed="0.2">
    <img src="{{ asset('frontend/img/inner-1.jpg') }}" alt="Image" class="jarallax-img opacity-30">
    <div class="container py-0 layer-2">
        <div class="row my-3">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
                    </ol>
                </nav>
            </div>
        </div>
  
        <div class="row my-4 my-md-6" data-aos="fade-up">
            <div class="col-lg-9 col-xl-8">
                <h1 class="display-4">Testimonials</h1>
                <p class="lead mb-0">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                </p>
            </div>
        </div>
    </div>
  
    <div class="decoration-wrapper">
        <div class="decoration bottom right d-none d-md-block" data-jarallax-element="100 100">
            <img class="bg-primary-2" src="assets/img/decorations/deco-blob-1.svg"
                alt="deco-blob-1 decoration" data-inject-svg />
        </div>
    </div>
  
    <div class="divider flip-x">
        <img src="assets/img/dividers/divider-1.svg" alt="graphical divider" data-inject-svg />
    </div>
  </section>

@section('content')
<section class="client-testimonial ">
    <div class="container">

        <h2 class="title text-center"><span>client testimonial</span>
            Here’s what our satisfied <br>clients are saying
        </h2>
@if($testimonials->count()>0)
        
    @foreach ($testimonials as $testimonial )
        <div class="controls-light arrows-inside mb-6"
            data-flickity='{ "autoPlay": true, "imagesLoaded": true, "wrapAround": true }'>
            <div class="carousel-cell col-xl-6 col-lg-6 col-md-6 col-9 pb-1">
                <div class="card card-body bg-dark text-light">
                    <div class="flex-grow-1 pt-md-3">
                            <h4>{{ $testimonial->name }}</h4>
                        <a href= "">
                            <img src="{{ asset('TESTIMONIAL_IMAGE_PATH'.$testimonial->image) }}" alt="Image" class="card-img-top">
                          </a>
                        <p class="lead">
                            {!! strip_tags($testimonial->description) !!} 
                        </p>
                    </div>
                    <div class="avatar-author d-block mt-2">
                        <h4>— {{ $testimonial->name }}</h4>
                    </div>
                    <span class="text-muted">{{ date('M d, Y', strtotime($testimonial->date)) }}</span>
                </div>
            </div>
        </div>
        @endforeach

        <div class="row justify-content-center">
            @foreach ($stats as $stat )
            <div class="col-6 mb-3 col-lg-3 mb-lg-0">
                {{-- {{ $stat->prefix }} --}}
                <span class="display-4 text-primary d-block" data-countup data-start="4567" data-end="{{ $stat->number }}" 
                    data-duration="3" data-grouping="true"> </span>
                    {{-- {{ $stat->suffix }} --}}
                    <span class="h6">{{ $stat->title }}</span>
            </div>
            @endforeach
        </div>
        <ul class="pagination pagination-lg justify-content-center">
            {{ $testimonials->appends(request()->query())->links() }}
        </ul>
        @else
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            No Posts Found.
        </div>
    @endif
    </div>    </div>
</section>
@endsection