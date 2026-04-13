<!-- Service Category Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('service_category_id', 'Service Category Id:') !!}
    {!! Form::select('service_category_id', $categories, null, [
        'class' => 'form-control select2',
        'placeholder' => 'Select Service Category',
        'required',
    ]) !!}
</div> --}}
<input type="hidden" name="service_category_id" value="{{ $serviceCategory->id }}" />

<input type="hidden" name="type" value="{{ request()->get('type') }}" />


<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, [
        'class' => 'form-control',
        'required',
        'maxlength' => 255,
        'maxlength' => 255,
        'maxlength' => 255,
        'onkeyup' => 'convertToSlug()',
    ]) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, [
        'class' => 'form-control',
        'maxlength' => 255,
        'maxlength' => 255,
        'maxlength' => 255,
        'readonly',
    ]) !!}
</div>

<!-- Sub Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_title', 'Sub Title:') !!}
    {!! Form::text('sub_title', null, [
        'class' => 'form-control',
        'maxlength' => 255,
        'maxlength' => 255,
        'maxlength' => 255,
    ]) !!}
</div>

<!-- Image Field -->
@include('common.image.single-image', [
    'field_label' => 'Image',
    'field_name' => 'image',
    'field_id' =>  isset($service) ? $service->id : null,
    'model_name' => isset($service) ? class_basename($service) : null, 
    'data' => isset($service) ? $service->image : null,
    'path' => SERVICE_IMAGE_PATH,
])

<!-- Image Alt Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_alt_text', 'Image Alt Text:') !!}
    {!! Form::text('image_alt_text', null, [
        'class' => 'form-control',
        'maxlength' => 255,
        'maxlength' => 255,
        'maxlength' => 255,
    ]) !!}
</div>

<!-- Short Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('short_description', 'Short Description:') !!}
    {!! Form::textarea('short_description', null, [
        'class' => 'form-control editor',
        'maxlength' => 65535,
        'maxlength' => 65535,
        'maxlength' => 65535,
    ]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, [
        'class' => 'form-control editor',
        'maxlength' => 65535,
        'maxlength' => 65535,
        'maxlength' => 65535,
    ]) !!}
</div>

<!-- Custom Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('custom_url', 'Custom Url:') !!}
    {!! Form::text('custom_url', null, [
        'class' => 'form-control',
        'maxlength' => 255,
        'maxlength' => 255,
        'maxlength' => 255,
    ]) !!}
</div>

<!-- New Window Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('new_window', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('new_window', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('new_window', 'New Window', ['class' => 'form-check-label']) !!}
    </div>
</div>

<!-- Gallery Field -->
@include('common.image.multiple-image', [
    'field_label' => 'gallery',
    'field_name' => 'gallery',
    'route' => isset($service) ? 'admin/remove-multiple-service-image-item/' . $service->id . '/' : null,
    'path' => SERVICE_IMAGE_PATH,
    'data' => isset($service) ? $service->gallery : null,
])

<!-- Video Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('video_url', 'Video Url:') !!}
    {!! Form::text('video_url', null, [
        'class' => 'form-control',
        'maxlength' => 255,
        'maxlength' => 255,
        'maxlength' => 255,
    ]) !!}
</div>

<!-- Video Iframe Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('video_iframe', 'Video Iframe:') !!}
    {!! Form::textarea('video_iframe', null, [
        'class' => 'form-control',
        'maxlength' => 65535,
        'maxlength' => 65535,
        'maxlength' => 65535,
    ]) !!}
</div>

<!-- Page Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('page_title', 'Page Title:') !!}
    {!! Form::textarea('page_title', null, [
        'class' => 'form-control',
        'maxlength' => 65535,
        'maxlength' => 65535,
        'maxlength' => 65535,
    ]) !!}
</div>

<!-- Seo Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('seo_title', 'Seo Title:') !!}
    {!! Form::textarea('seo_title', null, [
        'class' => 'form-control',
        'maxlength' => 65535,
        'maxlength' => 65535,
        'maxlength' => 65535,
    ]) !!}
</div>

<!-- Seo Keywords Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('seo_keywords', 'Seo Keywords:') !!}
    {!! Form::textarea('seo_keywords', null, [
        'class' => 'form-control',
        'maxlength' => 65535,
        'maxlength' => 65535,
        'maxlength' => 65535,
    ]) !!}
</div>

<!-- Seo Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('seo_description', 'Seo Description:') !!}
    {!! Form::textarea('seo_description', null, [
        'class' => 'form-control',
        'maxlength' => 65535,
        'maxlength' => 65535,
        'maxlength' => 65535,
    ]) !!}
</div>

<!-- Publish Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('publish', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('publish', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('publish', 'Publish', ['class' => 'form-check-label']) !!}
    </div>
</div>

<!-- Icon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('icon', 'Icon:') !!}
    {!! Form::text('icon', null, [
        'class' => 'form-control',
        
        'maxlength' => 255,
        'maxlength' => 255,
        'maxlength' => 255,
    ]) !!}
</div>

@include('common.string-to-slug', ['fieldName' => 'title'])
@include('common.editor', ['variable' => 'editor1', 'field' => 'description', 'short_description'])
@include('common.editor', ['variable' => 'editor1', 'field' => 'short_description'])


