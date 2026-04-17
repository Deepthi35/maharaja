<!-- Location Name Field -->
<div class="col-sm-12">
    {!! Form::label('location_name', 'Location Name:') !!}
    <p>{{ $location->location_name }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', 'Location Image:') !!}
    @if($location->image)
        <div class="mt-2">
            <img src="{{ asset(LOCATION_IMAGE_PATH . $location->image) }}" alt="{{ $location->location_name }}" style="max-height: 150px;">
        </div>
    @else
        <p>No image uploaded</p>
    @endif
</div>

<!-- Publish Field -->
<div class="col-sm-12">
    {!! Form::label('publish', 'Publish:') !!}
    <p>{{ $location->publish }}</p>
</div>

