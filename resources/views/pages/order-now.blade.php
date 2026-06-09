@extends('frontend.app')

@section('content')
<section class="location-selection-section">
    <div class="container">
        <div class="text-center">
            <h1 class="location-selection-title">Select a Location</h1>
            <p class="location-selection-subtitle">Choose your nearest branch to order online</p>
        </div>
        <div class="location-boxes">
            @foreach($locations as $location)
                @if($location->order_url)
                    <a href="{{ $location->order_url }}" target="_blank" class="location-box">
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
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</section>

<style>
    .location-selection-section {
        padding: 4rem 0;
        min-height: 60vh;
    }
    .location-selection-title {
        color: #F7E8BF;
        font-size: 2rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.5rem;
    }
    .location-selection-subtitle {
        color: #aaa;
        font-size: 1.1rem;
        margin-bottom: 3rem;
    }
    .location-boxes {
        display: flex;
        justify-content: center;
        gap: 2rem;
        flex-wrap: wrap;
    }
    .location-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 320px;
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
        transform: translateY(-8px);
        box-shadow: 0 12px 32px rgba(194, 51, 59, 0.4);
        color: #F7E8BF;
        text-decoration: none;
    }
    .location-box-image {
        width: 100%;
        height: 200px;
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
        padding: 1.5rem 1.25rem;
        width: 100%;
        justify-content: center;
    }
    .location-box-pin {
        color: #C2333B;
        font-size: 1.5rem;
    }
    .location-box-name {
        font-size: 1.2rem;
        font-weight: 600;
        color: #F7E8BF;
    }
</style>
@endsection
