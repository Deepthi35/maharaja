<!-- Clientele Category Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('clientele_category_id', 'Clientele Category:') !!}
    {!! Form::select('clientele_category_id', $categories, null, [
        'class' => 'form-control select2',
        'placeholder' => 'Select Clientele Category',
        'required',
    ]) !!}
</div> --}}
<input type="hidden" name="clientele_category_id" value="{{ $clienteleCategory->id }}" />

<input type="hidden" name="type" value="{{ request()->get('type') }}" />

<!-- Image Field -->
@include('common.image.single-image', [
    'field_label' => 'Image',
    'field_name' => 'image',
    'field_id' =>  isset($clientele) ? $clientele->id : null,
    'model_name' => isset($clientele) ? class_basename($clientele) : null,
    'data' => isset($clientele) ? $clientele->image : 'null',
    'path' => CLIENTELE_IMAGE_PATH,
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

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, [
        'class' => 'form-control',
        'maxlength' => 255,
        'maxlength' => 255,
        'maxlength' => 255,
    ]) !!}
</div>
<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::text('url', null, [
        'class' => 'form-control',
        'maxlength' => 255,
        'maxlength' => 255,
        'maxlength' => 255,
    ]) !!}
</div>

<!-- Sub Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('sub_title', 'Description:') !!}
    {!! Form::textarea('sub_title', null, [
        'class' => 'form-control',
        'maxlength' => 65535,
        'maxlength' => 65535,
        'maxlength' => 65535,
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

<!-- Publish Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('publish', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('publish', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('publish', 'Publish', ['class' => 'form-check-label']) !!}
    </div>
</div>

<!-- Sort Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sort', 'Sort:') !!}
    {!! Form::number('sort', null, ['class' => 'form-control']) !!}
</div>
