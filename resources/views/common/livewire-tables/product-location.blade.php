<div class="product-location-checks">
    @foreach($locations as $locId => $locName)
        <div class="d-flex align-items-center mb-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox"
                       class="custom-control-input"
                       id="loc_{{ $id }}_{{ $locId }}"
                       wire:click="toggleProductLocation({{ $id }}, '{{ $locId }}')"
                       {{ in_array((string)$locId, $locationIds) ? 'checked' : '' }}>
                <label class="custom-control-label" for="loc_{{ $id }}_{{ $locId }}">
                    {{ $locName }}
                </label>
            </div>
            @if(in_array((string)$locId, $locationIds))
                <input type="text"
                       class="form-control form-control-sm ml-2"
                       style="width: 90px;"
                       placeholder="Price"
                       value="{{ $locationPrices[(string)$locId] ?? '' }}"
                       wire:change="updateLocationPrice({{ $id }}, '{{ $locId }}', $event.target.value)">
            @endif
        </div>
    @endforeach
</div>
