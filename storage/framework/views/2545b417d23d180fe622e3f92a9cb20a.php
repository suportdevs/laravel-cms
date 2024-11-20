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
            <a href="<?php echo e(route('admin.blog.pages.index')); ?>">Pages</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>

    <form action="<?php echo e(route('admin.blog.pages.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                      <div class="mb-5">
                        <label for="name" class="form-label"><b>Name</b> <b class="text-danger">*</b></label>
                        <input type="text" class="form-control border-radius-5" id="name" name="name" placeholder="Name" required>
                      </div>
                      <div class="mb-5">
                          <label for="permalink" class="form-label"><b>Permalink</b> <b class="text-danger"><?php echo e($maxId ? '*' : ''); ?></b></label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text text-gray" id="basic-addon34"><?php echo e($maxId ? route('home') : ''); ?></span>
                            <input type="text" class="form-control" name="permalink" id="permalink" <?php echo e($maxId ? 'required' : ''); ?> value="<?php echo e(!$maxId ? route('home') : ''); ?>" <?php echo e(!$maxId ? 'readonly' : ''); ?>>
                          </div>
                        </div>
                        <div class="mb-5">
                            <label for="excerpt" class="form-label"><b>Description</b></label>
                            <textarea name="excerpt" id="excerpt" rows="3" class="form-control border-radius-5" placeholder="Short Description"></textarea>
                        </div>
                        <div class="mb-5">
                            <label for="content" class="form-label"><b>Content</b></label>
                            <textarea name="content" id="content" rows="10" class="form-control border-radius-5" placeholder="Content"></textarea>
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
                                    <input type="text" class="form-control border-radius-5" id="seo_title" name="seo_title" placeholder="Title">
                                </div>
                                <div class="mb-5">
                                    <label for="seo_description" class="form-label">SEO Description</label>
                                    <textarea name="seo_description" id="seo_description" rows="3" class="form-control border-radius-5" placeholder="SEO Description"></textarea>
                                </div>
                                <div class="mb-5">
                                    <label for="seoFormFile" class="form-label">SEO Image</label>
                                    <br>
                                    <div class="image-preview-wrapper">
                                        <img
                                            id="seoImagePreview"
                                            class="preview-image"
                                            data-default="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                            src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
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
                                        <input name="is_index" class="form-check-input" type="radio" value="1" id="indexYes" checked>
                                        <span>Index</span>
                                    </label>
                                    <label for="indexNo">
                                        <input name="is_index" class="form-check-input" type="radio" value="0" id="indexNo">
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
                        <label for="template" class="form-label">Selete Template</label>
                        <select name="template" id="template" class="form-select select2search" data-control="select2" >
                            <option value="default">Default</option>
                            <option value="no_sidebar">No Sidebar</option>
                        </select>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="card-header p-4 border-bottom">
                        <h5>Status <b class="text-danger">*</b></h5>
                    </div>
                    <div class="card-body mt-4">
                        <label for="status" class="form-label">Select Status</label>
                        <select name="status" id="status" class="form-select select2search" data-control="select2" >
                            <option value="Published">Published</option>
                            <option value="Draft">Draft</option>
                            <option value="Pending">Pending</option>
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
                                    data-default="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                    src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
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
                                    data-default="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                    src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
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
        <?php if($maxId): ?>
            return function (...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), delay);
            };
        <?php endif; ?>
    }

    document.getElementById('name').addEventListener('keyup', debounce(function () {
        const nameValue = this.value;

        const slug = nameValue
            .toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
        <?php if($maxId): ?>
            document.getElementById('permalink').value = slug;
        <?php endif; ?>
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
            const defaultImage = previewImage.dataset.default || '';
            previewImage.src = defaultImage;
            e.target.classList.add('d-none');
            fileInput.value = '';
        }
    });

    ClassicEditor
            .create( document.querySelector( '#content' ), {
              ckfinder: {
                uploadUrl: "<?php echo e(route('admin.blog.pages.ckeditor.image.upload').'?_token='.csrf_token()); ?>"
              }
            } )
            .then((editor) => {
                editor.ui.view.editable.element.style.height = '300px';
              console.log(editor);
            })
            .catch( error => {
                console.error( error );
            } );
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/anonymous/12a8dd6f-3122-4159-adcf-832ac2c3572d/laravel/cms_api_service/resources/views/admin/pages/create.blade.php ENDPATH**/ ?>