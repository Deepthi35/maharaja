@extends('frontend.app')
@section('title')
    {{ $blogPost->title }}
@endsection
@section('seotitle')
    {{ $blogPost->seo_title }}
@endsection
@section('seodescription')
    {{ $blogPost->seo_description }}
@endsection
@section('seokeywords')
    {{ $blogPost->seo_keywords }}
@endsection
@section('content')
<section class="text-banner bg-secondary">
  <figure class="inner-pic"><img src="{{ asset('images/about-bg.svg') }}" alt="about bg image" />
  </figure>
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('/blog') }}">Blog</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{ $blogPost->title }}</li>
    </ol>
    </nav>
</div>
</section> 
    <section class="blog-details">
        <div class="container">
          <div class="blog-details-top">
            <div class="card card-body">
              <figure class="pic m-0"> <img src="{{ asset(BLOG_POST_IMAGE_PATH . $blogPost->image) }}"
                alt="{{ $blogPost->title }}"></figure>
                <div class="content mt-5">
                  <h1 class="text-primary">{{ $blogPost->title }}</h1>
                  <div class="d-flex justify-content-between mb-3">
                    <div class="mr-2">
                      <span > <i class="material-symbols-outlined">
                        calendar_month
                      </i> {{ date('M d, Y', strtotime($blogPost->created_at)) }}</span>
                    </div>
                    <div class="text-small d-flex">
                      <span class="text-muted">
                        <i class="material-symbols-outlined">
                          lan
                        </i>
                        {!! $blogPost->blogCategory->name !!}</span>
                    </div>
                  </div>
                  <div class="description"> {!! $blogPost->description !!}</div>
                </div>
            </div>
          </div>
          <div class="blog-details-bottom">
            <div class="card-body">
              <h2 class="section-title text-light text-center">
                Latest Blogs
            </h2>
            <div class="latests-blocks">
              <div class="four-items-dots">
                @foreach ($blogPosts as $blogPost)
                <div class="inner">
                <div class="card p-2 mx-3">
                  <a href="{{ url('blog/' . $blogPost->slug) }}" class="full-link"><figure><img class="img-fluid mb-2" src="{{ asset(BLOG_POST_IMAGE_PATH . $blogPost->image) }}" alt="{{ $blogPost->title }}" ></figure>
                  </a>
                    <h6 class="text-primary"><a href="{{ url('blog/' . $blogPost->slug) }}" class="full-link">{{ $blogPost->title }}</a></h6>
                  <p><span > <i class="material-symbols-outlined">
                    calendar_month
                  </i> {{ date('M d, Y', strtotime($blogPost->created_at)) }}</span></p>

                  <p>    <i class="material-symbols-outlined">
                    lan
                  </i> <span class="text-muted">{{ $blogPost->blogCategory->name }}</span></p>
                 &nbsp;
                </div>
              </div>
                @endforeach
              </div>
            </div>
            </div>
          </div>
    </section>
@if($faqCategory)
    @include('common.faqs', ['faqs' => $faqCategory->faqs]);
@endif

@endsection
