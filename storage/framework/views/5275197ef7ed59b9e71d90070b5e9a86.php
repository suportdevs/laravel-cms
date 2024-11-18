<option value="<?php echo e($category->id); ?>" <?php echo e($category->id == ($data->id ?? NULL) ? 'selected' : ''); ?>>
    <?php echo e(str_repeat('--', $level)); ?> <?php echo e($category->name); ?>

</option>

<?php if($category->children && $category->children->isNotEmpty()): ?>
    <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('admin.layouts.partials.category-option', ['category' => $child, 'level' => $level + 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /media/anonymous/12a8dd6f-3122-4159-adcf-832ac2c3572d/laravel/cms_api_service/resources/views/admin/layouts/partials/category-option.blade.php ENDPATH**/ ?>