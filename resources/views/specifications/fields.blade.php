<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::number('product_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Specification Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('specification_name', 'Specification Name:') !!}
    {!! Form::text('specification_name', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Specification Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('specification_value', 'Specification Value:') !!}
    {!! Form::text('specification_value', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>