<!-- Product Category Id Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('product_category_id', 'Product Category:'); ?>

    <?php echo Form::select('product_category_id', $categories, null, [
        'class' => 'form-control select2',
        'placeholder' => 'Select Product Category',
        'required',
    ]); ?>

</div>

<div class="form-group col-sm-6">
    <?php echo Form::label('location_id', 'Select Location'); ?>

    <?php echo Form::select('location_id[]', $locations, isset($product) ? $product->location_id : null, [
        'class' => 'form-control select2',
        'data-placeholder' => 'Select Location',
        'multiple' => 'multiple',
        'id' => 'location_id',
    ]); ?>

</div>


<!-- Title Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('title', 'Title:'); ?>

    <?php echo Form::text('title', null, [
        'class' => 'form-control',
        'required',
        'maxlength' => 255,
        'maxlength' => 255,
        'maxlength' => 255,
        'onkeyup' => 'convertToSlug()',
    ]); ?>

</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('slug', 'Slug:'); ?>

    <?php echo Form::text('slug', null, [
        'class' => 'form-control',
        'maxlength' => 255,
        'maxlength' => 255,
        'maxlength' => 255,
        'readonly',
    ]); ?>

</div>

<!-- Sub Title Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('sub_title', 'Price'); ?>

    <?php echo Form::text('sub_title', null, [
        'class' => 'form-control',
        'maxlength' => 255,
        'maxlength' => 255,
        'maxlength' => 255,
    ]); ?>

</div>

<!-- Location-wise Prices -->
<div class="form-group col-sm-12" id="location-prices-section" style="display: none;">
    <label><strong>Location-wise Prices</strong></label>
    <p class="text-muted small">Set a different price for each selected location. Leave blank to use the default price above.</p>
    <div id="location-prices-container" class="row">
    </div>
</div>

<!-- Post Date Field -->


<!-- Image Field -->


<!-- Image Alt Text Field -->




<!-- Short Description Field -->


<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    <?php echo Form::label('description', 'Description:'); ?>

    <?php echo Form::textarea('description', null, [
        'class' => 'form-control',
    ]); ?>


</div>

<!-- Special Product Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        <?php echo Form::hidden('special_product', 0, ['class' => 'form-check-input']); ?>

        <?php echo Form::checkbox('special_product', '1', null, ['class' => 'form-check-input']); ?>

        <?php echo Form::label('special_product', 'Popular Dishes', ['class' => 'form-check-label']); ?>

    </div>
</div>

<!-- Specifications table -->

<!-- Video Gallery Field -->


<!-- Video Url Field -->


<!-- Video Iframe Field -->


<!-- Custom Url Field -->


<!-- Map Url Field -->


<!-- Map Iframe Field -->


<!-- Page Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    <?php echo Form::label('page_title', 'Page Title:'); ?>

    <?php echo Form::textarea('page_title', null, [
        'class' => 'form-control',
        'maxlength' => 65535,
        'maxlength' => 65535,
        'maxlength' => 65535,
    ]); ?>

</div>

<!-- Seo Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    <?php echo Form::label('seo_title', 'Seo Title:'); ?>

    <?php echo Form::textarea('seo_title', null, [
        'class' => 'form-control',
        'maxlength' => 65535,
        'maxlength' => 65535,
        'maxlength' => 65535,
    ]); ?>

</div>

<!-- Seo Keywords Field -->
<div class="form-group col-sm-12 col-lg-12">
    <?php echo Form::label('seo_keywords', 'Seo Keywords:'); ?>

    <?php echo Form::textarea('seo_keywords', null, [
        'class' => 'form-control',
        'maxlength' => 65535,
        'maxlength' => 65535,
        'maxlength' => 65535,
    ]); ?>

</div>

<!-- Seo Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    <?php echo Form::label('seo_description', 'Seo Description:'); ?>

    <?php echo Form::textarea('seo_description', null, [
        'class' => 'form-control',
        'maxlength' => 65535,
        'maxlength' => 65535,
        'maxlength' => 65535,
    ]); ?>

</div>

<!-- Publish Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        <?php echo Form::hidden('publish', 0, ['class' => 'form-check-input']); ?>

        <?php echo Form::checkbox('publish', '1', null, ['class' => 'form-check-input']); ?>

        <?php echo Form::label('publish', 'Publish', ['class' => 'form-check-label']); ?>

    </div>
</div>





<?php echo $__env->make('common.string-to-slug', ['fieldName' => 'title'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('common.editor', ['variable' => 'editor1', 'field' => 'description'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('common.editor', ['variable' => 'editor1', 'field' => 'short_description'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('page_scripts'); ?>
    <script>
        function addRow(index) {
            $(".form_field_outer").append(`
                <?php echo $__env->make('products.specification_fields', ['i' => '`+index+`', 'empty' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            `);
        }
        if ($(".form_field_outer").find(".form_field_outer_row").length == 0) {
            addRow(1);
        }

        // Location-wise pricing
        var allLocations = <?php echo json_encode($locations, 15, 512) ?>;
        var existingPrices = <?php echo json_encode(isset($product) ? ($product->location_prices ?? []) : [], 15, 512) ?>;

        function updateLocationPrices() {
            var selectedIds = $('#location_id').val() || [];
            var container = $('#location-prices-container');
            var section = $('#location-prices-section');

            // Preserve any prices the user already typed in
            container.find('input').each(function() {
                var match = this.name.match(/location_prices\[(\d+)\]/);
                if (match && $(this).val() !== '') {
                    existingPrices[match[1]] = $(this).val();
                }
            });

            if (selectedIds.length === 0) {
                section.hide();
                container.html('');
                return;
            }

            section.show();
            container.html('');

            selectedIds.forEach(function(id) {
                var name = allLocations[id] || 'Location ' + id;
                var price = existingPrices[id] || '';
                container.append(
                    '<div class="col-sm-4 mb-3">' +
                        '<label class="font-weight-bold">' + name + '</label>' +
                        '<input type="text" name="location_prices[' + id + ']" value="' + price + '" class="form-control" placeholder="e.g. 12.99">' +
                    '</div>'
                );
            });
        }

        $(document).ready(function() {
            // Listen to both native change and select2 events
            $('#location_id').on('change select2:select select2:unselect', updateLocationPrices);
            // Run once on page load (setTimeout ensures select2 has initialized)
            setTimeout(updateLocationPrices, 300);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/products/fields.blade.php ENDPATH**/ ?>