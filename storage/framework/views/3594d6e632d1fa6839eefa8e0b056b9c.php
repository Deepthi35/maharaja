<?php
    $popularDishes = getClienteleCategory('our-popular-dishes');
?>
<?php if($popularDishes): ?>
    <section class="bg-secondary our-popular-dishes">
        <div class="container my-3">
            <h2 class="section-title text-light text-center  mb-5">
                <?php echo e($popularDishes->name); ?>

             
            </h2>
            <div class="nine-column mt-5">
                <div class="item">
                    <div class="nine-column-slider  dishes-items">
                        <?php $__currentLoopData = $popularDishes->activeClienteles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popularDish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="product-block">
                                <div class="row align-items-center special-products-inner mx-3">
                                    <div class="col-md-6 pic">
                                        <figure>
                                            <img src="<?php echo e(asset(CLIENTELE_IMAGE_PATH . $popularDish->image)); ?>"
                                                alt="<?php echo e($popularDish->image_alt_text); ?>">
                                        </figure>
                                    </div>
                                    <div class="col-md-6 content text-light">
                                        <div class="special-products-content bg-primary">
                                            <h4><?php echo e($popularDish->title); ?><span><?php echo e($popularDish->url); ?></span> <em class="clear">&nbsp;</em></h4>
                                            <p> <?php echo e($popularDish->sub_title); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/pages/our-popular-dishes.blade.php ENDPATH**/ ?>