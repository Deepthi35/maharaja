

<?php
    $hoursLocations = App\Models\Location::where('publish', 1)->orderBy('id')->get();
    $hoursSlugs     = ['hours-of-operation', 'location-2-hours-of-operation'];
    $hasTwo         = $hoursLocations->count() > 1
                      && applicationSettings('location-2-hours-of-operation');
?>

<?php if($hoursLocations->isNotEmpty()): ?>
<div class="container">

    <div class="card card-body border-0 o-hidden bg-primary text-light delivered hours-of-operation">
    <h3 class="text-left text-white mb-3">Hours of Operations</h3>


        <?php if($hasTwo): ?>
            
            <div class="hours-two-col">
                <?php $__currentLoopData = $hoursLocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $slug = $hoursSlugs[$index] ?? null; ?>
                    <?php if($slug && applicationSettings($slug)): ?>
                        <div class="hours-location-block">
                            <div class="hours-location-name">
                                <span class="material-symbols-outlined">location_on</span>
                                <?php echo e($loc->location_name); ?>

                            </div>
                            <?php echo applicationSettings($slug); ?>

                        </div>
                        <?php if(!$loop->last): ?>
                            <div class="hours-divider"></div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            
            <div class="row">
                <div class="col-md-7">
                    <?php echo applicationSettings('hours-of-operation'); ?>

                </div>
            </div>
        <?php endif; ?>

        <figure class="delivered-pic">
            <img src="<?php echo e(asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('get-your-favourite-image'))); ?>"
                 alt="<?php echo e(applicationSettingsAltText('get-your-favourite-image')); ?>" />
        </figure>
    </div>
</div>
<?php endif; ?>

<style>
    .hours-two-col {
        display: flex;
        align-items: flex-start;
        gap: 0;
        max-width: 65%;
    }
    .hours-location-block {
        flex: 1;
        padding-right: 30px;
    }
    .hours-location-name {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(0,0,0,0.35);
        color: #FFD54F;
        font-size: 22px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        padding: 8px 20px;
        border-radius: 25px;
        margin-bottom: 18px;
    }
    .hours-location-name .material-symbols-outlined { font-size: 24px; }
    .hours-of-operation .hours-location-block h1,
    .hours-of-operation .hours-location-block h2,
    .hours-of-operation .hours-location-block h3,
    .hours-of-operation .hours-location-block h4,
    .hours-of-operation .hours-location-block h5,
    .hours-of-operation .hours-location-block h6 {
        font-size: 18px;
        line-height: 1.3;
        font-weight: 600;
        margin-bottom: 10px;
    }
    .hours-of-operation .hours-location-block p,
    .hours-of-operation .hours-location-block ul li,
    .hours-of-operation .hours-location-block ul li span,
    .hours-of-operation .hours-location-block ul li strong {
        font-size: 14px;
        line-height: 1.5;
        font-weight: 400;
    }
    .hours-of-operation .hours-location-block ul li span {
        font-weight: 600;
        min-width: auto;
    }
    .hours-of-operation .col-md-7 h1,
    .hours-of-operation .col-md-7 h2,
    .hours-of-operation .col-md-7 h3,
    .hours-of-operation .col-md-7 h4 {
        font-size: 18px;
        line-height: 1.3;
        font-weight: 600;
        margin-bottom: 10px;
    }
    .hours-of-operation .col-md-7 ul li,
    .hours-of-operation .col-md-7 ul li span,
    .hours-of-operation .col-md-7 p {
        font-size: 14px;
        line-height: 1.5;
    }
    .hours-of-operation .col-md-7 ul li span {
        font-weight: 600;
        min-width: auto;
    }
    .hours-divider {
        width: 1px;
        align-self: stretch;
        background: rgba(255,255,255,0.25);
        margin: 0 30px 0 0;
        flex-shrink: 0;
    }
    @media(max-width: 768px) {
        .hours-two-col { flex-direction: column; max-width: 100%; }
        .hours-divider { width: 100%; height: 1px; margin: 20px 0; }
        .hours-location-block { padding-right: 0; }
    }
</style>
<?php /**PATH /var/www/test/maharaja/resources/views/pages/hours-of-operation.blade.php ENDPATH**/ ?>