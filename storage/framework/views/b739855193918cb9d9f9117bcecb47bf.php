<section class="map-block bg-dark text-light">
    <div class="container">
        <?php echo applicationSettings('footer-contact-map-iframe'); ?>

        <div class="row get-in-touch">
            <div class="col-md-4">
                <div class="card card-body bg-primary text-light">
                    <div class="inner">
                        <?php echo applicationSettings('footer-contact-short-description'); ?>

                        <ul>
                            <li><span class="material-symbols-outlined">
                                    call
                                </span> <a href="tel:<?php echo e(applicationSettings('primary-phone-number')); ?>"><span>Phone
                                        Number</span><?php echo e(applicationSettings('primary-phone-number')); ?></a></li>
                            <li><span class="material-symbols-outlined">
                                    mail
                                </span> <a
                                    href="mailto:<?php echo e(applicationSettings('primary-mail')); ?>"><span>Email</span><?php echo e(applicationSettings('primary-mail')); ?></a>
                            </li>
                            <li><span class="material-symbols-outlined">
                                    pace
                                </span> <a href="<?php echo e(url('/contact')); ?>"><span>Opening
                                        Hours</span><?php echo applicationSettings('opening-hours'); ?></a></li>
                            <li><span class="material-symbols-outlined">
                                    add_location_alt
                                </span> <a href="<?php echo e(url('/contact')); ?>"><span>Map
                                        Location</span><?php echo applicationSettings('map-location'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/pages/location.blade.php ENDPATH**/ ?>