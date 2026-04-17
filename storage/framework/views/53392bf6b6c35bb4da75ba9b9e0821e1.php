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

            <h1 class="display-3 text-light mb-3 text-uppercase text-center">
                <?php echo e($page->banner_title != '' ? $page->banner_title : $page->title); ?></h1>

            <?php if(!$selectedLocationId): ?>
            
            <div class="location-selection-section">
                <h3 class="location-selection-title">Choose Your Location</h3>
                <p class="location-selection-subtitle">Select a branch to view its menu</p>
                <div class="location-boxes">
                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form action="<?php echo e(route('set.location')); ?>" method="POST" class="location-box-form">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="location_id" value="<?php echo e($location->id); ?>">
                            <button type="submit" class="location-box">
                                <div class="location-box-image">
                                    <?php if($location->image): ?>
                                        <img src="<?php echo e(asset(LOCATION_IMAGE_PATH . $location->image)); ?>" alt="<?php echo e($location->location_name); ?>">
                                    <?php else: ?>
                                        <div class="location-box-placeholder">
                                            <span class="material-symbols-outlined">restaurant</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="location-box-info">
                                    <span class="material-symbols-outlined location-box-pin">location_on</span>
                                    <span class="location-box-name"><?php echo e($location->location_name); ?></span>
                                </div>
                            </button>
                        </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php else: ?>
            
            <?php if($locations->count() > 1): ?>
            <div class="location-tabs">
                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="<?php echo e(route('set.location')); ?>" method="POST" class="location-tab-form">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="location_id" value="<?php echo e($location->id); ?>">
                        <button type="submit" class="location-tab <?php echo e($selectedLocationId == $location->id ? 'active' : ''); ?>">
                            <span class="material-symbols-outlined location-tab-icon">location_on</span>
                            <?php echo e($location->location_name); ?>

                        </button>
                    </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>

            <div id="menuContent">

                <div class="mobile-food-cat">
                    <div class="foot-cat">
                        <?php $__currentLoopData = $productCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($products->where('product_category_id', $productcategory->id)->count() > 0): ?>
                                <div class=" <?php echo e($productcategory->type == 'as-for-cat' ? 'as-for-cat' : 'item'); ?>" id="list-left-menu">
                                    <?php if($productcategory->type == 'as-for-cat'): ?>
                                    <div class="clear"></div>
                                     <?php else: ?>
                                    <a data-smooth-scroll href="#productcategory-<?php echo e($productcategory->id); ?>" class="cat-list">
                                        <?php if($productcategory->image != ''): ?>
                                            <img src="<?php echo e(asset(PRODUCT_CATEGORY_IMAGE_PATH . $productcategory->image)); ?>"
                                                alt="<?php echo e($productcategory->name); ?> Avatar" class="avatar mr-3">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('images/no-image.png')); ?>" alt="<?php echo e($productcategory->name); ?>" class="avatar mr-3">
                                        <?php endif; ?>
                                        <?php echo e($productcategory->name); ?>

                                    </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 ">
                        <div class="sticky-top pb-3 web-food-cat">
                            <h2 class="mb-3">CATEGORIES</h2>
                            <div id="list-left-menu" class="list-group">
                                <?php $__currentLoopData = $productCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($products->where('product_category_id', $productcategory->id)->count() > 0): ?>

                                    <?php if($productcategory->type == 'as-for-cat'): ?>
                                   <div class="clear"></div>
                                    <?php else: ?>
                                    <a data-smooth-scroll class="list-group-item list-group-item-action cat-list"
                                    href="#productcategory-<?php echo e($productcategory->id); ?>">
                                    <?php if($productcategory->image != ''): ?>
                                        <img src="<?php echo e(asset(PRODUCT_CATEGORY_IMAGE_PATH . $productcategory->image)); ?>"
                                            alt="<?php echo e($productcategory->name); ?> Avatar" class="avatar mr-3">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('images/no-image.png')); ?>" alt="<?php echo e($productcategory->name); ?>" class="avatar mr-3">
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
                                <?php if($products->where('product_category_id', $productcategory->id)->count() > 0): ?>
                                    <div class="productcategory-<?php echo e($productcategory->type); ?>"
                                        id="productcategory-<?php echo e($productcategory->id); ?>">&nbsp;</div>
                                    <div
                                        class="food-list bg-primary text-light p-5 menu-list <?php echo e($productcategory->type == 'as-for-cat' ? 'as-for-cat' : ''); ?> <?php echo e($productcategory->type == 'as-nav-cat' ? 'as-nav-cat' : ''); ?>">
                                        <h2 class="product-title"><?php echo e($productcategory->name); ?></h2>
                                        <ul>
                                            <?php $__currentLoopData = $products->where('product_category_id', $productcategory->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $displayPrice = '';
                                                    if ($selectedLocationId && !empty($product->location_prices) && isset($product->location_prices[(string)$selectedLocationId])) {
                                                        $displayPrice = $product->location_prices[(string)$selectedLocationId];
                                                    }
                                                ?>
                                                <li class="<?php echo e($displayPrice ? '' : 'menu-prize'); ?>">
                                                    <p><?php echo e($product->title); ?> <i>
                                                            <?php echo strip_tags($product->description); ?>

                                                        </i> </p>
                                                    <?php if($displayPrice != ''): ?>
                                                        <span> $<?php echo e(number_format((float)$displayPrice, 2)); ?> </span>
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
            </div>
            <?php endif; ?>

            <div class="row">
            </div>
    </section>
    <?php echo $__env->make('pages.get-testimonials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('pages.location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <style>
        /* ── Location Selection ── */
        .location-selection-section {
            text-align: center;
            margin-bottom: 2.5rem;
            padding: 2rem 0;
        }
        .location-selection-title {
            color: #F7E8BF;
            font-size: 1.5rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.25rem;
        }
        .location-selection-subtitle {
            color: #aaa;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }
        .location-boxes {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }
        .location-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 280px;
            background: #1a1a1a;
            border: 2px solid #3a3a3a;
            border-radius: 12px;
            overflow: hidden;
            cursor: pointer;
            transition: border-color 0.3s, transform 0.2s, box-shadow 0.3s;
            padding: 0;
            color: #F7E8BF;
            text-decoration: none;
            text-align: center;
        }
        .location-box:hover {
            border-color: #C2333B;
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(194, 51, 59, 0.3);
            color: #F7E8BF;
            text-decoration: none;
        }
        .location-box-image {
            width: 100%;
            height: 180px;
            overflow: hidden;
            background: #111;
        }
        .location-box-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }
        .location-box:hover .location-box-image img {
            transform: scale(1.05);
        }
        .location-box-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #1a1a1a, #2a0a0a);
        }
        .location-box-placeholder .material-symbols-outlined {
            font-size: 3rem;
            color: #C2333B;
            opacity: 0.6;
        }
        .location-box-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 1.25rem;
            width: 100%;
            justify-content: center;
        }
        .location-box-pin {
            color: #C2333B;
            font-size: 1.3rem;
        }
        .location-box-name {
            font-size: 1.05rem;
            font-weight: 600;
        }

        /* ── Location Tabs ── */
        .location-tabs {
            display: flex;
            justify-content: center;
            gap: 0;
            margin-bottom: 2rem;
            border-bottom: 2px solid #3a3a3a;
        }
        .location-tab-form {
            margin: 0;
        }
        .location-tab {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.75rem 1.5rem;
            color: #aaa;
            font-size: 1rem;
            font-weight: 600;
            background: none;
            border: none;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            transition: color 0.25s, border-color 0.25s;
            margin-bottom: -2px;
        }
        .location-tab:hover {
            color: #F7E8BF;
        }
        .location-tab.active {
            color: #F7E8BF;
            border-bottom-color: #C2333B;
        }
        .location-tab-icon {
            font-size: 1.2rem;
        }
        .location-tab.active .location-tab-icon {
            color: #C2333B;
        }

        /* ── Responsive ── */
        @media (max-width: 640px) {
            .location-boxes {
                flex-direction: column;
                align-items: center;
            }
            .location-box {
                width: 100%;
                max-width: 340px;
            }
            .location-tabs {
                flex-wrap: wrap;
            }
            .location-tab {
                flex: 1;
                justify-content: center;
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }
        }
    </style>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/pages/product.blade.php ENDPATH**/ ?>