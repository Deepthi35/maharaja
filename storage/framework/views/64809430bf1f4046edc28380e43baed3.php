<!-- Dashboard -->
<li class="nav-item">
    <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e(Request::is('home') ? 'active' : ''); ?>">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>
<!-- Our Popular Dishes -->
<li class="nav-item">
    <a href="<?php echo e(url('admin/clienteles?type=our-popular-dishes')); ?>"
        class="nav-link <?php echo e(request()->input("type") == "our-popular-dishes"
            ? "active" : ""); ?>">
        <i class="nav-icon fas fa-cogs"></i>
        <p>Our Popular Dishes</p>
    </a>
</li>
<!-- Application Settings -->
<?php if(auth()->user()->can([
            'view-faqs',
            'view-faq_categories',
        ])): ?>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>
                    Faq's
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <?php if(auth()->user()->hasPermissionTo('view-faq_categories')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('faqCategories.index')); ?>"
                            class="nav-link <?php echo e(Request::is('faqCategories*') ? 'active' : ''); ?>">
                            <i class="nav-icon fas fa-toolbox"></i>
                            <p>Faq Category</p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo('view-faqs')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('faqs.index')); ?>"
                            class="nav-link <?php echo e(Request::is('faqs*') ? 'active' : ''); ?>">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>List</p>
                        </a>
                    </li>
                <?php endif; ?>
               
            </ul>
        </li>
    </ul>
<?php endif; ?>
<!-- Products -->
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tree"></i>
        <p>
            Menus
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <?php if(auth()->user()->hasPermissionTo('view-product_categories')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('productCategories.index')); ?>"
                    class="nav-link <?php echo e(Request::is('productCategories*') ? 'active' : ''); ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Menu Categories</p>
                </a>
            </li>
        <?php endif; ?>
        <?php if(auth()->user()->hasPermissionTo('view-products')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('products.index')); ?>" class="nav-link <?php echo e(Request::is('products*') ? 'active' : ''); ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Menu List</p>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</li>

<!-- Home Page -->
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>
            Home Page
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <?php if(auth()->user()->hasPermissionTo('view-slider')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('sliders.index')); ?>" class="nav-link <?php echo e(Request::is('sliders*') ? 'active' : ''); ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sliders</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(url('admin/settings?type=home-blocks')); ?>" class="nav-link <?php echo e(request()->input("type") == "home-blocks" ? "active" : ""); ?>">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>Home Blocks</p>
                </a>
            </li>
            
        <?php endif; ?>
    </ul>
</li>
<!-- Media -->

<li class="nav-item"> 
    <a href="<?php echo e(url('admin/settings?type=contact-details')); ?>"
    class="nav-link <?php echo e(request()->input('type') == 'contact-details' ? 'active' : ''); ?>"> 
    <i class="far fa-map nav-icon"></i>
    <p>Contact Details</p>
</a> </li>




    <li class="nav-item">
        <a href="<?php echo e(url('admin/media')); ?>" class="nav-link <?php echo e(Request::is('admin/media*') ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-images"></i>
            <p>Media</p>
        </a>
    </li>


<!-- CMS -->
<?php if(auth()->user()->hasPermissionTo('view-cms')): ?>
    <li class="nav-item">
        <a href="<?php echo e(route('cms.index')); ?>" class="nav-link <?php echo e(Request::is('cms*') ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>CMS Pages</p>
        </a>
    </li>
<?php endif; ?>

<!-- Blog -->
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>
            Blog
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <?php if(auth()->user()->hasPermissionTo('view-blog_categories')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('blogCategories.index')); ?>"
                    class="nav-link <?php echo e(Request::is('blogCategories*') ? 'active' : ''); ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categories</p>
                </a>
            </li>
        <?php endif; ?>
        <?php if(auth()->user()->hasPermissionTo('view-blog_posts')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('blogPosts.index')); ?>"
                    class="nav-link <?php echo e(Request::is('blogPosts*') ? 'active' : ''); ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lists</p>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</li>
<!-- Testimonials -->
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>
            Testimonials
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <?php if(auth()->user()->hasPermissionTo('view-testimonial_categories')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('testimonialCategories.index')); ?>"
                    class="nav-link <?php echo e(Request::is('testimonialCategories*') ? 'active' : ''); ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categories</p>
                </a>
            </li>
        <?php endif; ?>
        <?php if(auth()->user()->hasPermissionTo('view-testimonials')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('testimonials.index')); ?>"
                    class="nav-link <?php echo e(Request::is('testimonials*') ? 'active' : ''); ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lists</p>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</li>
<li class="nav-item"> <a href="<?php echo e(url('admin/settings?type=theme-settings')); ?>" class="nav-link <?php echo e(request()->input("type") == "theme-settings" ? "active" : ""); ?>"> <i class="nav-icon fas fa-cogs"></i> <p>Theme Settings</p> </a> </li>	

<!-- Services -->
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>
            Page Categories
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <!-- Services -->
        <li class="nav-item">
            <a href="<?php echo e(route('serviceCategories.index')); ?>"
                class="nav-link <?php echo e(Request::is('serviceCategories*') ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Service Categories</p>
            </a>
        </li>
        <?php if(auth()->user()->hasPermissionTo('view-clientele_categories')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('clienteleCategories.index')); ?>"
                    class="nav-link <?php echo e(Request::is('clienteleCategories*') ? 'active' : ''); ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Client Categories</p>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</li>
<!-- User Management -->
<?php if(auth()->user()->can(['view-permissions', 'view-roles', 'view-users', 'add-users'])): ?>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>
                    User Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <?php if(auth()->user()->hasPermissionTo('view-permissions')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('permissions.index')); ?>"
                            class="nav-link <?php echo e(Request::is('permissions*') ? 'active' : ''); ?>">
                            <i class="nav-icon fas fa-user-lock"></i>
                            <p>Permissions</p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo('view-roles')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('roles.index')); ?>"
                            class="nav-link <?php echo e(Request::is('roles*') ? 'active' : ''); ?>">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo('view-users')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('users.index')); ?>"
                            class="nav-link <?php echo e(Request::is('users*') ? 'active' : ''); ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
    </ul>
<?php endif; ?>


<!-- Application Settings -->
<?php if(auth()->user()->can([
            'view-application-setting-types',
            'view-application-setting-categories',
            'view-users',
            'view-application-settings',
        ])): ?>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>
                    Application Settings
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <?php if(auth()->user()->hasPermissionTo('view-application-setting-types')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('applicationSettingTypes.index')); ?>"
                            class="nav-link <?php echo e(Request::is('applicationSettingTypes*') ? 'active' : ''); ?>">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>Types</p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo('view-application-setting-categories')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('applicationSettingCategories.index')); ?>"
                            class="nav-link <?php echo e(Request::is('applicationSettingCategories*') ? 'active' : ''); ?>">
                            <i class="nav-icon fas fa-toolbox"></i>
                            <p>Categories</p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo('view-application-settings')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('applicationSettings.index')); ?>"
                            class="nav-link <?php echo e(Request::is('applicationSettings*') ? 'active' : ''); ?>">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
    </ul>
<?php endif; ?>
<li class="nav-item">
                        <a href="<?php echo e(url('admin/services?type=catering-services')); ?>"
                            class="nav-link <?php echo e(request()->input("type") == "catering"
                                ? "active" : ""); ?>">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>Catering Services</p>
                        </a>
                    </li><li class="nav-item">
                        <a href="<?php echo e(url('admin/services?type=why-choose-us-catering')); ?>"
                            class="nav-link <?php echo e(request()->input("type") == "why-choose-us-catering"
                                ? "active" : ""); ?>">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>why-choose-us-catering</p>
                        </a>
                    </li><li class="nav-item">
                            <a href="<?php echo e(url('admin/settings?type=popup-settings')); ?>" class="nav-link <?php echo e(request()->input("type") == "popup-settings" ? "active" : ""); ?>">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Popup Settings</p>
                            </a>
                        </li>
                       <li class="nav-item">
                        <a href="<?php echo e(url('admin/clienteles?type=other-blogs')); ?>"
                            class="nav-link <?php echo e(request()->input("type") == "other-blogs"
                                ? "active" : ""); ?>">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>other blogs</p>
                        </a>
                    </li>

                    <?php if(auth()->user()->hasPermissionTo('view-locations')): ?>

<li class="nav-item">
    <a href="<?php echo e(route('locations.index')); ?>" class="nav-link <?php echo e(Request::is('locations*') ? 'active' : ''); ?>">
        <i class="nav-icon fas fa-home"></i>
        <p>Locations</p>
    </a>
</li>
<?php endif; ?>
<?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/layouts/menu.blade.php ENDPATH**/ ?>