<?php
    $dataset = json_decode($data->dataset ?? "{}", true);
?>

<div class="cf nestable-lists">

    <div class="dd" id="nestable">
        <ol class="dd-list">
            <?php $__currentLoopData = $dataset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <li class="dd-item" data-id="<?php echo e($item['id']); ?>">
                <div class="dd-handle p-0 d-flex">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center justify-content-between ms-2" style="flex: 1; border-right: 1px solid #ccc">
                            <span class="flex-1"><?php echo e($item['title']); ?></span>
                            <span class="text-end me-2 "><?php echo e($item['label'] ?? ''); ?></span>
                        </div>
                    </div>
                    <button type="button" href="#" style="height: 40px; width: 40px;" class="dd-content-collapse-toggle-btn border-1 border-gray text-center d-flex align-items-center justify-content-center" data-id="<?php echo e($item['id']); ?>"><i class="bx bx-chevron-down"></i></button>
                </div>
                <div class="dd-content" data-content="<?php echo e($item['id']); ?>" style="display: none;">
                    <input type="text" name="title" data-name='Home' placeholder="Title" value="item 1 title">
                    <input type="text" name="link" data-link='Home' placeholder="Link" value="item 1 Link">
                </div>
            </li>
            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ol>
    </div>

</div>

<?php /**PATH /media/anonymous/12a8dd6f-3122-4159-adcf-832ac2c3572d/laravel/cms_api_service/resources/views/admin/menus/partial.blade.php ENDPATH**/ ?>