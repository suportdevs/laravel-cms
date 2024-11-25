<?php
    $dataset = $nestedMenu ?? json_decode($data->dataset ?? "{}", true);
?>

<div class="cf nestable-lists">

    <div class="dd" id="nestable">
        <ol class="dd-list">
            <?php $__currentLoopData = $dataset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('admin.menus.partial-item', ['item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#nestable').nestable();
})
</script>
<?php /**PATH /media/anonymous/12a8dd6f-3122-4159-adcf-832ac2c3572d/laravel/cms_api_service/resources/views/admin/menus/partial.blade.php ENDPATH**/ ?>