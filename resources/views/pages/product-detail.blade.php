@extends('frontend.app')
@section('title')
    {{ $products->title ?? null }}
@endsection
@section('seotitle')
    {{ $products->seo_title ?? null }}
@endsection
@section('seodescription')
    {{ $products->seo_description ?? null }}
@endsection
@section('seokeywords')
    {{ $products->seo_keywords ?? null }}
@endsection
@section('content')
    <section class="product-details">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('/products') }}">Product</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-6 products-pics">
                    <div class="card pics-inner ">
                        <div class="card-body">
                            <!-- Flickity HTML init -->
                            <div class="carousel products-main"
                                data-flickity='{
                              "prevNextButtons": false,
                              "pageDots": false,
                              "autoPlay": true
                          }'>
                                <div class="carousel-cell">
                                    <figure><img src="{{ asset(PRODUCT_IMAGE_PATH . $product->image) }}">
                                        @if ($product->special_product == 1)
                                            <span class="special-product">Special Product</span>
                                        @endif
                                    </figure>
                                </div>
                                @foreach (json_decode($product->image_gallery) as $image)
                                    <div class="carousel-cell">
                                        <figure>
                                            <img src="{{ asset(PRODUCT_IMAGE_PATH . $image->path) }}"
                                                alt="{{ $image->alt_text }}">
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                            <div class="carousel products-nav"
                                data-flickity='{ "asNavFor": ".products-main", "contain": true, "pageDots": false }'>
                                <div class="carousel-cell">
                                    <figure> <img src="{{ asset(PRODUCT_IMAGE_PATH . $product->image) }}"></figure>
                                </div>
                                @foreach (json_decode($product->image_gallery) as $image)
                                    <div class="carousel-cell">
                                        <figure> <img src="{{ asset(PRODUCT_IMAGE_PATH . $image->path) }}"
                                                alt="{{ $image->alt_text }}">
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 side-content">
                    <div class="inner">
                        <h1>{{ $product->title }}</h1>
                        <div class="row">
                            <div class="col-md-8">
                                <span class="post-date">Category:
                                    <b>
                                        {!! \Illuminate\Support\Str::limit(strip_tags($product->productCategory->name), 150, '...') !!}
                                    </b></span>
                            </div>
                        </div>
                        <div class="details-description">
                            <h3 class="details-title">Description</h3>
                            {!! $product->description !!}
                        </div>
                        @if (!$product->specifications->isEmpty())
                            <div class="details-specifications">
                                <h3 class="details-title">Specifications</h3>
                                <table border="1" borderColor="#B7B7B7">
                                    <tbody>
                                        @foreach ($product->specifications as $specification)
                                            <tr>
                                                <td>{{ $specification->specification_name }}</td>
                                                <td>{{ $specification->specification_value }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        @endif
                        <a href="https://wa.me/7013701824/?text={{ urlencode('I am interested in the product: ' . $product->title) }}"
                            target="_blank" rel="noopener noreferrer" class="btn btn-secondary details-btn">ENQUIRE NOW</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="products-related">
            <h2 class="title text-center">Related Products</h2>
            <div class="four-items related-products-main ">
                @include('pages.get-releated-products')
            </div>
        </div>
        </div>
    </section>
    @if ($faqCategory)
        @include('common.faqs', ['faqs' => $faqCategory->faqs])
    @endif
    @include('pages.we-can-help')
@endsection
