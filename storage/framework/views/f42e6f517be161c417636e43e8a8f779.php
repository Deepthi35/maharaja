<?php if($whyChooseOurCatering && ($whyChooseOurCatering->count() > 0)): ?>
<div class="card card-body border-0 mt-5 o-hidden bg-primary text-light catering-list about">
    <figure class="pos-pic about-left-pic"><img src="<?php echo e(asset('images/about-bg.svg')); ?>" alt="about bg image" />
    </figure>
    <figure class="pos-pic about-right-pic"><img src="<?php echo e(asset('images/about-bg.svg')); ?>" alt="about bg image" />
    </figure>
    <h2 class="text-center section-title"><?php echo e(getServiceCategory('why-choose-us-catering')->display_name); ?></h2>
    
    <div class="row  align-items-center">
               
        <div class="col-md-6">
            <ul class="list-unstyled mb-0">
                
                <?php $__currentLoopData = $whyChooseOurCatering; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ourCatering): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="d-flex py-2">
                <div class="icon-round icon-round-xs bg-secondary mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="injected-svg icon bg-primary" data-src="assets/img/icons/interface/check.svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path d="M18.1206 5.4111C18.5021 4.92016 19.1753 4.86046 19.6241 5.27776C20.073 5.69506 20.1276 6.43133 19.746 6.92227L10.6794 18.5889C10.2919 19.0876 9.60523 19.1401 9.15801 18.7053L4.35802 14.0386C3.91772 13.6106 3.87806 12.8732 4.26944 12.3916C4.66082 11.91 5.33503 11.8666 5.77533 12.2947L9.76023 16.1689L18.1206 5.4111Z" fill="#212529"></path>
                    </svg>
                </div>
                <span>
                    <span class="font-weight-bold"><?php echo e($ourCatering->title); ?></span><?php echo \Illuminate\Support\Str::limit($ourCatering->short_description, 170, '...'); ?></span>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <div class="col-md-6 about-left" data-aos="fade-left">
            <div 
                data-flickity='{ "autoPlay": true, "imagesLoaded": true, "wrapAround": true, "prevNextButtons": false }'>
             
                <?php $__currentLoopData = $whyChooseOurCatering; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ourCatering): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-cell mx-3 pb-1">
                    <figure class="m-0">
                        <img  src="<?php echo e(asset(SERVICE_IMAGE_PATH . $ourCatering->image)); ?>" alt="<?php echo e($ourCatering->title); ?>">
                    </figure>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if($ourCaterings && ($ourCaterings->count() > 0 ) ): ?>
    <div class="row mb-4 mt-4">
        <div class="col">
            <h3 class="h1 text-center text-primary"><?php echo e(getServiceCategory('catering-services')->display_name); ?></h3>
        </div>
    </div>
    <div class="caterings-list">
        <?php $__currentLoopData = $ourCaterings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ourCatering): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card shadow text-dark mb-5  p-3">
            <div class="row align-items-center justify-content-around block">
                <div class="col-md-5 col-xl-6 mb-4 mb-md-0 pic">
                    <img class="w-100 rounded" src="<?php echo e(asset(SERVICE_IMAGE_PATH . $ourCatering->image)); ?>" alt="<?php echo e($ourCatering->title); ?>">
                </div>
                <div class="col-md-7 col-xl-6 content">
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <div class="my-3"><span class="h1 text-dark"><?php echo e($ourCatering->title); ?></span></div>
                            <?php echo $ourCatering->short_description; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/pages/get-catering.blade.php ENDPATH**/ ?>