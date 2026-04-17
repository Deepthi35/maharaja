<!-- Location Name Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('location_name', 'Location Name:'); ?>

    <?php echo Form::text('location_name', null, ['class' => 'form-control', 'required', 'maxlength' => 255]); ?>

</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('image', 'Location Image:'); ?>

    <?php echo Form::file('image', ['class' => 'form-control', 'accept' => 'image/*']); ?>

    <?php if(isset($location) && $location->image): ?>
        <div class="mt-2">
            <img src="<?php echo e(asset(LOCATION_IMAGE_PATH . $location->image)); ?>" alt="<?php echo e($location->location_name); ?>" style="max-height: 100px;">
        </div>
    <?php endif; ?>
</div>

<!-- Publish Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        <?php echo Form::hidden('publish', 0, ['class' => 'form-check-input']); ?>

        <?php echo Form::checkbox('publish', '1', null, ['class' => 'form-check-input']); ?>

        <?php echo Form::label('publish', 'Publish', ['class' => 'form-check-label']); ?>

    </div>
</div><?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/locations/fields.blade.php ENDPATH**/ ?>