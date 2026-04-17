

@php
    $hoursLocations = App\Models\Location::where('publish', 1)->orderBy('id')->get();
    $hoursSlugs     = ['hours-of-operation', 'location-2-hours-of-operation'];
    $hasTwo         = $hoursLocations->count() > 1
                      && applicationSettings('location-2-hours-of-operation');
@endphp

@if($hoursLocations->isNotEmpty())
<div class="container">
    <div class="card card-body border-0 o-hidden bg-primary text-light delivered hours-of-operation">

        @if($hasTwo)
            {{-- Two locations side by side --}}
            <div class="hours-two-col">
                @foreach($hoursLocations as $index => $loc)
                    @php $slug = $hoursSlugs[$index] ?? null; @endphp
                    @if($slug && applicationSettings($slug))
                        <div class="hours-location-block">
                            <div class="hours-location-name">
                                <span class="material-symbols-outlined">location_on</span>
                                {{ $loc->location_name }}
                            </div>
                            {!! applicationSettings($slug) !!}
                        </div>
                        @if(!$loop->last)
                            <div class="hours-divider"></div>
                        @endif
                    @endif
                @endforeach
            </div>
        @else
            {{-- Single location (original layout) --}}
            <div class="row">
                <div class="col-md-7">
                    {!! applicationSettings('hours-of-operation') !!}
                </div>
            </div>
        @endif

        <figure class="delivered-pic">
            <img src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('get-your-favourite-image')) }}"
                 alt="{{ applicationSettingsAltText('get-your-favourite-image') }}" />
        </figure>
    </div>
</div>
@endif

<style>
    .hours-two-col {
        display: flex;
        align-items: flex-start;
        gap: 0;
        max-width: 65%;
    }
    .hours-location-block {
        flex: 1;
        padding-right: 30px;
    }
    .hours-location-name {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(0,0,0,0.35);
        color: #FFD54F;
        font-size: 22px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        padding: 8px 20px;
        border-radius: 25px;
        margin-bottom: 18px;
    }
    .hours-location-name .material-symbols-outlined { font-size: 24px; }
    .hours-divider {
        width: 1px;
        align-self: stretch;
        background: rgba(255,255,255,0.25);
        margin: 0 30px 0 0;
        flex-shrink: 0;
    }
    @media(max-width: 768px) {
        .hours-two-col { flex-direction: column; max-width: 100%; }
        .hours-divider { width: 100%; height: 1px; margin: 20px 0; }
        .hours-location-block { padding-right: 0; }
    }
</style>
