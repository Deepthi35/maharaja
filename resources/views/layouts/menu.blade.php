<!-- Dashboard -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>
<!-- Our Popular Dishes -->
<li class="nav-item">
    <a href="{{ url('admin/clienteles?type=our-popular-dishes') }}"
        class="nav-link {{ request()->input("type") == "our-popular-dishes"
            ? "active" : "" }}">
        <i class="nav-icon fas fa-cogs"></i>
        <p>Our Popular Dishes</p>
    </a>
</li>
<!-- Application Settings -->
@if (auth()->user()->can([
            'view-faqs',
            'view-faq_categories',
        ]))
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
                @if (auth()->user()->hasPermissionTo('view-faq_categories'))
                    <li class="nav-item">
                        <a href="{{ route('faqCategories.index') }}"
                            class="nav-link {{ Request::is('faqCategories*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-toolbox"></i>
                            <p>Faq Category</p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->hasPermissionTo('view-faqs'))
                    <li class="nav-item">
                        <a href="{{ route('faqs.index') }}"
                            class="nav-link {{ Request::is('faqs*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>List</p>
                        </a>
                    </li>
                @endif
               
            </ul>
        </li>
    </ul>
@endif
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
        @if (auth()->user()->hasPermissionTo('view-product_categories'))
            <li class="nav-item">
                <a href="{{ route('productCategories.index') }}"
                    class="nav-link {{ Request::is('productCategories*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Menu Categories</p>
                </a>
            </li>
        @endif
        @if (auth()->user()->hasPermissionTo('view-products'))
            <li class="nav-item">
                <a href="{{ route('products.index') }}" class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Menu List</p>
                </a>
            </li>
        @endif
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
        @if (auth()->user()->hasPermissionTo('view-slider'))
            <li class="nav-item">
                <a href="{{ route('sliders.index') }}" class="nav-link {{ Request::is('sliders*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sliders</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/settings?type=home-blocks') }}" class="nav-link {{ request()->input("type") == "home-blocks" ? "active" : "" }}">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>Home Blocks</p>
                </a>
            </li>
            
        @endif
    </ul>
</li>
<!-- Media -->

<li class="nav-item"> 
    <a href="{{ url('admin/settings?type=contact-details') }}"
    class="nav-link {{ request()->input('type') == 'contact-details' ? 'active' : '' }}"> 
    <i class="far fa-map nav-icon"></i>
    <p>Contact Details</p>
</a> </li>



{{-- @if (auth()->user()->hasPermissionTo('view-media')) --}}
    <li class="nav-item">
        <a href="{{ url('admin/media') }}" class="nav-link {{ Request::is('admin/media*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-images"></i>
            <p>Media</p>
        </a>
    </li>
{{-- @endif --}}

<!-- CMS -->
@if (auth()->user()->hasPermissionTo('view-cms'))
    <li class="nav-item">
        <a href="{{ route('cms.index') }}" class="nav-link {{ Request::is('cms*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>CMS Pages</p>
        </a>
    </li>
@endif

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
        @if (auth()->user()->hasPermissionTo('view-blog_categories'))
            <li class="nav-item">
                <a href="{{ route('blogCategories.index') }}"
                    class="nav-link {{ Request::is('blogCategories*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categories</p>
                </a>
            </li>
        @endif
        @if (auth()->user()->hasPermissionTo('view-blog_posts'))
            <li class="nav-item">
                <a href="{{ route('blogPosts.index') }}"
                    class="nav-link {{ Request::is('blogPosts*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lists</p>
                </a>
            </li>
        @endif
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
        @if (auth()->user()->hasPermissionTo('view-testimonial_categories'))
            <li class="nav-item">
                <a href="{{ route('testimonialCategories.index') }}"
                    class="nav-link {{ Request::is('testimonialCategories*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categories</p>
                </a>
            </li>
        @endif
        @if (auth()->user()->hasPermissionTo('view-testimonials'))
            <li class="nav-item">
                <a href="{{ route('testimonials.index') }}"
                    class="nav-link {{ Request::is('testimonials*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lists</p>
                </a>
            </li>
        @endif
    </ul>
</li>
<li class="nav-item"> <a href="{{ url('admin/settings?type=theme-settings') }}" class="nav-link {{ request()->input("type") == "theme-settings" ? "active" : "" }}"> <i class="nav-icon fas fa-cogs"></i> <p>Theme Settings</p> </a> </li>	

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
            <a href="{{ route('serviceCategories.index') }}"
                class="nav-link {{ Request::is('serviceCategories*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Service Categories</p>
            </a>
        </li>
        @if (auth()->user()->hasPermissionTo('view-clientele_categories'))
            <li class="nav-item">
                <a href="{{ route('clienteleCategories.index') }}"
                    class="nav-link {{ Request::is('clienteleCategories*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Client Categories</p>
                </a>
            </li>
        @endif
    </ul>
</li>
<!-- User Management -->
@if (auth()->user()->can(['view-permissions', 'view-roles', 'view-users', 'add-users']))
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
                @if (auth()->user()->hasPermissionTo('view-permissions'))
                    <li class="nav-item">
                        <a href="{{ route('permissions.index') }}"
                            class="nav-link {{ Request::is('permissions*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-lock"></i>
                            <p>Permissions</p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->hasPermissionTo('view-roles'))
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}"
                            class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->hasPermissionTo('view-users'))
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    </ul>
@endif


<!-- Application Settings -->
@if (auth()->user()->can([
            'view-application-setting-types',
            'view-application-setting-categories',
            'view-users',
            'view-application-settings',
        ]))
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
                @if (auth()->user()->hasPermissionTo('view-application-setting-types'))
                    <li class="nav-item">
                        <a href="{{ route('applicationSettingTypes.index') }}"
                            class="nav-link {{ Request::is('applicationSettingTypes*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>Types</p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->hasPermissionTo('view-application-setting-categories'))
                    <li class="nav-item">
                        <a href="{{ route('applicationSettingCategories.index') }}"
                            class="nav-link {{ Request::is('applicationSettingCategories*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-toolbox"></i>
                            <p>Categories</p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->hasPermissionTo('view-application-settings'))
                    <li class="nav-item">
                        <a href="{{ route('applicationSettings.index') }}"
                            class="nav-link {{ Request::is('applicationSettings*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    </ul>
@endif
<li class="nav-item">
                        <a href="{{ url('admin/services?type=catering-services') }}"
                            class="nav-link {{ request()->input("type") == "catering"
                                ? "active" : "" }}">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>Catering Services</p>
                        </a>
                    </li><li class="nav-item">
                        <a href="{{ url('admin/services?type=why-choose-us-catering') }}"
                            class="nav-link {{ request()->input("type") == "why-choose-us-catering"
                                ? "active" : "" }}">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>why-choose-us-catering</p>
                        </a>
                    </li><li class="nav-item">
                            <a href="{{ url('admin/settings?type=popup-settings') }}" class="nav-link {{ request()->input("type") == "popup-settings" ? "active" : "" }}">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Popup Settings</p>
                            </a>
                        </li>
                       <li class="nav-item">
                        <a href="{{ url('admin/clienteles?type=other-blogs') }}"
                            class="nav-link {{ request()->input("type") == "other-blogs"
                                ? "active" : "" }}">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>other blogs</p>
                        </a>
                    </li>