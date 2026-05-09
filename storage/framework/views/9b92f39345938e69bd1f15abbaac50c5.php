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
            </nav>
        </div>
    </section>

    <section class="contact-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <?php
                        $contactLocations = App\Models\Location::where('publish', 1)->orderBy('id')->get();
                    ?>
                    <div class="contact-section bg-primary card-body text-light">
                        <h2 class="h1 text-center">Get In Touch</h2>
                        <div class="contact-locations-row">
                            
                            <div class="contact-loc-block">
                                <?php if(!empty($contactLocations[0])): ?>
                                    <div class="contact-loc-name">
                                        <span class="material-symbols-outlined">location_on</span>
                                        <?php echo e($contactLocations[0]->location_name); ?>

                                    </div>
                                <?php endif; ?>
                                <ul>
                                    <li class="contact-loc-address">
                                        <img src="<?php echo e(asset('frontend/img/icons/interface/map-marker1.svg')); ?>" alt="Address icon" class="address-icon">
                                        <?php echo applicationSettings('contact-address'); ?>

                                    </li>
                                    <li class="contact-loc-inline">
                                        <span class="contact-loc-inline-item">
                                            <img src="<?php echo e(asset('frontend/img/icons/interface/mail1.svg')); ?>" alt="Email icon" class="email-icon">
                                            <a href="mailto:<?php echo e(applicationSettings('primary-mail')); ?>"><?php echo e(applicationSettings('primary-mail')); ?></a>
                                        </span>
                                        <span class="contact-loc-inline-item">
                                            <img src="<?php echo e(asset('frontend/img/icons/interface/phone1.svg')); ?>" alt="Phone icon" class="phone-icon">
                                            <a href="tel:<?php echo e(applicationSettings('primary-phone-number')); ?>"><?php echo e(applicationSettings('primary-phone-number')); ?></a>
                                        </span>
                                    </li>
                                </ul>
                            </div>

                            <?php if(!empty($contactLocations[1])): ?>
                            <div class="contact-loc-divider"></div>
                            
                            <div class="contact-loc-block">
                                <div class="contact-loc-name">
                                    <span class="material-symbols-outlined">location_on</span>
                                    <?php echo e($contactLocations[1]->location_name); ?>

                                </div>
                                <ul>
                                    <?php if(applicationSettings('location-2-map-location')): ?>
                                    <li class="contact-loc-address">
                                        <img src="<?php echo e(asset('frontend/img/icons/interface/map-marker1.svg')); ?>" alt="Address icon" class="address-icon">
                                        <?php echo applicationSettings('location-2-map-location'); ?>

                                    </li>
                                    <?php endif; ?>
                                    <?php if(applicationSettings('location-2-mail') || applicationSettings('location-2-phone')): ?>
                                    <li class="contact-loc-inline">
                                        <?php if(applicationSettings('location-2-mail')): ?>
                                        <span class="contact-loc-inline-item">
                                            <img src="<?php echo e(asset('frontend/img/icons/interface/mail1.svg')); ?>" alt="Email icon" class="email-icon">
                                            <a href="mailto:<?php echo e(applicationSettings('location-2-mail')); ?>"><?php echo e(applicationSettings('location-2-mail')); ?></a>
                                        </span>
                                        <?php endif; ?>
                                        <?php if(applicationSettings('location-2-phone')): ?>
                                        <span class="contact-loc-inline-item">
                                            <img src="<?php echo e(asset('frontend/img/icons/interface/phone1.svg')); ?>" alt="Phone icon" class="phone-icon">
                                            <a href="tel:<?php echo e(applicationSettings('location-2-phone')); ?>"><?php echo e(applicationSettings('location-2-phone')); ?></a>
                                        </span>
                                        <?php endif; ?>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="text-center mb-4">
                            <h2 class="h1 get-in-title"><?php echo applicationSettings('hear-from-you'); ?></h2>
                        </div>

                        <form action="<?php echo e(url('contact-form-submission')); ?>" method="POST" id="contact-form">
                            <?php echo e(csrf_field()); ?>

                            
                            <div class="row">
                                <?php echo view('honeypot::honeypotFormFields'); ?>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="name" placeholder="Name*" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone Number*"
                                        data-parsley-type="digits" data-parsley-length="[10, 10]" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control" name="email" data-parsely-type="email"
                                        placeholder="Email Address*" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" minlength="10" rows="5" placeholder="Your Message*" required></textarea>
                            </div>
                            <div class="g-recaptcha" data-callback="imNotARobot"
                                data-sitekey="6LeTO4koAAAAAHbW14CJZP-Vxrxw0hF0r_pJkyym"></div>
                            <div id="captchaerrors"></div>
                            <br />
                            <button class="btn btn-secondary" type="submit" id="contact_btn">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('pages.get-testimonials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('pages.location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
    .contact-locations-row {
        display: flex;
        align-items: stretch;
        justify-content: center;
        gap: 0;
        padding: 35px 0 30px;
    }
    .contact-loc-block {
        flex: 1 1 0;
        min-width: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 0 20px;
    }
    .contact-loc-name {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(0,0,0,0.3);
        color: #FFD54F;
        font-family: 'Laila', serif;
        font-size: 22px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        padding: 8px 22px;
        border-radius: 25px;
        margin-bottom: 24px;
    }
    .contact-loc-name .material-symbols-outlined {
        font-size: 24px;
    }
    .contact-loc-block ul {
        list-style: none;
        margin: 0;
        padding: 0;
        width: 100%;
        max-width: 520px;
    }
    .contact-loc-block ul li {
        display: flex !important;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin: 0 0 18px 0 !important;
        padding: 0 !important;
        font-size: 16px;
        line-height: 1.5;
        position: static !important;
    }
    .contact-loc-block ul li::before {
        display: none !important;
    }
    .contact-loc-block ul li img {
        width: 22px;
        height: 22px;
        margin: 0 !important;
        flex-shrink: 0;
        display: block !important;
        vertical-align: middle;
    }
    .contact-loc-block ul li a,
    .contact-loc-block ul li p {
        color: #fff;
        font-size: 16px;
        font-weight: 400;
        margin: 0;
        display: inline;
        text-decoration: none;
    }
    .contact-loc-block ul li a:hover {
        color: #FFD54F;
        text-decoration: none;
    }
    .contact-loc-block ul li.contact-loc-address {
        align-items: flex-start;
        text-align: left;
    }
    .contact-loc-divider {
        width: 1px;
        align-self: stretch;
        background: rgba(255,255,255,0.25);
        margin: 0;
        flex-shrink: 0;
    }
    .contact-loc-block ul li.contact-loc-inline {
        display: flex !important;
        flex-wrap: nowrap !important;
        align-items: center;
        justify-content: center;
        gap: 28px;
        width: 100%;
        margin-bottom: 0 !important;
    }
    .contact-loc-inline-item {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        white-space: nowrap;
        min-width: 0;
        position: relative;
    }
    .contact-loc-inline-item + .contact-loc-inline-item::before {
        content: "";
        position: absolute;
        left: -14px;
        top: 50%;
        transform: translateY(-50%);
        width: 1px;
        height: 20px;
        background: rgba(255,255,255,0.45);
    }
    .contact-loc-inline-item img {
        width: 22px;
        height: 22px;
        flex-shrink: 0;
        display: block;
    }
    .contact-loc-inline-item a {
        color: #fff;
        font-size: 16px;
        font-weight: 400;
        text-decoration: none;
    }
    .contact-loc-inline-item a:hover {
        color: #FFD54F;
        text-decoration: none;
    }
    @media(max-width: 991px) {
        .contact-loc-block ul li.contact-loc-inline {
            gap: 18px;
        }
    }
    @media(max-width: 768px) {
        .contact-locations-row {
            flex-direction: column;
            align-items: center;
            gap: 30px;
        }
        .contact-loc-block {
            padding: 0;
        }
        .contact-loc-divider {
            width: 80%;
            height: 1px;
            margin: 0;
        }
        .contact-loc-block ul li.contact-loc-inline {
            flex-direction: column;
            gap: 14px;
        }
        .contact-loc-inline-item + .contact-loc-inline-item::before {
            display: none;
        }
    }
    @media all and (max-width: 991px) {
        .contact-loc-block ul {
            max-width: 100%;
        }
        .contact-loc-block ul li {
            display: flex !important;
            align-items: flex-start;
            justify-content: left;
            gap: 8px;
            margin: 0 0 20px 0 !important;
            padding: 0 !important;
            font-size: 16px;
            line-height: 1.5;
            position: static !important;
	}
    
    .contact-loc-block ul li.contact-loc-inline {
        align-items: flex-start;
        justify-content: flex-start;
        gap: 18px;
        width: 100%;
    }

    .contact-loc-inline-item {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        text-align: left;
    }
}

/* Mobile View */
@media (max-width: 768px) {
    .contact-loc-block ul li.contact-loc-inline {
        flex-direction: column;
        align-items: flex-start !important;
        justify-content: flex-start !important;
        gap: 14px;
        width: 100%;
    }

    .contact-loc-inline-item {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        text-align: left;
    }
}
    
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/test/maharaja/resources/views/pages/contact.blade.php ENDPATH**/ ?>