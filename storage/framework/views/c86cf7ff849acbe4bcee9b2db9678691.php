<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
    };

    <?php if(Session::has('message')): ?>
        var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
        switch(type){
            case 'info':
                toastr.info("<?php echo e(Session::get('message')); ?>");
                break;

            case 'warning':
                toastr.warning("<?php echo e(Session::get('message')); ?>");
                break;

            case 'success':
                toastr.success("<?php echo e(Session::get('message')); ?>");
                break;

            case 'error':
                toastr.error("<?php echo e(Session::get('message')); ?>");
                break;
            case 'danger':
                toastr.error("<?php echo e(Session::get('message')); ?>");
                break;
            default:
                toastr.info("<?php echo e(Session::get('message')); ?>");
        }
    <?php endif; ?>
    <?php if(Session::has('success')): ?>
            toastr.success("<?php echo e(session('success')); ?>");
    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        toastr.error("<?php echo e(session('error')); ?>");
    <?php endif; ?>
    <?php if(Session::has('danger')): ?>
        toastr.error("<?php echo e(session('danger')); ?>");
    <?php endif; ?>

</script>


<?php if($errors->any()): ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let toastMessageList = '<div>';
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastMessageList += '<li><?php echo e($error); ?></li>';
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        toastMessageList += '</div>';
        toastr.warning(toastMessageList);
    });
</script>
<?php endif; ?>
<?php /**PATH /media/anonymous/12a8dd6f-3122-4159-adcf-832ac2c3572d/laravel/cms_api_service/resources/views/toastrInit.blade.php ENDPATH**/ ?>