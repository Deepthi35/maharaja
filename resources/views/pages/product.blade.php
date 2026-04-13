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
    <section class="product-page">
        <div class="container">
            <div class="mobile-food-cat">
                <div class="foot-cat">
                    @foreach ($productCategories as $productcategory)
                        @if ($productcategory->products->count() > 0)
                            <div class=" {{ $productcategory->type == 'as-for-cat' ? 'as-for-cat' : 'item' }}" id="list-left-menu">
                                @if ($productcategory->type == 'as-for-cat')
                                <div class="clear"></div>
                                 @else
                                <a data-smooth-scroll href="#productcategory-{{ $productcategory->id }}" class="cat-list">
                                    @if ($productcategory->image != '')
                                        <img src="{{ asset(PRODUCT_CATEGORY_IMAGE_PATH . $productcategory->image) }}"
                                            alt="{{ $productcategory->name }} Avatar" class="avatar mr-3">
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" class="avatar mr-3">
                                    @endif
                                    {{ $productcategory->name }}
                                </a>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <h1 class="display-3 text-light mb-3 text-uppercase text-center">
                {{ $page->banner_title != '' ? $page->banner_title : $page->title }}</h1>
            <div class="row">
                <div class="col-md-4 ">
                    <div class="sticky-top pb-3 web-food-cat">
                        <h2 class="mb-3">CATEGORIES</h2>
                        <div id="list-left-menu" class="list-group">
                            @foreach ($productCategories as $productcategory)
                                @if ($productcategory->products->count() > 0)
                                
                                @if ($productcategory->type == 'as-for-cat')
                               <div class="clear"></div>
                                @else
                                <a data-smooth-scroll class="list-group-item list-group-item-action cat-list"
                                href="#productcategory-{{ $productcategory->id }}">
                                @if ($productcategory->image != '')
                                    <img src="{{ asset(PRODUCT_CATEGORY_IMAGE_PATH . $productcategory->image) }}"
                                        alt="{{ $productcategory->name }} Avatar" class="avatar mr-3">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}" class="avatar mr-3">
                                @endif
                                {{ $productcategory->name }}
                            </a>
                                @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div data-spy="scroll" data-target="#list-left-menu" data-offset="1000px" class="scrollspy-menu"
                        data-smooth-scroll>
                        @foreach ($productCategories as $productcategory)
                            @if ($productcategory->products->count() > 0)
                                <div class="productcategory-{{ $productcategory->type }}"
                                    id="productcategory-{{ $productcategory->id }}">&nbsp;</div>
                                <div
                                    class="food-list bg-primary text-light p-5 menu-list {{ $productcategory->type == 'as-for-cat' ? 'as-for-cat' : '' }} {{ $productcategory->type == 'as-nav-cat' ? 'as-nav-cat' : '' }}">
                                    <h2 class="product-title">{{ $productcategory->name }}</h2>
                                    <ul>
                                        @foreach ($products->where('product_category_id', $productcategory->id) as $product)
                                            <li class="{{ $product->sub_title ? '' : 'menu-prize' }}">
                                                <p>{{ $product->title }} <i>
                                                        {!! strip_tags($product->description) !!}
                                                    </i> </p>
                                                @if ($product->sub_title != '')
                                                    <span> {{ $product->sub_title }} </span>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
    </section>
    @include('pages.get-testimonials')
    @include('pages.location')
@endsection
