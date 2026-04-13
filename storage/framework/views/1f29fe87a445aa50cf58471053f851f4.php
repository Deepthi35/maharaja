<?php if(applicationSettings('hours-of-operation') != ''): ?>
<div class="container">
<div class="card card-body border-0 o-hidden bg-primary text-light delivered hours-of-operation">
    <div class="row">
        <div class="col-md-7">
            <?php echo applicationSettings('hours-of-operation'); ?>

        </div>
    </div>
    <figure class="delivered-pic">    <img 
        src="<?php echo e(asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('get-your-favourite-image'))); ?>"
        alt="<?php echo e(applicationSettingsAltText('get-your-favourite-image')); ?>" /> </figure>
</div>
</div>
<?php endif; ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/pages/hours-of-operation.blade.php ENDPATH**/ ?>