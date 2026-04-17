<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Locations</h1>
                </div>
                <div class="col-sm-6">
                    <?php if(auth()->user()->hasPermissionTo('add-locations')): ?>
                    <a class="btn btn-primary float-right"
                       href="<?php echo e(route('locations.create')); ?>">
                        Add New
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('locations-table', [])->html();
} elseif ($_instance->childHasBeenRendered('tdogYAu')) {
    $componentId = $_instance->getRenderedChildComponentId('tdogYAu');
    $componentTag = $_instance->getRenderedChildComponentTagName('tdogYAu');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('tdogYAu');
} else {
    $response = \Livewire\Livewire::mount('locations-table', []);
    $html = $response->html();
    $_instance->logRenderedChild('tdogYAu', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\maharaja\resources\views/locations/index.blade.php ENDPATH**/ ?>