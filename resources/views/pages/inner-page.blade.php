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
                @if($page->slug == 'catering')
                <a class="smooth-scroll btn en-btn bg-primary text-white float-right" href="#catering-form"> {!! applicationSettings('catering-button-text')!!} </a>
                @endif
            </nav>  
        </div>
    </section>

    @if($page->slug == 'about-us')
    {!! $page->content !!}
        @include('pages.hours-of-operation')

    @endif

    @if ($page->slug == 'catering' )

    <section class="catering text-light py-5">
        <div class="container">
        {!! $page->content !!} 
             @include('pages.catering')
        </div>
    </section>

    @endif
    <!-- @include('pages.hours-of-operation') -->
    @include('pages.get-testimonials')
    @include('pages.location')
@endsection
@section('page_scripts')
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (!target) return;

        const start = window.pageYOffset;
        const distance = target.offsetTop - start;
        const duration = 1000; // Duration in ms
        const startTime = performance.now();

        const scroll = (currentTime) => {
            const elapsed = Math.min((currentTime - startTime) / duration, 1);
            const ease = elapsed < 0.5 
                ? 2 * elapsed * elapsed 
                : 1 - Math.pow(-2 * elapsed + 2, 2) / 2; // Ease-in-out
            window.scrollTo(0, start + distance * ease);
            if (elapsed < 1) requestAnimationFrame(scroll);
        };

        requestAnimationFrame(scroll);
    });
});

</script>
@endsection