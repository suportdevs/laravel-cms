<li class="dd-item" data-id="<?php echo e($item['id']); ?>" data-label="<?php echo e($item['label']); ?>" data-model_id="<?php echo e($item['model_id'] ?? NULL); ?>" data-reference="<?php echo e($item['reference'] ?? NULL); ?>">
    <div class="dd-handle p-0 d-flex">
    </div>
    <div class="d-flex align-items-center justify-content-between mt-3">
        <div class="d-flex align-items-center justify-content-between ms-2" style="flex: 1; border-right: 1px solid #ccc">
            <span class="flex-1"><?php echo e($item['title']); ?></span>
            <span class="text-end me-2 "><?php echo e($item['label'] ?? ''); ?></span>
        </div>
        <button type="button" href="#" style="height: 40px; width: 40px; border-radius: 0px 4px 4px 0px;" class="dd-content-collapse-toggle-btn border-1 border-gray text-center d-flex align-items-center justify-content-center" data-id="<?php echo e($item['id']); ?>"><i class="bx bx-chevron-down"></i></button>
    </div>
    <div class="dd-content mb-3" data-content="<?php echo e($item['id']); ?>" style="display: none;">
        <div class="menu-structure-node-content p-5" id="menu-structure-node-form" style="border:1px solid #ccc; border-top: none;">
            <input class="menu_id" name="menu_id" type="hidden" value="1">
            <!-- Title Field -->
            <div class="mb-3 position-relative">
                <label for="menu-node-title-new" class="form-label" data-update="title">Title</label>
                <input class="form-control" id="custom-menu-node-title-new" name="title" type="text" value="<?php echo e($item['title']); ?>">
            </div>

            <!-- URL Field -->
            <div class="mb-3 position-relative">
                <label for="menu-node-url-new" class="form-label" data-update="custom-url">URL</label>
                <input class="form-control" data-old="/" id="custom-menu-node-url-new" name="url" type="text" value="<?php echo e($item['permalink'] ?? NULL); ?>">
            </div>

            <!-- Icon Font Field -->
            <div class="mb-3 position-relative">
                <label for="icon_font" class="form-label" data-update="icon">Icon</label>
                <select name="icon" id="custom-menu-node-icon-new" class="form-select" data-control="select2" data-placeholder="Ex: box box-home">
                    <option></option>
                    <?php $__currentLoopData = get_box_icons(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($icon); ?>" data-icon="<?php echo e($icon); ?>" <?php echo e(($item['icon_font'] ?? NULL) == $icon ? 'selected' : ''); ?>><?php echo e($icon); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <!-- CSS Class Field -->
            <div class="mb-3 position-relative">
                <label for="menu-node-css-class-new" class="form-label" data-update="css_class">CSS class</label>
                <input class="form-control" id="custom-menu-node-css-class-new" name="css_class" type="text" value="<?php echo e($item['css_class'] ?? NULL); ?>">
            </div>

            <!-- Target Field -->
            <div class="mb-3 position-relative">
                <label for="menu-node-target-new" class="form-label" data-update="target">Target</label>
                <select class="form-control form-select" id="custom-menu-node-target-new" name="target">
                    <option value="_self" <?php echo e(($item['target'] ?? NULL) == '_self' ? 'seleted' : ''); ?>>Open link directly</option>
                    <option value="_blank" <?php echo e(($item['target'] ?? NULL) == '_blank' ? 'seleted' : ''); ?>>Open link in new tab</option>
                </select>
            </div>
            <div class="mb-3 position-relative text-end">
                <button class="btn btn-sm bg-danger text-white">Remove</button>
            </div>
        </div>
    </div>

    <?php if(!empty($item['children'])): ?>
        <ol class="dd-list">
            <?php $__currentLoopData = $item['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('admin.menus.partial-item', ['item' => $child], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    <?php endif; ?>
</li>
<?php /**PATH /media/anonymous/12a8dd6f-3122-4159-adcf-832ac2c3572d/laravel/cms_api_service/resources/views/admin/menus/partial-item.blade.php ENDPATH**/ ?>