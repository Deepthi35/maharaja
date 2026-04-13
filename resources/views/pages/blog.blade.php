@extends('frontend.app')

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
                    <a href="{{ url('/' . $page->parentName->slug) }}">{{ $page->parentName->title }}</a>
                </li>
                @endif
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="our-blog-post">
        <div class="container">
            @if ($blogPosts->count() > 0)
                <div class="row mb-4">
                    @foreach ($blogPosts as $blogPost)
                        <div class="col-md-4 d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <div class="card">
                                <a href="{{ url('blog/' . $blogPost->slug) }}">
                                 <figure class="m-0">   <img src="{{ asset(BLOG_POST_IMAGE_PATH . $blogPost->image) }}" alt="Image"
                                        class="card-img-top"></figure>
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="text-small d-flex">
                                            <span
                                                class="text-muted">{{ date('M d, Y', strtotime($blogPost->created_at)) }}</span>
                                        </div>
                                    </div>
                                    <a href="{{ url('blog/' . $blogPost->slug) }}">
                                        <h4 class="text-primary">{{ $blogPost->title }}</h4>
                                    </a>
                                    <p class="flex-grow-1">
                                        {!! \Illuminate\Support\Str::limit(strip_tags($blogPost->description), 108, '...') !!}
                                    </p>
                                    <div class="blog-btn">
                                    <a href="{{ url('blog/' . $blogPost->slug) }}" class="item-link float-left">Read More <i
                                            class="icon-chevron-right"></i></a>
                                            
                                    @if(!empty($blogPost->custom_url ))<a href="{{ $blogPost->custom_url }}" class="item-link float-right  p-2 rounded ">{{applicationSettings('external-blog-btn-text')}}<i
                                     class="icon-chevron-right"></i></a>  @endif 
                                    </div>   
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <ul class="pagination pagination-lg justify-content-center">
                    {{ $blogPosts->appends(request()->query())->links() }}
                </ul>
                
            @else
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    No Posts Found.
                </div>
            @endif
        </div>
        <div class="container my-4">
            <h2 class="text-primary text-center my-3">{{getClienteleCategory('other-blogs')->display_name}}</h2>
            <div class="row">
                @if(getClienteleCategory('other-blogs') )
                    @if($otherBlogsList->count() > 0)
                        @foreach($otherBlogsList as $index => $client)
                        <div class="col-md-12 py-1 px-3 bg-light m-1 rounded">
                        <a class="text-secondary" href="{{$client->url}}">{{$index + 1}}.  {{ $client->title }}</a>
                        </div>
                        @endforeach
                        <ul class="col-md-12 pt-2 pagination justify-content-center">
                            {{ $otherBlogsList->appends(request()->query())->links() }}
                        </ul>
                    @else
                    <div class=" col-md-12 justify-content-center">
                    <p class="text-white mt-3 text-center">No other Blogs are available right now..</p>
                    </div>
                    @endif
                @endif
            </div>
        </div>

        
    </section>

    
    @isset($faqCategory)
    @include('common.faqs', ['faqs' => $faqCategory->faqs]);
@endisset
   
@endsection
