<?php $__env->startSection('title'); ?>
    <?php echo e($page->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('seotitle'); ?>
    <?php echo e($page->seo_title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('seodescription'); ?>
    <?php echo e($page->seo_description); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('seokeywords'); ?>
    <?php echo e($page->seo_keywords); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="product-page">
        <div class="container">
            <div class="mobile-food-cat">
                <div class="foot-cat">
                    <?php $__currentLoopData = $productCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($productcategory->products->count() > 0): ?>
                            <div class=" <?php echo e($productcategory->type == 'as-for-cat' ? 'as-for-cat' : 'item'); ?>" id="list-left-menu">
                                <?php if($productcategory->type == 'as-for-cat'): ?>
                                <div class="clear"></div>
                                 <?php else: ?>
                                <a data-smooth-scroll href="#productcategory-<?php echo e($productcategory->id); ?>" class="cat-list">
                                    <?php if($productcategory->image != ''): ?>
                                        <img src="<?php echo e(asset(PRODUCT_CATEGORY_IMAGE_PATH . $productcategory->image)); ?>"
                                            alt="<?php echo e($productcategory->name); ?> Avatar" class="avatar mr-3">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('images/no-image.png')); ?>" class="avatar mr-3">
                                    <?php endif; ?>
                                    <?php echo e($productcategory->name); ?>

                                </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <h1 class="display-3 text-light mb-3 text-uppercase text-center">
                <?php echo e($page->banner_title != '' ? $page->banner_title : $page->title); ?></h1>
            <div class="row">
                <div class="col-md-4 ">
                    <div class="sticky-top pb-3 web-food-cat">
                        <h2 class="mb-3">CATEGORIES</h2>
                        <div id="list-left-menu" class="list-group">
                            <?php $__currentLoopData = $productCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($productcategory->products->count() > 0): ?>
                                
                                <?php if($productcategory->type == 'as-for-cat'): ?>
                               <div class="clear"></div>
                                <?php else: ?>
                                <a data-smooth-scroll class="list-group-item list-group-item-action cat-list"
                                href="#productcategory-<?php echo e($productcategory->id); ?>">
                                <?php if($productcategory->image != ''): ?>
                                    <img src="<?php echo e(asset(PRODUCT_CATEGORY_IMAGE_PATH . $productcategory->image)); ?>"
                                        alt="<?php echo e($productcategory->name); ?> Avatar" class="avatar mr-3">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('images/no-image.png')); ?>" class="avatar mr-3">
                                <?php endif; ?>
                                <?php echo e($productcategory->name); ?>

                            </a>
                                <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div data-spy="scroll" data-target="#list-left-menu" data-offset="1000px" class="scrollspy-menu"
                        data-smooth-scroll>
                        <?php $__currentLoopData = $productCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($productcategory->products->count() > 0): ?>
                                <div class="productcategory-<?php echo e($productcategory->type); ?>"
                                    id="productcategory-<?php echo e($productcategory->id); ?>">&nbsp;</div>
                                <div
                                    class="food-list bg-primary text-light p-5 menu-list <?php echo e($productcategory->type == 'as-for-cat' ? 'as-for-cat' : ''); ?> <?php echo e($productcategory->type == 'as-nav-cat' ? 'as-nav-cat' : ''); ?>">
                                    <h2 class="product-title"><?php echo e($productcategory->name); ?></h2>
                                    <ul>
                                        <?php $__currentLoopData = $products->where('product_category_id', $productcategory->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="<?php echo e($product->sub_title ? '' : 'menu-prize'); ?>">
                                                <p><?php echo e($product->title); ?> <i>
                                                        <?php echo strip_tags($product->description); ?>

                                                    </i> </p>
                                                <?php if($product->sub_title != ''): ?>
                                                    <span> <?php echo e($product->sub_title); ?> </span>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
    </section>
    <?php echo $__env->make('pages.get-testimonials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('pages.location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/pages/product.blade.php ENDPATH**/ ?>