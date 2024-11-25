<?php
    $menuData = App\Models\Menu::whereJsonContains('locations', 'main-menu')->first();
    $menuItems = json_decode($menuData->dataset ?? '{}', true);

    // Get the nested menu
    $nestedMenu = buildNestedMenu($menuItems);
    $megaMenuShowingRaw = 6;
?>

<?php $__currentLoopData = $nestedMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(empty($data['children'])): ?>
        <li class="single off-arrow">
            <a class="single <?php echo e($data['css_class'] ?? ''); ?>"
               href="<?php echo e(url($data['permalink'] ?? '#')); ?>"
               target="<?php echo e($data['target'] ?? '_self'); ?>">
                <?php if(!empty($data['icon_font'])): ?>
                <i class="<?php echo e($data['icon_font']); ?>"></i>
                <?php endif; ?>
                <?php echo e($data['title'] ?? ''); ?>

            </a>
        </li>
    <?php endif; ?>

    <?php if(!empty($data['children'])): ?>
        <li class="single-items <?php echo e($device == 'mobile' ? 'rts-dropdown' : ''); ?>">
            <a class="navmain" href="#"><?php echo e($data['title'] ?? ''); ?></a>

            <?php if(!empty($data['children']) && count($data['children']) > $megaMenuShowingRaw): ?>
                <ul class="submenu mega-menu pages">
                    <?php
                        // Divide the children into 3 columns
                        $childChunks = array_chunk($data['children'], ceil(count($data['children']) / 3));
                    ?>
                    <li class="mega-menu-1">
                        <?php $__currentLoopData = $childChunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <ul class="mega-1">
                                <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(url($child['permalink'] ?? '#')); ?>"
                                           target="<?php echo e($child['target'] ?? '_self'); ?>">
                                           <?php if(!empty($child['icon_font'])): ?>
                                           <i class="<?php echo e($child['icon_font']); ?>"></i>
                                           <?php endif; ?>
                                            <?php echo e($child['title'] ?? ''); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </li>
                </ul>
            <?php else: ?>
                <ul class="submenu explore">
                    <?php $__currentLoopData = $data['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="single">
                            <a href="<?php echo e(url($child['permalink'] ?? '#')); ?>"
                               target="<?php echo e($child['target'] ?? '_self'); ?>">
                               <?php if(!empty($child['icon_font'])): ?>
                               <i class="<?php echo e($child['icon_font']); ?>"></i>
                               <?php endif; ?>
                                <?php echo e($child['title'] ?? ''); ?>

                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /media/anonymous/12a8dd6f-3122-4159-adcf-832ac2c3572d/laravel/cms_api_service/resources/views/frontend/partials/main-menu.blade.php ENDPATH**/ ?>