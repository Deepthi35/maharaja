<?php $__env->startSection('title'); ?>
    <?php echo e($blogPost->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('seotitle'); ?>
    <?php echo e($blogPost->seo_title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('seodescription'); ?>
    <?php echo e($blogPost->seo_description); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('seokeywords'); ?>
    <?php echo e($blogPost->seo_keywords); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="text-banner bg-secondary">
  <figure class="inner-pic"><img src="<?php echo e(asset('images/about-bg.svg')); ?>" alt="about bg image" />
  </figure>
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?php echo e(url('/')); ?>">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?php echo e(url('/blog')); ?>">Blog</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e($blogPost->title); ?></li>
    </ol>
    </nav>
</div>
</section> 
    <section class="blog-details">
        <div class="container">
          <div class="blog-details-top">
            <div class="card card-body">
              <figure class="pic m-0"> <img src="<?php echo e(asset(BLOG_POST_IMAGE_PATH . $blogPost->image)); ?>"
                alt="<?php echo e($blogPost->title); ?>"></figure>
                <div class="content mt-5">
                  <h1 class="text-primary"><?php echo e($blogPost->title); ?></h1>
                  <div class="d-flex justify-content-between mb-3">
                    <div class="mr-2">
                      <span > <i class="material-symbols-outlined">
                        calendar_month
                      </i> <?php echo e(date('M d, Y', strtotime($blogPost->created_at))); ?></span>
                    </div>
                    <div class="text-small d-flex">
                      <span class="text-muted">
                        <i class="material-symbols-outlined">
                          lan
                        </i>
                        <?php echo $blogPost->blogCategory->name; ?></span>
                    </div>
                  </div>
                  <div class="description"> <?php echo $blogPost->description; ?></div>
                </div>
            </div>
          </div>
          <div class="blog-details-bottom">
            <div class="card-body">
              <h2 class="section-title text-light text-center">
                Latest Blogs
            </h2>
            <div class="latests-blocks">
              <div class="four-items-dots">
                <?php $__currentLoopData = $blogPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="inner">
                <div class="card p-2 mx-3">
                  <a href="<?php echo e(url('blog/' . $blogPost->slug)); ?>" class="full-link"><figure><img class="img-fluid mb-2" src="<?php echo e(asset(BLOG_POST_IMAGE_PATH . $blogPost->image)); ?>" alt="<?php echo e($blogPost->title); ?>" ></figure>
                  </a>
                    <h6 class="text-primary"><a href="<?php echo e(url('blog/' . $blogPost->slug)); ?>" class="full-link"><?php echo e($blogPost->title); ?></a></h6>
                  <p><span > <i class="material-symbols-outlined">
                    calendar_month
                  </i> <?php echo e(date('M d, Y', strtotime($blogPost->created_at))); ?></span></p>

                  <p>    <i class="material-symbols-outlined">
                    lan
                  </i> <span class="text-muted"><?php echo e($blogPost->blogCategory->name); ?></span></p>
                 &nbsp;
                </div>
              </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
            </div>
          </div>
    </section>
<?php if($faqCategory): ?>
    <?php echo $__env->make('common.faqs', ['faqs' => $faqCategory->faqs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/test/maharaja/resources/views/pages/blog-details.blade.php ENDPATH**/ ?>