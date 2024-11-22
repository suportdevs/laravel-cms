<?php $__env->startPush('content'); ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a>Blogs</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('admin.pages.index')); ?>">Pages</a>
        </li>
        <li class="breadcrumb-item active">Edit ** <?php echo e($data->name); ?> **</li>
        </ol>
    </nav>
    <form action="<?php echo e(route('admin.pages.update', $data->_key)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                      <div class="mb-5">
                        <label for="name" class="form-label">Name <b class="text-danger">*</b></label>
                        <input type="text" class="form-control border-radius-5" id="name" name="name" placeholder="Name" value="<?php echo e($data->name); ?>" required>
                      </div>
                      <div class="mb-5">
                          <label for="permalink" class="form-label">Permalink <b class="text-danger">*</b></label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon34"><?php echo e(route('home')); ?>/</span>
                            <input type="text" class="form-control" name="permalink" id="permalink" value="<?php echo e($data->permalink); ?>" required>
                          </div>
                        </div>
                        <div class="mb-5">
                            <label for="excerpt" class="form-label">Description</label>
                            <textarea name="excerpt" id="excerpt" rows="3" class="form-control border-radius-5" placeholder="Short Description"><?php echo e($data->excerpt); ?></textarea>
                        </div>
                        <div class="mb-5">
                            <label for="content" class="form-label"><b>Content</b></label>
                            <textarea name="content" id="content" rows="10" class="form-control border-radius-5" placeholder="Content"><?php echo $data->content; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="accordion mt-4" id="accordionExample">
                    <div class="card accordion-item active">
                        <h2 class="accordion-header border-bottom mb-5" id="headingOne">
                            <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                                Search Engine Optimize
                            </button>
                        </h2>
                        <div class="px-5 mb-5">
                            Setup meta title & description to make your site easy to discovered on search engines such as Google
                        </div>
                        <div id="accordionOne" class="accordion-collapse collapse hide" data-bs-parent="#accordionExample">
                            <div class="px-5">
                                    <hr>
                            </div>
                            <div class="accordion-body">
                                <div class="mb-5">
                                    <label for="seo_title" class="form-label">SEO Title</label>
                                    <input type="text" class="form-control border-radius-5" id="seo_title" name="seo_title" value="<?php echo e($data->seo_title); ?>" placeholder="Title">
                                </div>
                                <div class="mb-5">
                                    <label for="seo_description" class="form-label">SEO Description</label>
                                    <textarea name="seo_description" id="seo_description" rows="3" class="form-control border-radius-5" placeholder="SEO Description"><?php echo e($data->seo_description); ?></textarea>
                                </div>
                                <div class="mb-5">
                                    <label for="seoFormFile" class="form-label">SEO Image</label>
                                    <br>
                                    <div class="image-preview-wrapper">
                                        <img
                                            id="seoImagePreview"
                                            class="preview-image"
                                            data-default="<?php echo e(!is_null($data->seo_image) ? $data->getFirstMediaUrl('seo_image') : 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png'); ?>"
                                            src="<?php echo e(!is_null($data->seo_image) ? $data->getFirstMediaUrl('seo_image') : 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png'); ?>"
                                            alt="Preview image"
                                            style="width: 150px;"
                                        >
                                        <button
                                            type="button"
                                            class="btn rounded-pill btn-icon btn-outline-secondary p-2 mt-2 d-none"
                                            data-remove-button
                                            data-target-preview="seoImagePreview"
                                            data-target-input="seoFormFile"
                                            style="position: absolute; top: 5px; left: 130px; width: 8px; height: 8px;"
                                        >
                                            &times;
                                        </button>
                                    </div>
                                    <input
                                        class="form-control"
                                        type="file"
                                        id="seoFormFile"
                                        name="seo_image"
                                        accept="image/jpeg, image/png"
                                        data-preview="seoImagePreview"
                                        style="opacity: 0; position: absolute; z-index: -1;"
                                        onchange="previewSelectedImage(this)"
                                    >
                                    <br>
                                    <b class="text-primary mt-2" onclick="document.getElementById('seoFormFile').click()" type="button">
                                        Choose Image
                                    </b>
                                </div>
                                <div class="mb-5">
                                    <label for="is_index_index">Index</label>
                                    <br>
                                    <label for="indexYes">
                                        <input name="is_index" class="form-check-input" type="radio" value="1" id="indexYes" <?php echo e($data->is_index == 1 ? 'checked' : ''); ?>>
                                        <span>Index</span>
                                    </label>
                                    <label for="indexNo">
                                        <input name="is_index" class="form-check-input" type="radio" value="0" id="indexNo" <?php echo e($data->is_index == 0 ? 'checked' : ''); ?>>
                                        <span>No Index</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-5">
                    <div class="card-header p-4 border-bottom">
                        <h5>Publish</h5>
                    </div>
                    <div class="card-body mt-4">
                        <button  type="submit" name="submitter"  class="btn btn-primary"><i class="bx bx-save"></i> Save</button>
                        <button type="submit" name="submitter" value="save"  class="btn btn-secondary"><i class="bx bx-exit"></i> Save & Exit</button>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="card-header p-4 border-bottom">
                        <h5>Template <b class="text-danger">*</b></h5>
                    </div>
                    <div class="card-body mt-4">
                        <select name="template" id="template" class="form-select">
                            <option value="default" <?php echo e($data->template == 'default' ? 'selected' : ''); ?>>Default</option>
                            <option value="no_sidebar" <?php echo e($data->template == 'no_sidebar' ? 'selected' : ''); ?>>No Sidebar</option>
                        </select>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="card-header p-4 border-bottom">
                        <h5>Status <b class="text-danger">*</b></h5>
                    </div>
                    <div class="card-body mt-4">
                        <select name="status" id="status" class="form-select">
                            <option value="Published" <?php echo e($data->status == 'Published' ? 'selected' : ''); ?>>Published</option>
                            <option value="Draft" <?php echo e($data->status == 'Draft' ? 'selected' : ''); ?>>Draft</option>
                            <option value="Pending" <?php echo e($data->status == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                        </select>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="card-header p-4 border-bottom">
                        <h5>Image</h5>
                    </div>
                    <div class="card-body mt-4">
                        <div class="mb-5 text-center">
                            <div class="image-preview-wrapper">
                                <img
                                    id="imagePreview"
                                    class="preview-image"
                                    data-default="<?php echo e(!is_null($data->image) ? $data->getFirstMediaUrl('image') : 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png'); ?>"
                                    src="<?php echo e(!is_null($data->image) ? $data->getFirstMediaUrl('image') : 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png'); ?>"
                                    alt="Preview image"
                                    style="width: 150px;"
                                >
                                <button
                                    type="button"
                                    class="btn rounded-pill btn-icon btn-outline-secondary p-2 mt-2 d-none"
                                    data-remove-button
                                    data-target-preview="imagePreview"
                                    data-target-input="formFile"
                                    style="position: absolute; top: 5px; left: 130px; width: 8px; height: 8px;"
                                >
                                    &times;
                                </button>
                            </div>
                            <input
                                class="form-control"
                                type="file"
                                id="formFile"
                                name="image"
                                accept="image/jpeg, image/png"
                                data-preview="imagePreview"
                                style="opacity: 0; position: absolute; z-index: -1;"
                                onchange="previewSelectedImage(this)"
                            >
                            <br>
                            <b class="text-primary mt-2" onclick="document.getElementById('formFile').click()" type="button">
                                Choose Image
                            </b>
                        </div>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="card-header p-4 border-bottom">
                        <h5>Banner Image (1920x170px)</h5>
                    </div>
                    <div class="card-body mt-4">
                        <div class="mb-5 text-center">
                            <div class="image-preview-wrapper">
                                <img
                                    id="bannerImagePreview"
                                    class="preview-image"
                                    data-default="<?php echo e($data->getFirstMediaUrl('banner_image') ? $data->getFirstMediaUrl('banner_image') : 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png'); ?>"
                                    src="<?php echo e($data->getFirstMediaUrl('banner_image') ? $data->getFirstMediaUrl('banner_image') : 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png'); ?>"
                                    alt="Preview image"
                                    style="width: 150px;"
                                >
                                <button
                                    type="button"
                                    class="btn rounded-pill btn-icon btn-outline-secondary p-2 mt-2 d-none"
                                    data-remove-button
                                    data-target-preview="bannerImagePreview"
                                    data-target-input="formFileBanner"
                                    style="position: absolute; top: 5px; left: 130px; width: 8px; height: 8px;"
                                >
                                    &times;
                                </button>
                            </div>
                            <input
                                class="form-control"
                                type="file"
                                id="formFileBanner"
                                name="banner_image"
                                accept="image/jpeg, image/png"
                                data-preview="bannerImagePreview"
                                style="opacity: 0; position: absolute; z-index: -1;"
                                onchange="previewSelectedImage(this)"
                            >
                            <br>
                            <b class="text-primary mt-2" onclick="document.getElementById('formFileBanner').click()" type="button">
                                Choose Image
                            </b>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('assets/vendor/ckeditor5/ckeditor.js')); ?>"></script>
<script>
    function debounce(func, delay) {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), delay);
        };
    }

    document.getElementById('name').addEventListener('keyup', debounce(function () {
        const nameValue = this.value;

        const slug = nameValue
            .toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');

        document.getElementById('permalink').value = slug;
    }, 300));

    function previewSelectedImage(input) {
        const file = input.files[0];
        const previewId = input.dataset.preview;
        const previewImage = document.getElementById(previewId);
        const removeButton = document.querySelector(`[data-remove-button][data-target-preview="${previewId}"]`);
        const reader = new FileReader();

        if (file) {
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                removeButton.classList.remove('d-none');
            };
            reader.onerror = function () {
                console.error("Error reading the file. Please try again.");
            };
            reader.readAsDataURL(file);
        } else {
            console.warn("No file selected.");
        }
    }

    // Event delegation for removing the selected image
    document.addEventListener('click', function (e) {
        if (e.target.matches('[data-remove-button]')) {
            const previewId = e.target.dataset.targetPreview;
            const inputId = e.target.dataset.targetInput;
            const previewImage = document.getElementById(previewId);
            const fileInput = document.getElementById(inputId);
            // Reset to default image
            const defaultImage = previewImage.dataset.default || '';
            previewImage.src = defaultImage;
            // Hide the remove button
            e.target.classList.add('d-none');
            // Clear the file input
            fileInput.value = '';
        }
    });


    ClassicEditor
            .create( document.querySelector( '#content' ), {
              ckfinder: {
                uploadUrl: "<?php echo e(route('admin.pages.ckeditor.image.upload').'?_token='.csrf_token()); ?>"
              }
            } )
            .then((editor) => {
                editor.ui.view.editable.element.style.height = 'auto';
              console.log(editor);
            })
            .catch( error => {
                console.error( error );
            } );
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/anonymous/12a8dd6f-3122-4159-adcf-832ac2c3572d/laravel/cms_api_service/resources/views/admin/pages/edit.blade.php ENDPATH**/ ?>
