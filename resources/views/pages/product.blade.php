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

            <h1 class="display-3 text-light mb-3 text-uppercase text-center">
                {{ $page->banner_title != '' ? $page->banner_title : $page->title }}</h1>

            @if(!$selectedLocationId)
            {{-- Location Selection Section - Only shown when no location selected --}}
            <div class="location-selection-section" id="locationSelection">
                <h3 class="location-selection-title">Choose Your Location</h3>
                <p class="location-selection-subtitle">Select a branch to view its menu</p>
                <div class="location-boxes">
                    @foreach($locations as $location)
                        <button class="location-box" data-id="{{ $location->id }}">
                            <div class="location-box-image">
                                @if($location->image)
                                    <img src="{{ asset(LOCATION_IMAGE_PATH . $location->image) }}" alt="{{ $location->location_name }}">
                                @else
                                    <div class="location-box-placeholder">
                                        <span class="material-symbols-outlined">restaurant</span>
                                    </div>
                                @endif
                            </div>
                            <div class="location-box-info">
                                <span class="material-symbols-outlined location-box-pin">location_on</span>
                                <span class="location-box-name">{{ $location->location_name }}</span>
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>
            @else
            {{-- Menu Content - Only shown when a location is selected --}}
            <div id="menuContent">
                <div class="text-center mb-4">
                    <div class="location-badge-wrap">
                        <span class="location-badge">
                            <span class="material-symbols-outlined" style="font-size:1rem;vertical-align:middle;">location_on</span>
                            {{ $selectedLocation->location_name }}
                        </span>
                    </div>
                </div>

                <div class="mobile-food-cat">
                    <div class="foot-cat">
                        @foreach ($productCategories as $productcategory)
                            @if ($products->where('product_category_id', $productcategory->id)->count() > 0)
                                <div class=" {{ $productcategory->type == 'as-for-cat' ? 'as-for-cat' : 'item' }}" id="list-left-menu">
                                    @if ($productcategory->type == 'as-for-cat')
                                    <div class="clear"></div>
                                     @else
                                    <a data-smooth-scroll href="#productcategory-{{ $productcategory->id }}" class="cat-list">
                                        @if ($productcategory->image != '')
                                            <img src="{{ asset(PRODUCT_CATEGORY_IMAGE_PATH . $productcategory->image) }}"
                                                alt="{{ $productcategory->name }} Avatar" class="avatar mr-3">
                                        @else
                                            <img src="{{ asset('images/no-image.png') }}" alt="{{ $productcategory->name }}" class="avatar mr-3">
                                        @endif
                                        {{ $productcategory->name }}
                                    </a>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 ">
                        <div class="sticky-top pb-3 web-food-cat">
                            <h2 class="mb-3">CATEGORIES</h2>
                            <div id="list-left-menu" class="list-group">
                                @foreach ($productCategories as $productcategory)
                                    @if ($products->where('product_category_id', $productcategory->id)->count() > 0)

                                    @if ($productcategory->type == 'as-for-cat')
                                   <div class="clear"></div>
                                    @else
                                    <a data-smooth-scroll class="list-group-item list-group-item-action cat-list"
                                    href="#productcategory-{{ $productcategory->id }}">
                                    @if ($productcategory->image != '')
                                        <img src="{{ asset(PRODUCT_CATEGORY_IMAGE_PATH . $productcategory->image) }}"
                                            alt="{{ $productcategory->name }} Avatar" class="avatar mr-3">
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" alt="{{ $productcategory->name }}" class="avatar mr-3">
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
                                @if ($products->where('product_category_id', $productcategory->id)->count() > 0)
                                    <div class="productcategory-{{ $productcategory->type }}"
                                        id="productcategory-{{ $productcategory->id }}">&nbsp;</div>
                                    <div
                                        class="food-list bg-primary text-light p-5 menu-list {{ $productcategory->type == 'as-for-cat' ? 'as-for-cat' : '' }} {{ $productcategory->type == 'as-nav-cat' ? 'as-nav-cat' : '' }}">
                                        <h2 class="product-title">{{ $productcategory->name }}</h2>
                                        <ul>
                                            @foreach ($products->where('product_category_id', $productcategory->id) as $product)
                                                @php
                                                    $displayPrice = '';
                                                    if ($selectedLocationId && !empty($product->location_prices) && isset($product->location_prices[(string)$selectedLocationId])) {
                                                        $displayPrice = $product->location_prices[(string)$selectedLocationId];
                                                    }
                                                @endphp
                                                <li class="{{ $displayPrice ? '' : 'menu-prize' }}">
                                                    <p>{{ $product->title }} <i>
                                                            {!! strip_tags($product->description) !!}
                                                        </i> </p>
                                                    @if ($displayPrice != '')
                                                        <span> ${{ number_format((float)$displayPrice, 2) }} </span>
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
            </div>
            @endif

            <div class="row">
            </div>
    </section>
    @include('pages.get-testimonials')
    @include('pages.location')

    <style>
        /* ── Location Selection Section ── */
        .location-selection-section {
            text-align: center;
            margin-bottom: 2.5rem;
            padding: 2rem 0;
        }
        .location-selection-title {
            color: #F7E8BF;
            font-size: 1.5rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.25rem;
        }
        .location-selection-subtitle {
            color: #aaa;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }
        .location-boxes {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }
        .location-box {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 280px;
            background: #1a1a1a;
            border: 2px solid #3a3a3a;
            border-radius: 12px;
            overflow: hidden;
            cursor: pointer;
            transition: border-color 0.3s, transform 0.2s, box-shadow 0.3s;
            padding: 0;
            color: #F7E8BF;
            text-align: center;
        }
        .location-box:hover {
            border-color: #C2333B;
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(194, 51, 59, 0.3);
        }
        .location-box.active {
            border-color: #C2333B;
            box-shadow: 0 0 0 3px rgba(194, 51, 59, 0.4);
        }
        .location-box-image {
            width: 100%;
            height: 180px;
            overflow: hidden;
            background: #111;
        }
        .location-box-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }
        .location-box:hover .location-box-image img {
            transform: scale(1.05);
        }
        .location-box-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #1a1a1a, #2a0a0a);
        }
        .location-box-placeholder .material-symbols-outlined {
            font-size: 3rem;
            color: #C2333B;
            opacity: 0.6;
        }
        .location-box-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 1.25rem;
            width: 100%;
            justify-content: center;
        }
        .location-box-pin {
            color: #C2333B;
            font-size: 1.3rem;
        }
        .location-box.active .location-box-pin {
            color: #F7E8BF;
        }
        .location-box-name {
            font-size: 1.05rem;
            font-weight: 600;
        }
        .location-box.active .location-box-info {
            background: #C2333B;
            color: #fff;
        }
        .location-box-check {
            position: absolute;
            top: 12px;
            right: 12px;
            font-size: 1.6rem;
            color: #fff;
            background: #C2333B;
            border-radius: 50%;
            padding: 2px;
        }

        /* ── Location badge ── */
        .location-badge-wrap {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        .location-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            background: #C2333B;
            color: #F7E8BF;
            padding: 0.35rem 0.85rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        /* ── Responsive ── */
        @media (max-width: 640px) {
            .location-boxes {
                flex-direction: column;
                align-items: center;
            }
            .location-box {
                width: 100%;
                max-width: 340px;
            }
        }
    </style>

@section('page_scripts')
<script>
    $(document).ready(function () {
        $(document).on('click', '.location-box', function () {
            var locationId = $(this).data('id');
            window.location.href = '{{ url("/our-menu") }}?location=' + locationId;
        });
    });
</script>
@endsection

@endsection
