

<?php if(!empty($item['children'])): ?>
<?php
    pr($item['children']);
?>
    <ol class="dd-list">
        <?php $__currentLoopData = $item['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('admin.menus.partial-item', ['item' => $child], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
<?php else: ?>
    <li class="single-items off-arrow"><a class="single" href="contact.html"><?php echo e($item['title']); ?></a></li>
<?php endif; ?>
<?php /**PATH /media/anonymous/12a8dd6f-3122-4159-adcf-832ac2c3572d/laravel/cms_api_service/resources/views/frontend/partials/main-menu-item.blade.php ENDPATH**/ ?>