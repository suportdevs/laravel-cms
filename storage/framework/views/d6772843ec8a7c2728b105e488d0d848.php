<?php $__env->startPush('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Appearance</a>
                </li>
                <li class="breadcrumb-item active">Theme</li>
                <li class="breadcrumb-item active">Settins</li>
            </ol>
        </nav>

        <div class="card postion-relative border border-light">
            <!-- Loader Overlay -->
            <div class="loader-overlay d-none">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only"></span>
                </div>
                <b>Loading...</b>
            </div>
            <div class="card-header overflow-hidden d-flex align-items-center justify-content-between">
                <h5>Site/Theme Settins</h5>
                <div class="text-end">
                    <button class="btn btn-primary saveBtn">Save Changes</button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-4 col-12 mb-6 mb-md-0">
                        <div class="list-group" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-general-list"
                                data-bs-toggle="list" href="#list-general" aria-selected="false" role="tab"
                                tabindex="-1"><i class="bx bx-cog"></i> General</a>
                            <a class="list-group-item list-group-item-action" id="list-logo-list" data-bs-toggle="list"
                                href="#list-logo" aria-selected="true" role="tab"><i class="bx bx-image-add"></i>
                                Logo</a>
                            <a class="list-group-item list-group-item-action" id="list-page-list" data-bs-toggle="list"
                                href="#list-page" aria-selected="false" role="tab" tabindex="-1"><i
                                    class="bx bx-book-content"></i> Page</a>
                            <a class="list-group-item list-group-item-action" id="list-blog-list" data-bs-toggle="list"
                                href="#list-blog" aria-selected="false" role="tab" tabindex="-1"><i
                                    class="bx bx-file"></i> Blog</a>
                            <a class="list-group-item list-group-item-action" id="list-typography-list"
                                data-bs-toggle="list" href="#list-typography" aria-selected="false" role="tab"
                                tabindex="-1"><i class="bx bx-text"></i> Typography</a>
                            <a class="list-group-item list-group-item-action" id="list-social-links-list"
                                data-bs-toggle="list" href="#list-social-links" aria-selected="false" role="tab"
                                tabindex="-1">Social Links</a>
                        </div>
                    </div>
                    <div class="col-md-8 col-12">
                        <div class="tab-content ">
                            <div class="tab-pane fade active show" id="list-general" role="tabpanel"
                                aria-labelledby="list-general-list">
                                <form id="generalForm" enctype="multipart/form-data" method="POST">
                                    <div class="mb-4">
                                        <label for="primary_color" class="mb-3"><b>Primary Color</b></label>
                                        <div id="colorPicker"></div>
                                        <input type="hidden" id="primary_color" name="primary_color" value="" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="bannerImagePreview" class="mb-3"><b>Default banner image
                                                (1920*170px)</b></label>
                                        <div class="mb-5">
                                            <div class="image-preview-wrapper">
                                                <img id="bannerImagePreview" class="preview-image"
                                                    data-default="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                                    src="<?php echo e($data->getFirstMediaUrl('banner_image') ?? 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png'); ?>"
                                                    alt="Preview image" style="width: 150px"
                                                    onclick="document.getElementById('formFileBanner').click()" />
                                                <button type="button"
                                                    class="btn rounded-pill btn-icon btn-outline-secondary p-2 mt-2 d-none"
                                                    data-remove-button data-target-preview="bannerImagePreview"
                                                    data-target-input="formFileBanner"
                                                    style="
                                                        position: absolute;
                                                        top: 5px;
                                                        left: 130px;
                                                        width: 8px;
                                                        height: 8px;
                                                    ">
                                                    &times;
                                                </button>
                                            </div>
                                            <input class="form-control" type="file" id="formFileBanner" name="banner_image"
                                                accept="image/jpeg, image/png" data-preview="bannerImagePreview"
                                                style="opacity: 0; position: absolute; z-index: -1"
                                                onchange="previewSelectedImage(this)" />
                                            <br />
                                            <b class="text-primary mt-2"
                                                onclick="document.getElementById('formFileBanner').click()" type="button">
                                                Choose Image
                                            </b>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="site_description" class="mb-3"><b>Site Description</b></label>
                                        <textarea name="site_description" id="site_description" rows="4" class="form-control"><?php echo e($data->general['site_description'] ?? ''); ?></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="address" class="mb-3"><b>Address</b></label>
                                        <input name="address" id="address" class="form-control"
                                            placeholder="Address..." value="<?php echo e($data->general['address'] ?? ''); ?>"/>
                                    </div>
                                    <div class="mb-4">
                                        <label for="website" class="mb-3"><b>Website</b></label>
                                        <input name="website" id="website" class="form-control"
                                            value="<?php echo e($data->general['website'] ?? route('home')); ?>" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="mb-3"><b>Email</b></label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Email..." value="<?php echo e($data->general['email'] ?? ''); ?>" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="site_title" class="mb-3"><b>Site Title</b></label>
                                        <input type="text" name="site_title" id="site_title" class="form-control"
                                            placeholder="Email..." value="<?php echo e($data->general['site_title'] ?? ''); ?>" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="seo_title" class="mb-3"><b>SEO Title</b></label>
                                        <input type="text" name="seo_title" id="seo_title" class="form-control"
                                            placeholder="Email..." value="<?php echo e($data->general['seo_title'] ?? ''); ?>" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="seo_description" class="mb-3"><b>SEO Description</b></label>
                                        <textarea name="seo_description" id="seo_description" rows="4" class="form-control"><?php echo e($data->general['seo_description'] ?? ''); ?></textarea>
                                    </div>
                                    <div class="mb-5">
                                        <label for="is_index_index" class="mb-3">Index</label>
                                        <br />
                                        <label for="indexYes" class="mb-3">
                                            <input name="is_index" class="form-check-input" type="radio" value="1"
                                                id="indexYes" <?php echo e(($data->general['is_index'] ?? NULL) == 1 ? 'checked' : ''); ?> />
                                            <span>Index</span>
                                        </label>
                                        <label for="indexNo" class="mb-3">
                                            <input name="is_index" class="form-check-input" type="radio" value="0"
                                                id="indexNo" <?php echo e(($data->general['is_index'] ?? NULL) == 0 ? 'checked' : ''); ?>/>
                                            <span>No Index</span>
                                        </label>
                                    </div>
                                    <div class="mb-5">
                                        <label for="seoFormFile" class="mb-3" class="form-label">SEO Image</label>
                                        <br />
                                        <div class="image-preview-wrapper">
                                            <img id="seoImagePreview" class="preview-image"
                                                data-default="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                                src="<?php echo e($data->getFirstMediaUrl('seo_image') ?? 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png'); ?>"
                                                alt="Preview image" style="width: 150px" />
                                            <button type="button"
                                                class="btn rounded-pill btn-icon btn-outline-secondary p-2 mt-2 d-none"
                                                data-remove-button data-target-preview="seoImagePreview"
                                                data-target-input="seoFormFile"
                                                style="
                                                    position: absolute;
                                                    top: 5px;
                                                    left: 130px;
                                                    width: 8px;
                                                    height: 8px;
                                                    ">
                                                &times;
                                            </button>
                                        </div>
                                        <input class="form-control" type="file" id="seoFormFile" name="seo_image"
                                            accept="image/jpeg, image/png" data-preview="seoImagePreview"
                                            style="opacity: 0; position: absolute; z-index: -1"
                                            onchange="previewSelectedImage(this)" />
                                        <br />
                                        <b class="text-primary mt-2" onclick="document.getElementById('seoFormFile').click()"
                                            type="button">
                                            Choose Image
                                        </b>
                                    </div>
                                    <div class="mb-4">
                                        <label for="copy_right" class="mb-3"><b>Copy
                                                Right</b></label>
                                        <textarea name="copy_right" id="copy_right"
                                            rows="4" class="form-control"><?php echo e($data->general['copy_right'] ?? ''); ?></textarea>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="date_format">
                                            Date format
                                        </label>
                                        <select class="form-select" id="" name="date_format">
                                            <option value="M d, Y" <?php echo e(($data->general['date_format'] ?? NULL) == 'M d, Y' ? 'selected' : ''); ?>>M d, Y (Nov 22, 2024)</option>
                                            <option value="F j, Y" <?php echo e(($data->general['date_format'] ?? NULL) == 'F j, Y' ? 'selected' : ''); ?>>F j, Y (November 22, 2024)</option>
                                            <option value="F d, Y" <?php echo e(($data->general['date_format'] ?? NULL) == 'F d, Y' ? 'selected' : ''); ?>>F d, Y (November 22, 2024)</option>
                                            <option value="Y-m-d" <?php echo e(($data->general['date_format'] ?? NULL) == 'Y-m-d' ? 'selected' : ''); ?>>Y-m-d (2024-11-22)</option>
                                            <option value="Y-M-d" <?php echo e(($data->general['date_format'] ?? NULL) == 'Y-M-d' ? 'selected' : ''); ?>>Y-M-d (2024-Nov-22)</option>
                                            <option value="d-m-Y" <?php echo e(($data->general['date_format'] ?? NULL) == 'd-m-Y' ? 'selected' : ''); ?>>d-m-Y (22-11-2024)</option>
                                            <option value="d-M-Y" <?php echo e(($data->general['date_format'] ?? NULL) == 'd-M-Y' ? 'selected' : ''); ?>>d-M-Y (22-Nov-2024)</option>
                                            <option value="m/d/Y" <?php echo e(($data->general['date_format'] ?? NULL) == 'm/d/Y' ? 'selected' : ''); ?>>m/d/Y (11/22/2024)</option>
                                            <option value="M/d/Y" <?php echo e(($data->general['date_format'] ?? NULL) == 'M/d/Y' ? 'selected' : ''); ?>>M/d/Y (Nov/22/2024)</option>
                                            <option value="d/m/Y" <?php echo e(($data->general['date_format'] ?? NULL) == 'd/m/Y' ? 'selected' : ''); ?>>d/m/Y (22/11/2024)</option>
                                            <option value="d/M/Y" <?php echo e(($data->general['date_format'] ?? NULL) == 'd/M/Y' ? 'selected' : ''); ?>>d/M/Y (22/Nov/2024)</option>
                                        </select>
                                        <small class="form-hint">Choose date format for your front theme.</small>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="list-logo" role="tabpanel" aria-labelledby="list-logo-list">
                                <form id="logoForm" enctype="multipart/form-data" method="POST">
                                    <div class="mb-5">
                                        <label for="faviconFormFile" class="mb-3" class="form-label">Favicon</label>
                                        <br />
                                        <div class="image-preview-wrapper">
                                            <img id="faviconLogoPreview" class="preview-image"
                                                data-default="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                                src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                                alt="Preview image" style="width: 150px" />
                                            <button type="button"
                                                class="btn rounded-pill btn-icon btn-outline-secondary p-2 mt-2 d-none"
                                                data-remove-button data-target-preview="faviconLogoPreview"
                                                data-target-input="faviconFormFile"
                                                style="
                                                    position: absolute;
                                                    top: 5px;
                                                    left: 130px;
                                                    width: 8px;
                                                    height: 8px;
                                                    ">
                                                &times;
                                            </button>
                                        </div>
                                        <input class="form-control" type="file" id="faviconFormFile" name="favicon"
                                            accept="image/jpeg, image/png" data-preview="faviconLogoPreview"
                                            style="opacity: 0; position: absolute; z-index: -1"
                                            onchange="previewSelectedImage(this)" />
                                        <br />
                                        <b class="text-primary mt-2"
                                            onclick="document.getElementById('faviconFormFile').click()" type="button">
                                            Choose Image
                                        </b>
                                    </div>
                                    <div class="mb-5">
                                        <label for="logoFormFile" class="mb-3" class="form-label">Logo</label>
                                        <br />
                                        <div class="image-preview-wrapper">
                                            <img id="logoPreview" class="preview-image"
                                                data-default="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                                src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                                alt="Preview image" style="width: 150px" />
                                            <button type="button"
                                                class="btn rounded-pill btn-icon btn-outline-secondary p-2 mt-2 d-none"
                                                data-remove-button data-target-preview="logoPreview"
                                                data-target-input="logoFormFile"
                                                style="
                                                    position: absolute;
                                                    top: 5px;
                                                    left: 130px;
                                                    width: 8px;
                                                    height: 8px;
                                                    ">
                                                &times;
                                            </button>
                                        </div>
                                        <input class="form-control" type="file" id="logoFormFile" name="logo"
                                            accept="image/jpeg, image/png" data-preview="logoPreview"
                                            style="opacity: 0; position: absolute; z-index: -1"
                                            onchange="previewSelectedImage(this)" />
                                        <br />
                                        <b class="text-primary mt-2" onclick="document.getElementById('logoFormFile').click()"
                                            type="button">
                                            Choose Image
                                        </b>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="list-page" role="tabpanel" aria-labelledby="list-page-list">
                                <form id="pageForm" enctype="multipart/form-data" method="POST">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="homepage_id">
                                            Your homepage displays
                                        </label>
                                        <select class="form-control form-select" id="" name="homepage_id">
                                            <option value="0">Select an option</option>
                                            <option value="1" selected="selected">Homepage</option>
                                            <option value="2">Blog</option>
                                            <option value="3">Contact</option>
                                            <option value="4">Cookie Policy</option>
                                            <option value="5">Galleries</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="galleries_page_id">
                                            Galleries page
                                        </label>
                                        <select class="form-control form-select" id="" name="galleries_page_id">
                                            <option value="" selected="selected">Select an option</option>
                                            <option value="1">Homepage</option>
                                            <option value="2">Blog</option>
                                            <option value="3">Contact</option>
                                            <option value="4">Cookie Policy</option>
                                            <option value="5">Galleries</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="list-blog" role="tabpanel" aria-labelledby="list-blog-list">
                                <form id="blogForm">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="blog_page_id"> Blog page </label>
                                        <select class="form-control form-select" id="" name="blog_page_id">
                                            <option value="0">-- Select --</option>
                                            <option value="1">Homepage</option>
                                            <option value="2" selected="selected">Blog</option>
                                            <option value="3">Contact</option>
                                            <option value="4">Cookie Policy</option>
                                            <option value="5">Galleries</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="number_of_posts_in_a_category">
                                            Number of posts per page in a category
                                        </label>
                                        <input class="form-control" name="number_of_posts_in_a_category" type="number"
                                            value="12" />
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="number_of_posts_in_a_tag">
                                            Number of posts per page in a tag
                                        </label>
                                        <input class="form-control" name="number_of_posts_in_a_tag" type="number"
                                            value="12" />
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="list-typography" role="tabpanel"
                                aria-labelledby="list-typography-list">
                                <h3>Coming Soon...</h3>
                            </div>
                            <div class="tab-pane fade" id="list-social-links" role="tabpanel"
                                aria-labelledby="list-social-links-list">
                                <h3>Coming Soon...</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light text-end p-5">
                <button class="btn btn-primary saveBtn" >Save Changes</button>
            </div>
        </div>
    </div>
    <?php $__env->stopPush(); ?> <?php $__env->startPush('scripts'); ?>
    <!-- Include Pickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css" />
    <!-- Include Pickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr"></script>
    <script>
        const pickrWithPalette = Pickr.create({
            el: "#colorPicker",
            theme: "classic", // or 'monolith', 'nano'
            default: "#4CAF50", // Default color
            swatches: [
                "#FF5733", // Vibrant red-orange
                "#FFC300", // Bright yellow
                "#DAF7A6", // Light green
                "#28A745", // Emerald green
                "#17A2B8", // Aqua blue
                "#007BFF", // Royal blue
                "#6C757D", // Neutral gray
                "#F39C12", // Golden orange
                "#8E44AD", // Deep purple
                "#34495E", // Midnight blue
                "#E74C3C", // Strong red
                "#2ECC71", // Leaf green
                "#1ABC9C", // Aqua mint
                "#3498DB", // Soft blue
                "#9B59B6", // Lavender
                "#F1C40F", // Bright gold
                "#E67E22", // Burnt orange
                "#95A5A6", // Cool gray
                "#C0392B", // Crimson
                "#7F8C8D", // Warm gray
            ],
            components: {
                preview: true,
                opacity: true, // Optional, enable if needed
                hue: true,
                interaction: {
                    hex: true,
                    rgba: true,
                    input: true,
                    save: true,
                },
            },
        });


        // Save the selected color
        pickrWithPalette.on("save", (color) => {
            const colorHex = color.toHEXA().toString();
            $('#primary_color').val(colorHex);
        });

        function previewSelectedImage(input) {
            const file = input.files[0];
            const previewId = input.dataset.preview;
            const previewImage = document.getElementById(previewId);
            const removeButton = document.querySelector(
                `[data-remove-button][data-target-preview="${previewId}"]`,
            );
            const reader = new FileReader();

            if (file) {
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    removeButton.classList.remove("d-none");
                };
                reader.onerror = function() {
                    console.error("Error reading the file. Please try again.");
                };
                reader.readAsDataURL(file);
            } else {
                console.warn("No file selected.");
            }
        }

        // Event delegation for removing the selected image
        document.addEventListener("click", function(e) {
            if (e.target.matches("[data-remove-button]")) {
                const previewId = e.target.dataset.targetPreview;
                const inputId = e.target.dataset.targetInput;
                const previewImage = document.getElementById(previewId);
                const fileInput = document.getElementById(inputId);
                const defaultImage = previewImage.dataset.default || "";
                previewImage.src = defaultImage;
                e.target.classList.add("d-none");
                fileInput.value = "";
            }
        });
        $(document).ready(function(){
            $(".saveBtn").on('click', function () {
                const element = $('.list-group-item.active');
                const originalId = element.attr('id');
                const transformedId = originalId.replace(/^list-|-list$/g, '');

                // Get the form data using FormData
                const formElement = document.getElementById(`${transformedId}Form`);
                const formData = new FormData(formElement);

                // Add the transformedId to the FormData
                formData.append('column', transformedId);

                $.ajax({
                    url: "<?php echo e(route('admin.theme.settings.store')); ?>",
                    method: "POST",
                    data: formData,
                    processData: false, // Prevent jQuery from automatically transforming the FormData object
                    contentType: false, // Tell jQuery not to set contentType
                    success: function (response) {
                        toastr.success(response.message);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        let errorMessage = jqXHR.responseJSON?.message || errorThrown || "An unexpected error occurred.";
                        toastr.error(errorMessage);

                        // Optionally log the full error for debugging
                        console.error("AJAX Error:", {
                            textStatus: textStatus,
                            errorThrown: errorThrown,
                            responseJSON: jqXHR.responseJSON
                        });
                    }
                });
            });


        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/anonymous/12a8dd6f-3122-4159-adcf-832ac2c3572d/laravel/cms_api_service/resources/views/admin/theme_settings/index.blade.php ENDPATH**/ ?>