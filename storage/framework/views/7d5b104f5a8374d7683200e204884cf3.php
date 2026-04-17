<div>
<?php echo $__env->make('pages.get-catering', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($faqCategory): ?>
<?php echo $__env->make('common.faqs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<section id="catering-form">
<?php echo $__env->make('pages.catering-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
</div>


<?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/pages/catering.blade.php ENDPATH**/ ?>