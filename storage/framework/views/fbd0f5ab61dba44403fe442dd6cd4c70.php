<div class="product-location-checks">
    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locId => $locName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="d-flex align-items-center mb-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox"
                       class="custom-control-input"
                       id="loc_<?php echo e($id); ?>_<?php echo e($locId); ?>"
                       wire:click="toggleProductLocation(<?php echo e($id); ?>, '<?php echo e($locId); ?>')"
                       <?php echo e(in_array((string)$locId, $locationIds) ? 'checked' : ''); ?>>
                <label class="custom-control-label" for="loc_<?php echo e($id); ?>_<?php echo e($locId); ?>">
                    <?php echo e($locName); ?>

                </label>
            </div>
            <?php if(in_array((string)$locId, $locationIds)): ?>
                <input type="text"
                       class="form-control form-control-sm ml-2"
                       style="width: 90px;"
                       placeholder="Price"
                       value="<?php echo e($locationPrices[(string)$locId] ?? ''); ?>"
                       wire:change="updateLocationPrice(<?php echo e($id); ?>, '<?php echo e($locId); ?>', $event.target.value)">
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/common/livewire-tables/product-location.blade.php ENDPATH**/ ?>