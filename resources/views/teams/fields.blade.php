<!-- Team Categories Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('team_categories_id', 'Team Categories Id:') !!}
    {!! Form::select('team_categories_id',$categories, null, ['class' => 'form-control select2', 'required', 'placeholder' => 'Select Team Category', ]) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Image Field -->
@include('common.image.single-image', [
    'field_label' => 'Image',
    'field_name' => 'image',
    'field_id' =>  isset($team) ? $team->id : null,
    'model_name' => isset($team) ? class_basename($team) : null,
    'data' => isset($team) ? $team->image : null,
    'path' => TEAM_IMAGE_PATH,
])

<!-- Image Alt Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_alt_text', 'Image Alt Text:') !!}
    {!! Form::text('image_alt_text', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Designation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('designation', 'Designation:') !!}
    {!! Form::text('designation', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control editor', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Linkedin Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('linkedin_url', 'Linkedin Url:') !!}
    {!! Form::text('linkedin_url', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Facebook Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facebook_url', 'Facebook Url:') !!}
    {!! Form::text('facebook_url', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Instagram Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instagram_url', 'Instagram Url:') !!}
    {!! Form::text('instagram_url', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Twitter Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('twitter_url', 'Twitter Url:') !!}
    {!! Form::text('twitter_url', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Github Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('github_url', 'Github Url:') !!}
    {!! Form::text('github_url', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Other Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('other', 'Other:') !!}
    {!! Form::textarea('other', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>
{{-- 
<!-- Sort Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sort', 'Sort:') !!}
    {!! Form::number('sort', null, ['class' => 'form-control']) !!}
</div> --}}
@include('common.editor', ['variable' => 'editor1', 'field' => 'description'])
