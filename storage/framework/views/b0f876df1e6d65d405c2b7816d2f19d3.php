<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon"
        href="<?php echo e(asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('favicon'))); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="google-site-verification" content="<?php echo applicationSettings('google-site-verification-code'); ?>" />
    <meta property="fb:app_id" content="" />
    <meta property="og:site_name" content="<?php echo e(applicationSettings('site-name')); ?>" />
    <meta property="og:title" content="<?php echo $__env->yieldContent('seotitle'); ?>" />
    <meta property="og:description" content="<?php echo $__env->yieldContent('seodescription'); ?>" />
    <meta property="og:type" content="<?php echo $__env->yieldContent('ogtype', 'website'); ?>">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:image" content="<?php echo e(applicationSettings('og-image') ? asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('og-image')) : asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('logo'))); ?>" />
    <!-- Document title -->
    <title><?php echo $__env->yieldContent('seotitle'); ?></title>
    
    <meta name='keywords' content="<?php echo $__env->yieldContent('seokeywords'); ?>">
    <meta name="description" content="<?php echo $__env->yieldContent('seodescription'); ?>">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  
    <style type="text/css">
        :root {
            --primary-color: <?php echo e(applicationSettings('primay-color')); ?>;
            --secondary-color: <?php echo e(applicationSettings('secondary-color')); ?>;
        }
    </style>


    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KZMW8BVQ');
    </script>
    <!-- End Google Tag Manager -->




    <?php echo app('Illuminate\Foundation\Vite')('resources/frontend/scss/app.scss'); ?>
    <?php echo applicationSettings('metricool-script'); ?>

    <!-- Google tag (gtag.js) -->
    
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '<?php echo strip_tags(applicationSettings('google-analytics-code')); ?>');
    </script>
    <?php echo applicationSettings('metricool'); ?>

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KZMW8BVQ" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="loader">
        <div class="loading-animation"></div>
    </div>
    <header class="navbar-expand-lg navbar-dark bg-dark" data-sticky="top">
        <div class="navbar-container ">
            <nav class="navbar navbar-expand-lg justify-content-between navbar-dark">
                <div class="container">
                    <div class="col-md-2 flex-fill px-0 d-flex justify-content-between">
                        <a class="navbar-brand mr-0 fade-page" href="<?php echo e(url('/')); ?>">
                            <img src="<?php echo e(asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('logo'))); ?>"
                                alt="<?php echo e(applicationSettingsAltText('logo')); ?>">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target=".navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                            <img class="icon navbar-toggler-open"
                                src="<?php echo e(asset('frontend/img/icons/interface/menu.svg')); ?>" alt="menu interface icon"
                                data-inject-svg />
                            <img class="icon navbar-toggler-close"
                                src="<?php echo e(asset('frontend/img/icons/interface/cross.svg')); ?>" alt="cross interface icon"
                                data-inject-svg />
                        </button>
                    </div>
                    <div class="collapse navbar-collapse col px-0 px-lg-2 flex-fill justify-content-center">
                        <div class="py-2 py-lg-0">
                            <ul class="navbar-nav">
                                <li class="nav-item <?php echo e(Request::is('/') ? 'active' : ''); ?>"><a class="nav-link"
                                        href="<?php echo e(url('/')); ?>">Home</a></li>
                                <?php $__currentLoopData = mainMenu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li
                                        class="nav-item <?php echo e($menu->subMenu->count() > 0 ? 'dropdown' : ''); ?> <?php echo e(Request::is($menu->slug) ? 'active' : ''); ?>">
                                        <a href="<?php echo e(pageLink($menu->type, $menu->slug, $menu->custom_url)); ?>"
                                            class="nav-link <?php echo e($menu->subMenu->count() > 0 ? 'dropdown-toggle' : ''); ?>"
                                            <?php if($menu->subMenu->count() > 0): ?> data-toggle="dropdown-grid" aria-expanded="false" aria-haspopup="true" <?php endif; ?>>
                                            <?php echo e($menu->title); ?>

                                        </a>
                                        <?php if($menu->subMenu->count()): ?>
                                            <div class="dropdown-menu row">
                                                <div class="col-auto" data-dropdown-content>
                                                    <div class="dropdown-grid-menu">
                                                        <?php $__currentLoopData = $menu->subMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a href="<?php echo e(pageLink($subMenu->type, $subMenu->slug, $subMenu->custom_url)); ?>"
                                                                class="dropdown-item fade-page"><?php echo e($subMenu->title); ?></a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end col-md-2 flex-fill px-0">


                    <?php if(applicationSettings('order-now-text')): ?>
                    
             

                        <a target="_blank" href="<?php echo applicationSettings('order-now-url'); ?>" class="btn btn-primary ml-lg-3"><?php echo applicationSettings('order-now-text'); ?></a>

                        <?php else: ?>

                        <a href="<?php echo e(url('order-online')); ?>" class="btn btn-primary ml-lg-3">Order Now</a>

                        <?php endif; ?>

                    </div>
                </div>
            </nav>
        </div>
    </header>
    <?php echo $__env->yieldContent('content'); ?>
    
    <footer class="bg-secondary-inventry">
        <figure class="footer-pic footer-left-pic"><img src="<?php echo e(asset('images/about-bg.svg')); ?>"
                alt="about bg image" />
        </figure>
        <figure class="footer-pic footer-right-pic"><img src="<?php echo e(asset('images/about-bg.svg')); ?>"
                alt="about bg image" />
        </figure>
        <div class="container py-1">
            <div class="row text-center align-items-center">
                <div class="col-md-6 text-center">
                    <a class="footer-logo" href="<?php echo e(url('/')); ?>">
                        <img src="<?php echo e(asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('logo'))); ?>"
                            alt="<?php echo e(applicationSettingsAltText('logo')); ?>">
                    </a>
                </div>
                <div class="col-md-6 text-center">
                    <div class="col-auto social-share">
                        <h5>Follow us on</h5>
                        <ul class="nav">
                            <?php if(applicationSettings('facebook') != ''): ?>
                                <li class="nav-item">
                                    <a target="_blank" href="<?php echo applicationSettings('facebook'); ?>" class="nav-link facebook">
                                        <img src="<?php echo e(asset('images//social/facebook.svg')); ?>" alt="facebook">
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(applicationSettings('twitter') != ''): ?>
                                <li class="nav-item">
                                    <a target="_blank" href="<?php echo applicationSettings('twitter'); ?>" class="nav-link twitter">
                                        <img src="<?php echo e(asset('images//social/twitter.svg')); ?>" alt="twiiter">
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(applicationSettings('instagram') != ''): ?>
                                <li class="nav-item">
                                    <a target="_blank" href="<?php echo applicationSettings('instagram'); ?>" class="nav-link instagram">
                                        <img src="<?php echo e(asset('images//social/instagram.svg')); ?>" alt="instragram">
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(applicationSettings('watsapp') != ''): ?>
                                <li class="nav-item">
                                    <a target="_blank" href="<?php echo applicationSettings('watsapp'); ?>" class="nav-link watsapp">
                                        <img src="<?php echo e(asset('images//social/watsapp.svg')); ?>" alt="watsapp">
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-auto social-share social-share1">
                        <h5>We are also available on</h5>
                        <ul class="nav">
                            <?php if(applicationSettings('clover') != ''): ?>
                                <li class="nav-item">
                                    <a target="_blank" href="<?php echo applicationSettings('clover'); ?>" class="nav-link clover">
                                        <img src="<?php echo e(asset('images//social/clover-logo.svg')); ?>" alt="clover">
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(applicationSettings('doordash') != ''): ?>
                                <li class="nav-item">
                                    <a target="_blank" href="<?php echo applicationSettings('doordash'); ?>" class="nav-link doordash">
                                        <img src="<?php echo e(asset('images//social/doordash.svg')); ?>" alt="doordash">
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <ul class="nav mt-2">
                            <?php if(applicationSettings('grubhub') != ''): ?>
                                <li class="nav-item">
                                    <a target="_blank" href="<?php echo applicationSettings('uber'); ?>" class="nav-link grubhub">
                                        <img src="<?php echo e(asset('images//social/grubhub.svg')); ?>" alt="grubhub">
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(applicationSettings('uber') != ''): ?>
                                <li class="nav-item">
                                    <a target="_blank" href="<?php echo applicationSettings('uber'); ?>" class="nav-link uber">
                                        <img src="<?php echo e(asset('images//social/uber.svg')); ?>" alt="uber">
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <ul class="nav footer-nav text-center">
                        <li class="nav-item"><a class="nav-linke" href="<?php echo e(url('/')); ?>">Home</a></li>
                        <?php $__currentLoopData = footerMenu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item <?php echo e($menu->subMenu->count() > 0 ? 'dropdown' : ''); ?>">
                                <a href="<?php echo e(pageLink($menu->type, $menu->slug, $menu->custom_url)); ?>"
                                    class="nav-link <?php echo e($menu->subMenu->count() > 0 ? 'dropdown-toggle' : ''); ?>"
                                    <?php if($menu->subMenu->count() > 0): ?> data-toggle="dropdown-grid" aria-expanded="false" aria-haspopup="true" <?php endif; ?>>
                                    <?php echo e($menu->title); ?>

                                </a>
                                <?php if($menu->subMenu->count()): ?>
                                    <div class="dropdown-menu row">
                                        <div class="col-auto" data-dropdown-content>
                                            <div class="dropdown-grid-menu">
                                                <?php $__currentLoopData = $menu->subMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(pageLink($subMenu->type, $subMenu->slug, $subMenu->custom_url)); ?>"
                                                        class="dropdown-item fade-page"><?php echo e($subMenu->title); ?></a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php $footerLocations = App\Models\Location::where('publish', 1)->orderBy('id')->get(); ?>
                    <div class="footer-addresses">
                        <div class="footer-address text-dark">
                            <?php if(!empty($footerLocations[0])): ?>
                                <strong class="footer-location-name"><?php echo e($footerLocations[0]->location_name); ?></strong>
                            <?php endif; ?>
                            <span class="material-symbols-outlined">add_location_alt</span>
                            <?php echo applicationSettings('map-location'); ?>

                        </div>
                        <?php if(applicationSettings('location-2-map-location')): ?>
                        <div class="footer-address text-dark">
                            <?php if(!empty($footerLocations[1])): ?>
                                <strong class="footer-location-name"><?php echo e($footerLocations[1]->location_name); ?></strong>
                            <?php endif; ?>
                            <span class="material-symbols-outlined">add_location_alt</span>
                            <?php echo applicationSettings('location-2-map-location'); ?>

                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-rights text-light">
            <div class="row justify-content-around align-items-center">
                <div class="col"> &copy; <?php echo e(now()->year); ?> Maharaja. All Rights Reserved</div>
                <div class="col text-center">
                    <ul class="nav">
                        <li class="nav-item "><a class="nav-link" href="#">Terms & Conditions</a></li>
                        <li class="nav-item "><a class="nav-link" href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col text-right"> Designed by: <img src="<?php echo e(asset('images/f9tech.png')); ?>"
                        alt="F9tech" />
                </div>
            </div>
        </div>
    </footer>
    
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/popper.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/bootstrap.js')); ?>"></script>
    <!-- AOS (Animate On Scroll - animates elements into view while scrolling down) -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/aos.js')); ?>"></script>
    <!-- Clipboard (copies content from browser into OS clipboard) -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/clipboard.min.js')); ?>"></script>
    <!-- Fancybox (handles image and video lightbox and galleries) -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.fancybox.min.js')); ?>"></script>
    <!-- Flatpickr (calendar/date/time picker UI) -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/flatpickr.min.js')); ?>"></script>
    <!-- Flickity (handles touch enabled carousels and sliders) -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/flickity.pkgd.min.js')); ?>"></script>
    <!-- Ion rangeSlider (flexible and pretty range slider elements) -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/ion.rangeSlider.min.js')); ?>"></script>
    <!-- Isotope (masonry layouts and filtering) -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/isotope.pkgd.min.js')); ?>"></script>
    <!-- jarallax (parallax effect and video backgrounds) -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/jarallax.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/jarallax-video.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/jarallax-element.min.js')); ?>"></script>
    <!-- jQuery Countdown (displays countdown text to a specified date) -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.countdown.min.js')); ?>"></script>
    <!-- jQuery smartWizard facilitates steppable wizard content -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.smartWizard.min.js')); ?>"></script>
    <!-- Plyr (unified player for Video, Audio, Vimeo and Youtube) -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/plyr.polyfilled.min.js')); ?>"></script>
    <!-- Prism (displays formatted code boxes) -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/prism.js')); ?>"></script>
    <!-- ScrollMonitor (manages events for elements scrolling in and out of view) -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/scrollMonitor.js')); ?>"></script>
    <!-- Smooth scroll (animation to links in-page)-->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/smooth-scroll.polyfills.min.js')); ?>"></script>
    <!-- SVGInjector (replaces img tags with SVG code
      to allow easy inclusion of SVGs with the benefit of inheriting colors and styles)-->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/svg-injector.umd.production.js')); ?>"></script>
    <!-- TwitterFetcher (displays a feed of tweets from a specified account)-->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/twitterFetcher_min.js')); ?>"></script>
    <!-- Typed text (animated typing effect)-->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/typed.min.js')); ?>"></script>
    <!-- Slick Slider-->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/slick.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/custom-slick.js')); ?>"></script>
    <!-- Required theme scripts (Do not remove) -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/theme.js')); ?>"></script>
    <!-- Removes page load animation when window is finished loading -->
    <script type="text/javascript">
        window.addEventListener("load", function() {
            document.querySelector('body').classList.add('loaded');
        });
    </script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const listViewButton = document.querySelector('.list-view-button');
            const gridViewButton = document.querySelector('.grid-view-button');
            const list = document.querySelector('.our-products');
            // Retrieve the user's preferred view from the session
            const userViewPreference = localStorage.getItem('user_view_preference');
            // Set the initial view based on the user's preference
            if (userViewPreference === 'list') {
                list.classList.add('list-view-filter');
                listViewButton.classList.add('active');
            } else {
                list.classList.add('grid-view-filter');
                gridViewButton.classList.add('active');
            }
            listViewButton.addEventListener('click', function() {
                list.classList.remove('grid-view-filter');
                list.classList.add('list-view-filter');
                // Add "active" class to listViewButton and remove from gridViewButton
                listViewButton.classList.add('active');
                gridViewButton.classList.remove('active');
                // Store the user's preference in the session
                localStorage.setItem('user_view_preference', 'list');
            });
            gridViewButton.addEventListener('click', function() {
                list.classList.remove('list-view-filter');
                list.classList.add('grid-view-filter');
                // Add "active" class to gridViewButton and remove from listViewButton
                gridViewButton.classList.add('active');
                listViewButton.classList.remove('active');
                // Store the user's preference in the session
                localStorage.setItem('user_view_preference', 'grid');
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $("body").find(".product-details").parents('body').addClass("dark-header");
        });
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('form').parsley();
            $("#contact_btn").click(function() {
                var response = grecaptcha.getResponse();
                if (response != '') {
                    return true;
                } else {
                    event.preventDefault();
                    $('#contact-form').parsley().validate();
                    $("#captchaerrors").text("Invalid Captcha");
                    $("#captchaerrors").addClass("captchaError");
                    return false;
                }
            });
        });
        var imNotARobot = function() {
            var response = grecaptcha.getResponse();
            if (response != '') {
                $("#captchaerrors").text('');
                $("#captchaerrors").removeClass("captchaError");
            }
        };
    </script>
    
    <script>
        // Wait for the DOM to be ready
        document.addEventListener('DOMContentLoaded', function() {
            // Get all elements with the specified class
            var listItems = document.querySelectorAll('#list-left-menu .cat-list');
            // Flag to check if the click event is due to scrolling
            var isScrolling = false;
            // Add a click event listener to each list item
            listItems.forEach(function(item) {
                item.addEventListener('click', function() {
                    // If the click event is not due to scrolling, toggle the 'list-active' class
                    if (!isScrolling) {
                        // Remove 'list-active' class from all items
                        listItems.forEach(function(otherItem) {
                            if (otherItem !== item) {
                                otherItem.classList.remove('list-active');
                            }
                        });
                        // Toggle the 'list-active' class on the clicked item
                        item.classList.toggle('list-active');
                        // Toggle the 'food-menu-active' class on the body
                        document.body.classList.toggle('food-menu-active', hasActiveClass());
                    }
                });
            });
            // Function to check if any list item has 'list-active' class
            function hasActiveClass() {
                return Array.from(listItems).some(function(item) {
                    return item.classList.contains('list-active');
                });
            }
            // Add scroll event listener to set the scrolling flag
            window.addEventListener('scroll', function() {
                isScrolling = true;
                // Set a timeout to reset the scrolling flag after a short delay
                setTimeout(function() {
                    isScrolling = false;
                    // Check if there are no active list items, then remove 'food-menu-active' class
                    if (!hasActiveClass()) {
                        document.body.classList.remove('food-menu-active');
                    }
                }, 200); // Adjust the delay as needed
            });
        });
    </script>
    <?php echo $__env->yieldContent('page_scripts'); ?>
</html>
<?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/frontend/app.blade.php ENDPATH**/ ?>