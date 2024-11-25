<?php $__env->startPush('content'); ?>

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
        <div class="col-xxl-8 mb-6 order-0">
            <div class="card">
            <div class="d-flex align-items-start row">
                <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-3">Welcome back <?php echo e(auth()->user()->name); ?>! 🎉</h5>
                    
                    <a href="<?php echo e(route('profile.show')); ?>" class="btn btn-sm btn-outline-primary">View Profile</a>
                </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-6">
                    <img
                    src="<?php echo e(asset('/')); ?>assets/img/illustrations/man-with-laptop.png"
                    height="175"
                    class="scaleX-n1-rtl"
                    alt="View Badge User" />
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 order-1">
            <div class="row">
            <?php if($pageCount > 0): ?>
            <div class="col-lg-3 col-md-3 col-3 mb-6">
                <div class="card h-100">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                    <div class="avatar flex-shrink-0">
                        
                        <i class="bx bx-book-content rounded bg-success" style="font-size: 30px"></i>
                    </div>
                    <div class="dropdown">
                        <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt3"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                        <a class="dropdown-item" href="<?php echo e(route('admin.pages.index')); ?>">View More</a>
                        
                        </div>
                    </div>
                    </div>
                    <p class="mb-1">Pages</p>
                    <h4 class="card-title mb-3"><?php echo e($pageCount); ?></h4>
                    
                </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if($sliderCount > 0): ?>
            <div class="col-lg-3 col-md-3 col-3 mb-6">
                <div class="card h-100">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                    <div class="avatar flex-shrink-0">
                        
                        <i class="bx bx-book-content rounded bg-info" style="font-size: 30px"></i>
                    </div>
                    <div class="dropdown">
                        <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt3"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                        <a class="dropdown-item" href="<?php echo e(route('admin.sliders.index')); ?>">View More</a>
                        
                        </div>
                    </div>
                    </div>
                    <p class="mb-1">Sliders</p>
                    <h4 class="card-title mb-3"><?php echo e($sliderCount); ?></h4>
                    
                </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if($categoryCount > 0): ?>
            <div class="col-lg-3 col-md-3 col-3 mb-6">
                <div class="card h-100">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                    <div class="avatar flex-shrink-0">
                        
                        <i class="bx bx-folder-open rounded bg-danger" style="font-size: 30px"></i>
                    </div>
                    <div class="dropdown">
                        <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt3"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                        <a class="dropdown-item" href="<?php echo e(route('admin.blog.categories.index')); ?>">View More</a>
                        
                        </div>
                    </div>
                    </div>
                    <p class="mb-1">Categories</p>
                    <h4 class="card-title mb-3"><?php echo e($categoryCount); ?></h4>
                    
                </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if($tagCount > 0): ?>
            <div class="col-lg-3 col-md-3 col-3 mb-6">
                <div class="card h-100">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                    <div class="avatar flex-shrink-0">
                        
                        <i class="tf-icons bx bx-purchase-tag-alt me-2 rounded bg-warning" style="font-size: 30px"></i>
                    </div>
                    <div class="dropdown">
                        <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt3"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                        <a class="dropdown-item" href="<?php echo e(route('admin.blog.tags.index')); ?>">View More</a>
                        
                        </div>
                    </div>
                    </div>
                    <p class="mb-1">Tags</p>
                    <h4 class="card-title mb-3"><?php echo e($tagCount); ?></h4>
                    
                </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if($postCount > 0): ?>
            <div class="col-lg-3 col-md-3 col-3 mb-6">
                <div class="card h-100">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                    <div class="avatar flex-shrink-0">
                        
                        <i class="tf-icons bx bx-file me-2 rounded bg-warning" style="font-size: 30px"></i>
                    </div>
                    <div class="dropdown">
                        <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt3"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                        <a class="dropdown-item" href="<?php echo e(route('admin.blog.posts.index')); ?>">View More</a>
                        
                        </div>
                    </div>
                    </div>
                    <p class="mb-1">Posts</p>
                    <h4 class="card-title mb-3"><?php echo e($postCount); ?></h4>
                    
                </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if($gallaryCount > 0): ?>
            <div class="col-lg-3 col-md-3 col-3 mb-6">
                <div class="card h-100">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                    <div class="avatar flex-shrink-0">
                        
                        <i class="tf-icons bx bx-file me-2 rounded bg-warning" style="font-size: 30px"></i>
                    </div>
                    <div class="dropdown">
                        <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt3"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                        <a class="dropdown-item" href="<?php echo e(route('admin.galleries.index')); ?>">View More</a>
                        
                        </div>
                    </div>
                    </div>
                    <p class="mb-1">Galleries</p>
                    <h4 class="card-title mb-3"><?php echo e($gallaryCount); ?></h4>
                    
                </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if($memberCount > 0): ?>
            <div class="col-lg-3 col-md-3 col-3 mb-6">
                <div class="card h-100">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                    <div class="avatar flex-shrink-0">
                        
                        <i class="tf-icons bx bx-file me-2 rounded bg-warning" style="font-size: 30px"></i>
                    </div>
                    <div class="dropdown">
                        <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt3"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                        <a class="dropdown-item" href="<?php echo e(route('admin.members.index')); ?>">View More</a>
                        
                        </div>
                    </div>
                    </div>
                    <p class="mb-1">Members</p>
                    <h4 class="card-title mb-3"><?php echo e($memberCount); ?></h4>
                    
                </div>
                </div>
            </div>
            <?php endif; ?>
            </div>
        </div>
        <!-- Total Revenue -->
        
        <!--/ Transactions -->
        </div>
    </div>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/anonymous/12a8dd6f-3122-4159-adcf-832ac2c3572d/laravel/cms_api_service/resources/views/admin/home.blade.php ENDPATH**/ ?>