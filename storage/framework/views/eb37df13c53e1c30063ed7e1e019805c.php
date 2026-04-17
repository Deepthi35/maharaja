<div class="row form_field_outer_row items_row<?php echo e($i); ?>">
    <div class="form-group col-md-1" style="max-width: 100px">
        <label>S.no</label>
        <p><?php echo e($i); ?></p>
    </div>

    <!-- Product Id Field -->
    

    <!-- Specification Name Field -->
    <div class="form-group col-sm-3">
        <?php echo Form::label('specification_name', 'Specification Name', ['class' => 'span-required']); ?>

        <?php echo Form::text('specification_name[]', isset($details) && !isset($empty) ? $details->specification_name : null, [
            'class' => 'form-control',
        ]); ?>

    </div>

    <!-- Specification Value Field -->
    <div class="form-group col-sm-3">
        <?php echo Form::label('specification_value', 'Specification Value', ['class' => 'span-required']); ?>

        <?php echo Form::text(
            'specification_value[]',
            isset($details) && !isset($empty) ? $details->specification_value : null,
            [
                'class' => 'form-control',
            ],
        ); ?>

    </div>

    <div class="form-group col add_del_btn_outer " >
     
        <button type="button" class="btn btn-secondary add_new_frm_field_btn custom-tooltip add-tooltip">
            <span class="material-symbols-outlined">Add</span>

        </button>
        <button type="button" class="btn btn-danger remove_node_btn_frm_field custom-tooltip remove-tooltip">
            <span class="material-symbols-outlined">Remove</span>

        </button>
    </div>
<?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/products/specification_fields.blade.php ENDPATH**/ ?>