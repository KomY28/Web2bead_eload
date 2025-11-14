<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Üzenet megtekintése')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="border-b pb-4 mb-4">
                        <h3 class="text-2xl font-semibold mb-2"><?php echo e($uzenet->targy); ?></h3>
                        
                        <div class="text-sm text-gray-600">
                            <strong>Küldő:</strong> <?php echo e($uzenet->kuldo->name); ?> (<?php echo e($uzenet->kuldo->email); ?>)
                        </div>
                        <div class="text-sm text-gray-600">
                            <strong>Címzett:</strong> <?php echo e($uzenet->cimzett->name); ?> (<?php echo e($uzenet->cimzett->email); ?>)
                        </div>
                        <div class="text-sm text-gray-600">
                            <strong>Dátum:</strong> <?php echo e($uzenet->created_at->format('Y. m. d. H:i')); ?>

                        </div>
                        
                        <?php if($uzenet->olvasva_ekkor): ?>
                        <div class="text-sm text-green-600 mt-1">
                            <strong>Olvasva:</strong> <?php echo e($uzenet->olvasva_ekkor->format('Y. m. d. H:i')); ?>

                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="prose max-w-none">
                        
                        <?php echo nl2br(e($uzenet->tartalom)); ?>

                    </div>

                    <div class="mt-6 border-t pt-4">
                        <a href="<?php echo e(route('uzenetek.index')); ?>" class="text-gray-600">Vissza a postafiókhoz</a>
                        
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH D:\nb1app\resources\views/uzenetek/show.blade.php ENDPATH**/ ?>