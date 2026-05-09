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
    <section class="text-banner bg-secondary">
        <figure class="inner-pic"><img src="<?php echo e(asset('images/about-bg.svg')); ?>" alt="about bg image" />
        </figure>
        <div class="container">
            <h1 class="display-4"><?php echo e($page->banner_title != '' ? $page->banner_title : $page->title); ?></h1>
            <nav aria-label="breadcrumb text-light">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(url('/')); ?>">Home</a>
                    </li>
                    <?php if($page->parentName): ?>
                    <?php if($page->parentName->type == 'nopage'): ?>
                    <?php else: ?>
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(url('/' . $page->parentName->slug)); ?>"><?php echo e($page->type); ?><?php echo e($page->parentName->title); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e($page->title); ?></li>
                </ol>
                <?php if($page->slug == 'catering'): ?>
                <a class="smooth-scroll btn en-btn bg-primary text-white float-right" href="#catering-form"> <?php echo applicationSettings('catering-button-text'); ?> </a>
                <?php endif; ?>
            </nav>  
        </div>
    </section>

    <?php if($page->slug == 'about-us'): ?>
    <?php echo $page->content; ?>

        <?php echo $__env->make('pages.hours-of-operation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php endif; ?>

    <?php if($page->slug == 'catering' ): ?>

    <section class="catering text-light py-5">
        <div class="container">
        <?php echo $page->content; ?> 
             <?php echo $__env->make('pages.catering', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </section>

    <?php endif; ?>
    <!-- <?php echo $__env->make('pages.hours-of-operation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
    <?php echo $__env->make('pages.get-testimonials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('pages.location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (!target) return;

        const start = window.pageYOffset;
        const distance = target.offsetTop - start;
        const duration = 1000; // Duration in ms
        const startTime = performance.now();

        const scroll = (currentTime) => {
            const elapsed = Math.min((currentTime - startTime) / duration, 1);
            const ease = elapsed < 0.5 
                ? 2 * elapsed * elapsed 
                : 1 - Math.pow(-2 * elapsed + 2, 2) / 2; // Ease-in-out
            window.scrollTo(0, start + distance * ease);
            if (elapsed < 1) requestAnimationFrame(scroll);
        };

        requestAnimationFrame(scroll);
    });
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/test/maharaja/resources/views/pages/inner-page.blade.php ENDPATH**/ ?>