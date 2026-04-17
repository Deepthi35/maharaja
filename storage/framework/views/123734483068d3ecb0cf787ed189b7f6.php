<?php if (isset($component)) { $__componentOriginal97eb5b161211c0da08650c9299ba5f38 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97eb5b161211c0da08650c9299ba5f38 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'laravel-ui-adminlte::components.adminlte-layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('laravel-ui-adminlte::adminlte-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php echo \Livewire\Livewire::styles(); ?>


    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Main Header -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item user-menu">
                        <a href="<?php echo e(url('/')); ?>" class="nav-link" target="_blank">
                            <i class="fa fa-home"></i>
                            <span class="d-none d-md-inline">Frontend</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo e(asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('logo'))); ?>"
                                class="user-image img-circle elevation-2"
                                alt="<?php echo e(applicationSettingsAltText('logo')); ?>">
                            <span class="d-none d-md-inline"><?php echo e(Auth::user()->name); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <img src="<?php echo e(asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('logo'))); ?>"
                                    class="img-circle elevation-2" alt="<?php echo e(applicationSettingsAltText('logo')); ?>">
                                <p>
                                    <?php echo e(Auth::user()->name); ?>

                                    <small>Member since <?php echo e(Auth::user()->created_at->format('M. Y')); ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                <a href="#" class="btn btn-default btn-flat float-right"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sign out
                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- Left side column. contains the logo and sidebar -->
            <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <!-- Main Footer -->
            <footer class="main-footer">

                &copy; Maharaja Restaurant <?php echo e(now()->year); ?>. All right reserved
            </footer>
        </div>
        <!-- Livewire -->
        <script src="//unpkg.com/alpinejs" defer></script>
        <?php echo \Livewire\Livewire::scripts(); ?>

        <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
        <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.2.0/dist/livewire-sortable.js"></script>
        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <!-- Toastr -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <?php echo $__env->make('common.flash-toastr-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Sweet Alert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.0/tinymce.min.js"
            integrity="sha512-E2dqytT185qVoAL0sfqr39BLHEBQtmZze59ChMjYi4vRUW6BzIBLZAqErdQAAAJX8bkFq2kQgQL9Lbpm8Uuw0Q=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </body>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal97eb5b161211c0da08650c9299ba5f38)): ?>
<?php $attributes = $__attributesOriginal97eb5b161211c0da08650c9299ba5f38; ?>
<?php unset($__attributesOriginal97eb5b161211c0da08650c9299ba5f38); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97eb5b161211c0da08650c9299ba5f38)): ?>
<?php $component = $__componentOriginal97eb5b161211c0da08650c9299ba5f38; ?>
<?php unset($__componentOriginal97eb5b161211c0da08650c9299ba5f38); ?>
<?php endif; ?>
<?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/layouts/app.blade.php ENDPATH**/ ?>