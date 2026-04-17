<!-- Location Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location_name', 'Location Name:') !!}
    {!! Form::text('location_name', null, ['class' => 'form-control', 'required', 'maxlength' => 255]) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Location Image:') !!}
    {!! Form::file('image', ['class' => 'form-control', 'accept' => 'image/*']) !!}
    @if(isset($location) && $location->image)
        <div class="mt-2">
            <img src="{{ asset(LOCATION_IMAGE_PATH . $location->image) }}" alt="{{ $location->location_name }}" style="max-height: 100px;">
        </div>
    @endif
</div>

<!-- Publish Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('publish', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('publish', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('publish', 'Publish', ['class' => 'form-check-label']) !!}
    </div>
</div>