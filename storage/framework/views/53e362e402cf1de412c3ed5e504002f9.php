<?php $__env->startSection('title'); ?>
    <?php echo e($page->title ?? null); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('seotitle'); ?>
    <?php echo e($page->seo_title ?? null); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('seodescription'); ?>
    <?php echo e($page->seo_description ?? null); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('seokeywords'); ?>
    <?php echo e($page->seo_keywords ?? null); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if($sliders->count() > 0): ?>
        <section class="home-slider has-divider text-light  bg-dark">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <div class="container">
                        <div class="row align-items-center justify-content-between o-hidden">
                            <div class="col-md-6 aos-init aos-animate" data-aos="fade-left">
                                <div class="inner-pic">
                                    <figure> <img src="<?php echo e(asset(SLIDER_IMAGE_PATH . $slider->image)); ?>"
                                            alt="<?php echo e($slider->image_alt_text); ?>">
                                    </figure>
                                </div>
                            </div>
                            <?php if($slider->title || $slider->tagline || $slider->button_name || $slider->button_url): ?>
                                <div class="col-md-6 text-end text-right  ">
                                    <?php if($slider->title): ?>
                                        <?php if($index == 0): ?>
                                            <h1 class="display-1"><?php echo $slider->title; ?></h1>
                                        <?php else: ?>
                                            <h2 class="display-1"><?php echo $slider->title; ?></h2>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($slider->tagline): ?>
                                        <p class="lead"><?php echo $slider->tagline; ?></p>
                                    <?php endif; ?>
                                    <?php if($slider->button_name && $slider->button_url): ?>
                                        <a href="<?php echo e($slider->button_url); ?>" class="btn btn-secondary btn-lg"
                                            target="<?php echo e($slider->new_window ? '_target' : ''); ?>">
                                            <?php echo e($slider->button_name); ?>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </section>
    <?php endif; ?>
    <section class="bg-secondary about">
        <figure class="pos-pic about-left-pic"><img src="<?php echo e(asset('images/about-bg.svg')); ?>" alt="about bg image" />
        </figure>
        <figure class="pos-pic about-right-pic"><img src="<?php echo e(asset('images/about-bg.svg')); ?>" alt="about bg image" />
        </figure>
        <div class="container">
            <div class="row justify-content-between o-hidden">
                <div class="col-md-7">
                    <h2 class="section-title">
                        <?php echo applicationSettings('welcome-title'); ?>

                    </h2>
                    <?php echo applicationSettings('welcome-description'); ?>

                    <a class="btn btn-secondary"
                        href="<?php echo e(applicationSettings('welcome-button-url')); ?>"><?php echo applicationSettings('welcome-button-text'); ?></a>
                </div>
                <div class="col-md-5 about-left" data-aos="fade-left">
                    <div
                        data-flickity='{ "autoPlay": true, "imagesLoaded": true, "wrapAround": true, "prevNextButtons": false }'>
                        <?php ($data = applicationSettings('welcome-gallery')); ?>
                        <?php if($data ): ?>
                        <?php $__currentLoopData = json_decode($data, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="carousel-cell mx-3 pb-1">
                                <figure class="m-0">
                                    <img src="<?php echo e(asset(APPLICATION_SETTING_IMAGE_PATH . $image['path'])); ?>"
                                        alt="<?php echo e($image['alt_text']); ?>">
                                </figure>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-dark vintage text-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-4">
                    <h2 class="section-title text-light"><?php echo applicationSettings('classic-vintage-title'); ?></h2>
                </div>
                <div class="col-md-8">
                    <div class="v-inner lead">
                        <?php echo applicationSettings('classic-vintage-description'); ?>

                    </div>
                </div>
            </div>
            <div class="row min-vh-70 mb-3">
                <div class="col-4">
                    <div class="h-100 vintage-left-pic">
                        <figure class="m-0 left-pic ">
                            <img class="object-fit-cover  w-100 h-100"
                                src="<?php echo e(asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('classic-vintage-image-1'))); ?>"
                                alt="<?php echo e(applicationSettingsAltText('classic-vintage-image-1')); ?>" />
                        </figure>
                    </div>
                </div>
                <div class="col-8 d-flex flex-column">
                    <div class="row flex-grow-1">
                        <div class="col-6">
                            <div class="h-100  vintage-right-pic">
                                <figure class="m-0 h-100">
                                    <img class="object-fit-cover  w-100 h-100"
                                        src="<?php echo e(asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('classic-vintage-image-2'))); ?>"
                                        alt="<?php echo e(applicationSettingsAltText('classic-vintage-image-2')); ?>" />
                                </figure>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="h-100 vintage-right-pic">
                                <figure class="m-0 h-100 ">
                                    <img class="object-fit-cover  w-100 h-100"
                                        src="<?php echo e(asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('classic-vintage-image-3'))); ?>"
                                        alt="<?php echo e(applicationSettingsAltText('classic-vintage-image-3')); ?>" />
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 flex-grow-1">
                        <div class="col-6">
                            <div class="h-100 vintage-right-pic">
                                <figure class="m-0 h-100 ">
                                    <img class="object-fit-cover  w-100 h-100"
                                        src="<?php echo e(asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('classic-vintage-image-4'))); ?>"
                                        alt="<?php echo e(applicationSettingsAltText('classic-vintage-image-4')); ?>" />
                                </figure>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="h-100 vintage-right-pic">
                                <div class="card card-body h-100 bg-primary border-radius-0 text-center">
                                    <div class="flex-grow-1">
                                        <div class="h3"><?php echo applicationSettings('open-everyday-title'); ?></div>
                                        <?php echo applicationSettings('open-everyday-description'); ?>

                                    </div>
                                    <?php if(applicationSettings('open-everyday-button') != ''): ?>
                                        <a href="tel:<?php echo applicationSettings('open-everyday-url'); ?>"
                                            class="btn btn-outline-white"><?php echo applicationSettings('open-everyday-button'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('pages.our-popular-dishes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="bg-dark text-light food-menu">
        <div class="container">
            <div class="card card-body border-0 o-hidden bg-primary text-light delivered ">
                <div class="row">
                    <div class="col-md-7">
                        <h3><?php echo applicationSettings('get-your-favourite-title'); ?></h3>
                        <?php echo applicationSettings('get-your-favourite-descriptiion'); ?>

                        <?php if(applicationSettings('get-your-favourite-button') != ''): ?>
                            <a href="<?php echo applicationSettings('get-your-favourite-button-url'); ?>"
                                class="btn btn-white text-uppercase customize-btn"><?php echo applicationSettings('get-your-favourite-button'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <figure class="delivered-pic">
                    
                    <img 
                    src="<?php echo e(asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('get-your-favourite-image'))); ?>"
                    alt="<?php echo e(applicationSettingsAltText('get-your-favourite-image')); ?>" />
                    
                    


                </figure>
            </div>
            <div class="card card-body border-0 o-hidden bg-primary text-light food-list">
                <h2 class="text-center section-title">Menu A LA Carte</h2>
                <div class="row menu-list">
                    <?php if($featuredCategories->count() > 0): ?>
                        <?php $__currentLoopData = $featuredCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="<?php echo e($featuredCategory->type == 'as-for-cat' ? 'as-for-cat' : 'col-md-4 block'); ?> <?php echo e($featuredCategory->type == 'as-nav-cat' ? 'as-nav-cat' : 'col-md-4 block'); ?> col-md-4 block">
                                <h2 class="product-title"><?php echo e($featuredCategory->name); ?></h2>
                                <ul>
                                    <?php $__currentLoopData = $featuredCategory->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="<?php echo e($product->sub_title ? '' : 'menu-prize'); ?>">
                                            <em><?php echo e($product->title); ?></em>
                                            <?php if($product->sub_title != ''): ?>
                                                <span> <?php echo e($product->sub_title); ?> </span>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>

                <?php if(applicationSettings('our-menu-text-url') != ''): ?>
                <div class="text-center mt-5">
                    <a href="<?php echo e(applicationSettings('our-menu-text-url')); ?>" class="btn btn-white text-uppercase"><?php echo e(applicationSettings('our-menu-text')); ?></a>
                </div>
                <?php endif; ?>

            </div>
            <div class="party-orders mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-body bg-primary text-light">
                            <div class="inner">
                                <h3><?php echo applicationSettings('from-small-to-large-title'); ?></h3>
                                <?php echo applicationSettings('from-small-to-large-description'); ?>

                                <div class=" mt-3">
                                <?php if(applicationSettings('from-small-text-url') != ''): ?>
                                    <a class="btn btn-white text-uppercase"
                                        href="<?php echo e(applicationSettings('from-small-text-url')); ?>"><?php echo applicationSettings('from-small-text'); ?></a>
                                <?php endif; ?>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 party-orders-right">
                        <div class="card">
                            <div
                                data-flickity='{ "autoPlay": true, "imagesLoaded": true, "wrapAround": true, "pageDots": false, "prevNextButtons": true }'>
                                <?php ($data = applicationSettings('from-small-to-large-gallery')); ?>
                                <?php if($data ): ?>
                                <?php $__currentLoopData = json_decode($data, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="carousel-cell mx-3 ">
                                        <figure class="m-0">
                                            <img src="<?php echo e(asset(APPLICATION_SETTING_IMAGE_PATH . $image['path'])); ?>"
                                                alt="<?php echo e($image['alt_text']); ?>">
                                        </figure>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </section>
<?php if(applicationSettings('popup-toggle') == 1): ?>
<div class="pagepopup" id="page-popup">
    <div class="modal fade bd-example-modal-lg" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closePopup()">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                    <div class="p-3">
                        <div class="text-center">
                            <?php if(applicationSettings('popup-title')): ?>
                                <h3 class="m-1 text-primary"><?php echo applicationSettings('popup-title'); ?></h3>
                            <?php endif; ?>

                            <?php if(applicationSettings('popup-image')): ?>
                                <img src="<?php echo e(asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('popup-image'))); ?>" 
                                    class="popup-image img-fluid" 
                                    alt="<?php echo e(applicationSettingsAltText('popup-image')); ?>" />
                            <?php endif; ?>

                            <?php if(applicationSettings('popup-text')): ?>
                                <div class="my-2 text-dark"><?php echo applicationSettings('popup-text'); ?></div>
                            <?php endif; ?>

                            <?php if(applicationSettings('popup-button-text')): ?>
                                <a href="<?php echo applicationSettings('popup-button-url'); ?>" 
                                    class="btn btn-small btn-secondary">
                                    <?php echo applicationSettings('popup-button-text'); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if(applicationSettings('popup-once-day') == 1): ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (!localStorage.getItem('popupShown')) {
            $('#confirmation-modal').modal('show');
        }
    });

    function closePopup() {
        $('#confirmation-modal').modal('hide');
        localStorage.setItem('popupShown', 'true'); 
    }
</script>
<?php else: ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#confirmation-modal').modal('show');
    });

    function closePopup() {
        $('#confirmation-modal').modal('hide');
    }
</script>
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/pages/index.blade.php ENDPATH**/ ?>