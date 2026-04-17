<section class="faq-section">
    <div class="container-fluid">
       
        <div class="row  justify-content-center">
            <div class="col-md-6 ">
                <div class="faq-inner ">
                    <h2 class="text-white text-center mb-4 text-primary">Frequently Asked Questions</h2>
                    <?php $__currentLoopData = $faqs->where('faq_categories_id',$faqCategory->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <div class="card card-sm card-body shadow-3d">
                            <div data-target="#panel-<?php echo e($faq->id); ?>" class="accordion-panel-title collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-<?php echo e($faq->id); ?>">
                              <span class="h6 mb-0 text-dark"><?php echo e($faq->question); ?></span>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="injected-svg icon" data-src="assets/img/icons/interface/plus.svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path d="M19 11H5C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13H19C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11Z" fill="#000" stroke="#000"></path>
                                <path d="M13 19L13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5L11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19Z" fill="#000" stroke="#000"></path>
                            </svg>                            
                            </div>
                            <div class="collapse" id="panel-<?php echo e($faq->id); ?>" style="">
                              <div class="pt-3 text-dark">
                                <?php echo $faq->answer; ?> 
                                <?php if( $faq->button_name != ''): ?>
                                <a class="btn btn-primary btn-sm"
                                    target="<?php echo e($faq->new_window ? '_blank' : '_self'); ?>"
                                    href="<?php echo e($faq->button_url); ?>">
                                    <?php echo e($faq->button_name); ?>

                                </a>
                                <?php endif; ?>
                              </div>
                            </div>
                          </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            
        </div>
    </div>
</section><?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/common/faqs.blade.php ENDPATH**/ ?>