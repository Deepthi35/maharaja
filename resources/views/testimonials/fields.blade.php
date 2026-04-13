
<!-- Testimonial Category Id Field -->
<div class="form-group col-sm-6 select-area">
    {!! Form::label('testimonial_category', 'Category') !!}
    {!! Form::select('testimonial_category_id', $categories, null, ['class' => 'form-control select2', 'placeholder' => 'Select Testimonial Category','required']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Author:') !!}
    {!! Form::text('name', isset($testimonial) ? $testimonial->name: null, ['class' => 'form-control ', 'required', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Image Field -->
@include('common.image.single-image', [
    'field_label' => 'Image',
    'field_name' => 'image',
    'field_id' =>  isset($testimonial) ? $testimonial->id : null,
    'model_name' => isset($testimonial) ? class_basename($testimonial) : null,
    'data' => isset($testimonial) ? $testimonial->image : null,
    'path' => TESTIMONIAL_IMAGE_PATH,
])

<!-- Image Alt Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_alt_text', 'Image Alt Text:') !!}
    {!! Form::text('image_alt_text',isset($testimonial) ? $testimonial->image_alt_text: null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>




<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', isset($testimonial) ? $testimonial->description : null, ['class' => 'form-control editor', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>


<!-- Company Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('company', 'Company:') !!}
    {!! Form::text('company', isset($testimonial) ? $testimonial->company: null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div> --}}

<!-- Designation Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('designation', 'Designation:') !!}
    {!! Form::text('designation', isset($testimonial) ? $testimonial->designation : null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div> --}}

<!-- Date Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', isset($testimonial) ? $testimonial->date: null, ['class' => 'form-control','id'=>'date']) !!}
</div> --}}

{{-- @push('page_scripts')
    <script type="text/javascript">
        $('#date').datepicker()
    </script>
@endpush --}}



<!-- Icon Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('icon', 'Icon:') !!}
    {!! Form::text('icon', isset($testimonial) ? $testimonial->icon: null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div> --}}

<!-- Video Url Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('video_url', 'Video Url:') !!}
    {!! Form::text('video_url', isset($testimonial) ? $testimonial->video_url: null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div> --}}

<!-- Video Iframe Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('video_iframe', 'Video Iframe:') !!}
    {!! Form::text('video_iframe', isset($testimonial) ? $testimonial->video_iframe: null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div> --}}

<!-- Short Description Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('short_description', 'Short Description:') !!}
    {!! Form::textarea('short_description', isset($testimonial) ? $testimonial->short_description : null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div> --}}



<!-- Custom Url Field -->
{{-- <div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('custom_url', 'Custom Url:') !!}
    {!! Form::textarea('custom_url', isset($testimonial) ? $testimonial->custom_url: null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div> --}}

<!-- New Window Field -->
{{-- <div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('new_window', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('new_window', '1', isset($testimonial) ? $testimonial->new_window: null, ['class' => 'form-check-input']) !!}
        {!! Form::label('new_window', 'New Window', ['class' => 'form-check-label']) !!}
    </div>
</div> --}}



{{-- @include('common.editor', ['variable' => 'editor1', 'field' =>  'short_description']) --}}

@include('common.editor', ['variable' => 'editor1', 'field' => 'description'])

