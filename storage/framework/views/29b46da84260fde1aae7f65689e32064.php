<section class="bg-secondary  text-center reviews">
    <div class="container">
        <h2 class="section-title text-center text-dark">Our Customers</h2>
        <div class="reviews-nav-max">
            <div class="reviews-for">
                <?php if($testimonials->count() > 0): ?>
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <div class="inner">
                                <?php echo strip_tags($testimonial->description); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="reviews-nav">
                <?php if($testimonials->count() > 0): ?>
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <div class="inner">
                                <figure><img src="<?php echo e(asset(TESTIMONIAL_IMAGE_PATH . $testimonial->image)); ?>"
                                        alt=" Image"></figure>
                                <h3><?php echo e($testimonial->name); ?></h3>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/pages/get-testimonials.blade.php ENDPATH**/ ?>