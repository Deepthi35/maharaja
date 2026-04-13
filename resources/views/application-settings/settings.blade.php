@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        {{ $type->type }}
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        {{-- @include('flash::message') --}}

        @include('adminlte-templates::common.errors')

        <div class="card general_settings">

            {!! Form::open(['url' => 'admin/update-application-settings', 'files' => true]) !!}
            <input type="hidden" name="setting_type_id" value="{{ $type->id }}" />
            <input type="hidden" name="setting_type_slug" value="{{ $type->slug }}" />

            <div class="card-body">

                <div class="row animation-form">
                    @foreach ($settings as $setting)
                        @switch($setting->input_type)
                            @case('heading')
                                <div class="col-12">
                                    <h4 class="category-title">{{ $setting->field_name }}</h4>
                                </div>
                                @break
                            @case('color')
                                <div class="form-group col-sm-4">
                                    {!! Form::label($setting->id, $setting->field_name) !!}
                                    <div class="input-group colorpicker" id="{{ 'colorpicker' . $setting->id }}">
                                        <input type="text" class="form-control" name="{{ $setting->id }}" value="{{ isset($setting) ? $setting->value : '' }}">

                                        <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-square" style="{{ isset($setting) ? 'color:' . $setting->value : '' }}"></i></span>
                                        </div>
                                    </div>
                                </div>
                                @break
                            @case('textbox')
                                <div class="form-group col-sm-4">
                                    {!! Form::label($setting->id, $setting->field_name) !!}
                                    {!! Form::text($setting->id, $setting->value, ['class' => 'form-control']) !!}
                                </div>
                                @break
                            @case('select')
                                <div class="form-group col-sm-4">
                                    {!! Form::label($setting->id, $setting->field_name) !!}
                                    @php($options = explode(',', $setting->options))
                                    <select class="form-control select2" name="{{ $setting->id }}">
                                        <option value="">{{ 'Select ' . $setting->field_name }}</option>
                                        @foreach ($options as $option)
                                            <option value="{{ $option }}"
                                                {{ $option == $setting->value ? 'selected' : '' }}>{{ $option }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @break
                            @case('radio')
                                <div class="form-group col-sm-4">
                                    {!! Form::label($setting->id, $setting->field_name) !!}
                                    @php($options = explode(',', $setting->options))
                                    <div class="radio">
                                        @foreach ($options as $option)
                                            <label>
                                                {!! Form::radio('radio' . $setting->id, $option, $option == $setting->value) !!}
                                                {{ $option }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                @break
                            @case('checkbox')
                                <div class="form-group col-sm-4">
                                    {!! Form::label($setting->id, $setting->field_name) !!}
                                    @php($options = explode(', ', $setting->options))
                                    <div class="checkbox">
                                        @foreach ($options as $option)
                                            <label>
                                                {!! Form::checkbox('checkbox' . $setting->id . '[]', $option, in_array(trim($option), explode(',', $setting->value))) !!}
                                                {{ $option }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                @break
                            @case('textarea-normal')
                                <div class="form-group col-sm-12">
                                    {!! Form::label($setting->id, $setting->field_name) !!}
                                    {!! Form::textarea($setting->id, $setting->value, ['class' => 'form-control']) !!}
                                </div>
                                @break
                            @case('textarea')
                                <div class="form-group col-sm-12">
                                    {!! Form::label($setting->id, $setting->field_name) !!}
                                    {!! Form::textarea($setting->id, $setting->value, ['class' => 'form-control']) !!}
                                
                                    @include('common.editor', ['variable' => 'editor' . $setting->id, 'field' => $setting->id])
                                </div>
                                @break
                            @case('file')
                                @include('common.image.application-settings-image', ['field_label' => $setting->field_name, 'field_name' => $setting->id, 'data' => $setting->value, 'path' => APPLICATION_SETTING_IMAGE_PATH])
                                <div class="form-group col-sm-4">
                                    {!! Form::label('alt_text' . $setting->id, $setting->field_name . ' Alt Text') !!}
                                    {!! Form::text('alt_text' . $setting->id, $setting->alt_text, ['class' => 'form-control', 'placeholder' => 'Image Alt Text']) !!}
                                </div>
                                @break
                            @case('multiple-files')
                                @include('common.image.multiple-image', ['field_label' => $setting->field_name, 'field_name' => $setting->id, 'route' => 'admin/remove-multiple-image-item/' . $setting->id . '/', 'path' => APPLICATION_SETTING_IMAGE_PATH, 'data' => $setting->value])
                                @break
                            @case('switch')
                                <div class="form-group col-sm-4">
                                    <label>{{ $setting->field_name }}</label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input {{ $setting->id }}-toggle" id="customSwitch{{ $setting->id }}"
                                            name="switch-{{ $setting->id }}" {{ $setting->value ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customSwitch{{ $setting->id }}">&nbsp;</label>
                                    </div>
                                </div>
                                @break
                        @endswitch
                    @endforeach
                    <li class="nav-item"> <a href="{{ url('admin/settings?type=popup-settings') }}" class="nav-link {{ request()->input("type") == "popup-settings" ? "active" : "" }}">  </a> </li>

                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('applicationSettings.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection