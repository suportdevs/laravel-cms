<div class="table-responsive text-nowrap" >
    <table class="table table-hover" id="check">
        <thead>
        <tr class="bg-secondary">
            <th><input class="form-check-input" type="checkbox" value="" id="check_all"></th>
            <th>ID</th>
            <th>IMAGE</th>
            <th>NAME</th>
            <th>EMEAIL</th>
            <th>PHONE</th>
            <th>CREATED AT</th>
            <th>STATUS</th>
            <th>ACTIONS</th>
        </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <?php $__empty_1 = true; $__currentLoopData = $dataset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><input class="form-check-input" type="checkbox" name="data[]" value="<?php echo e($data->_key); ?>"></td>
                <td><?php echo e(serialNo($loop->iteration, $dataset->perPage())); ?></td>
                <td><img src="<?php echo e($data->getFirstMediaUrl('image')); ?>" alt="<?php echo e($data->name); ?>" style="width: 50px;"></td>
                <td><a href="<?php echo e(route('admin.blog.members.edit', $data->_key)); ?>"><?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?></a></td>
                <td><a href="<?php echo e(route('admin.blog.members.edit', $data->_key)); ?>"><?php echo e($data->email); ?></a></td>
                <td><a href="<?php echo e(route('admin.blog.members.edit', $data->_key)); ?>"><?php echo e($data->phone); ?></a></td>
                <td><?php echo e(date('d-m-Y', strtotime($data->created_at))); ?></td>
                <td class="text-center">
                    <span class="badge <?php echo e($data->status == 'Published' ? 'bg-success' : ($data->status == 'Draft' ? 'bg-secondary' : 'bg-warning')); ?>">
                        <?php echo e($data->status); ?>

                    </span>
                </td>
                <td>
                    <a class=" btn btn-icon btn-sm btn-primary" href="<?php echo e(route('admin.blog.members.edit', $data->_key)); ?>"><i class="bx bx-edit-alt me-1"></i></a>
                    <a class=" btn btn-icon btn-sm btn-danger" href="javascript:void(0);" onclick="singleDelete('<?php echo e(route('admin.blog.members.destroy', $data->_key)); ?>')"><i class="bx bx-trash me-1"></i></a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td class="text-center" colspan="9">No records found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="text-center" id="ajaxPaginate">
        <?php echo e($dataset->links()); ?>

    </div>
</div>
<?php /**PATH /media/anonymous/12a8dd6f-3122-4159-adcf-832ac2c3572d/laravel/cms_api_service/resources/views/admin/members/_list.blade.php ENDPATH**/ ?>