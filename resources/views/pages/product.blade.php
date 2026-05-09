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
            {{-- Location Selection - shown when no location selected --}}
            <div class="location-selection-section">
                <h3 class="text-white">Select a branch to view its menu</h3>
                <div class="location-boxes">
                    @foreach($locations as $location)
                        <form action="{{ route('set.location') }}" method="POST" class="location-box-form">
                            @csrf
                            <input type="hidden" name="location_id" value="{{ $location->id }}">
                            <button type="submit" class="location-box">
                                <div class="location-box-image">
                                    @if($location->image)
                                        <img src="{{ asset(LOCATION_IMAGE_PATH . $location->image) }}" alt="{{ $location->location_name }}">
                                    @else
                                        <div class="location-box-placeholder">
                                            <span class="location-box-placeholder-name">{{ $location->location_name }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="location-box-info">
                                    <span class="material-symbols-outlined location-box-pin">location_on</span>
                                    <span class="location-box-name">{{ $location->location_name }}</span>
                                </div>
                            </button>
                        </form>
                    @endforeach
                </div>
            </div>
            @else
            {{-- Location Tabs + Menu - shown after location is selected --}}
            @if($locations->count() > 1)
            <div class="location-tabs">
                @foreach($locations as $location)
                    <form action="{{ route('set.location') }}" method="POST" class="location-tab-form">
                        @csrf
                        <input type="hidden" name="location_id" value="{{ $location->id }}">
                        <button type="submit" class="location-tab {{ $selectedLocationId == $location->id ? 'active' : '' }}">
                            <span class="material-symbols-outlined location-tab-icon">location_on</span>
                            {{ $location->location_name }}
                        </button>
                    </form>
                @endforeach
            </div>
            @endif

            <div id="menuContent">

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
        /* ── Location Selection ── */
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
            text-decoration: none;
            text-align: center;
        }
        .location-box:hover {
            border-color: #C2333B;
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(194, 51, 59, 0.3);
            color: #F7E8BF;
            text-decoration: none;
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
        .location-box-placeholder-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: #F7E8BF;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            text-align: center;
            padding: 1rem;
            line-height: 1.3;
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
        .location-box-name {
            font-size: 1.05rem;
            font-weight: 600;
        }

        /* ── Location Tabs ── */
        .location-tabs {
            display: flex;
            justify-content: center;
            gap: 0;
            margin-bottom: 2rem;
            border-bottom: 2px solid #3a3a3a;
        }
        .location-tab-form {
            margin: 0;
        }
        .location-tab {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.75rem 1.5rem;
            color: #aaa;
            font-size: 1rem;
            font-weight: 600;
            background: none;
            border: none;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            transition: color 0.25s, border-color 0.25s;
            margin-bottom: -2px;
        }
        .location-tab:hover {
            color: #F7E8BF;
        }
        .location-tab.active {
            color: #F7E8BF;
            border-bottom-color: #C2333B;
        }
        .location-tab-icon {
            font-size: 1.2rem;
        }
        .location-tab.active .location-tab-icon {
            color: #C2333B;
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
            .location-tabs {
                flex-wrap: wrap;
            }
            .location-tab {
                flex: 1;
                justify-content: center;
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }
        }
    </style>




@endsection
