@extends('admin.layouts.app')

@push('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
        <li class="breadcrumb-item">
            <a href="{{route('admin.dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a>Blogs</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.blog.menus.index')}}">Menus</a>
        </li>
        <li class="breadcrumb-item active">Edit ** {{$data->name}} **</li>
        </ol>
    </nav>
    <form action="{{route('admin.blog.menus.update', $data->_key)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-9">
                <div class="card mb-5">
                    <div class="card-body">
                      <div class="mb-5">
                        <label for="name" class="form-label">Name <b class="text-danger">*</b></label>
                        <input type="text" class="form-control border-radius-5" id="name" name="name" placeholder="Name" value="{{$data->name}}" required>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-5">
                            <div class="card-header p-4 border-bottom d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Pages</h5>
                                <button type="button" class="btn p-1" data-bs-toggle="collapse" data-bs-target="#pagesLinkBody" aria-expanded="true" aria-controls="pagesLinkBody">
                                    <i class="tf-icons bx bx-chevron-down" id="toggleIcon"></i>
                                </button>
                            </div>
                            <div id="pagesLinkBody" class="card-body mt-4 collapse show">
                                <div class="list-group">
                                    @foreach ($pages as $id=>$name)
                                        <label class="list-group-item border-none px-0">
                                        <input class="form-check-input me-3" type="checkbox" name="menu_id" data-title{{$name}} data-reference-id="{{$id}}" data-reference-type="App\Models\Page" data-menu-id="{{$id}}" value="{{$id}}">
                                        {{$name}}
                                        </label>
                                    @endforeach
                                </div>
                                <div class="mt-5">
                                    <button type="button" class="btn p-1 border">
                                        <i class="tf-icons bx bx-plus"></i> Add to menu
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-5">
                            <div class="card-header p-4 border-bottom d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Categories</h5>
                                <button type="button" class="btn p-1" data-bs-toggle="collapse" data-bs-target="#categoriesLinkBody" aria-expanded="true" aria-controls="categoriesLinkBody">
                                    <i class="tf-icons bx bx-chevron-down" id="toggleIcon"></i>
                                </button>
                            </div>
                            <div id="categoriesLinkBody" class="card-body mt-4 collapse">
                                <div class="list-group">
                                    @foreach ($categories as $id=>$name)
                                        <label class="list-group-item border-none px-0">
                                        <input class="form-check-input me-3" type="checkbox" name="menu_id" data-title{{$name}} data-reference-id="{{$id}}" data-reference-type="App\Models\Category" data-menu-id="{{$id}}" value="{{$id}}">
                                        {{$name}}
                                        </label>
                                    @endforeach
                                </div>
                                <div class="mt-5">
                                    <button type="button" class="btn p-1 border">
                                        <i class="tf-icons bx bx-plus"></i> Add to menu
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-5">
                            <div class="card-header p-4 border-bottom d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Tags</h5>
                                <button type="button" class="btn p-1" data-bs-toggle="collapse" data-bs-target="#tagsLinkBody" aria-expanded="true" aria-controls="tagsLinkBody">
                                    <i class="tf-icons bx bx-chevron-down" id="toggleIcon"></i>
                                </button>
                            </div>
                            <div id="tagsLinkBody" class="card-body mt-4 collapse">
                                <div class="list-group">
                                    @foreach ($tags as $id=>$name)
                                        <label class="list-group-item border-none px-0">
                                        <input class="form-check-input me-3" type="checkbox" name="menu_id" data-title{{$name}} data-reference-id="{{$id}}" data-reference-type="App\Models\Tag" data-menu-id="{{$id}}" value="{{$id}}">
                                        {{$name}}
                                        </label>
                                    @endforeach
                                </div>
                                <div class="mt-5">
                                    <button type="button" class="btn p-1 border">
                                        <i class="tf-icons bx bx-plus"></i> Add to menu
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-5">
                            <div class="card-header p-4 border-bottom d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Custom Link <b class="text-danger"></b></h5>
                                <button type="button" class="btn p-1" data-bs-toggle="collapse" data-bs-target="#customLinkBody" aria-expanded="true" aria-controls="customLinkBody">
                                    <i class="tf-icons bx bx-chevron-down" id="toggleIcon"></i>
                                </button>
                            </div>
                            <div id="customLinkBody" class="card-body mt-4 collapse">
                                <div id="external_link" class="the-box">
                                    <div class="node-content" id="menu-node-create-form">
                                        <input class="menu_id" name="menu_id" type="hidden" value="1">

                                        <!-- Title Field -->
                                        <div class="mb-3 position-relative">
                                            <label for="menu-node-title-new" class="form-label" data-update="title">Title</label>
                                            <input class="form-control" id="menu-node-title-new" name="title" type="text">
                                        </div>

                                        <!-- URL Field -->
                                        <div class="mb-3 position-relative">
                                            <label for="menu-node-url-new" class="form-label" data-update="custom-url">URL</label>
                                            <input class="form-control" data-old="/" id="menu-node-url-new" name="url" type="text" value="/">
                                        </div>

                                        <!-- Icon Font Field -->
                                        <div class="mb-3 position-relative">
                                            <label for="icon_font" class="form-label" data-update="icon">Icon</label>
                                            <select name="icon_font" data-bb-core-icon="" data-url="https://cms.botble.com/admin/core-icons" data-placeholder="Ex: ti ti-home" class="form-control select2-hidden-accessible" id="menu-node-icon-font-new" data-counter="120" data-allow-clear="true"></select>
                                        </div>

                                        <!-- Icon Image -->
                                        <div class="mb-3 position-relative">
                                            <label for="icon_image" class="form-label">Icon image</label>
                                            <div class="image-box image-box-icon_image" action="select-image" data-update="icon_image">
                                                <input class="image-data" name="icon_image" type="hidden" value="" data-update="icon_image">
                                            </div>
                                        </div>

                                        <!-- CSS Class Field -->
                                        <div class="mb-3 position-relative">
                                            <label for="menu-node-css-class-new" class="form-label" data-update="css_class">CSS class</label>
                                            <input class="form-control" id="menu-node-css-class-new" name="css_class" type="text">
                                        </div>

                                        <!-- Target Field -->
                                        <div class="mb-3 position-relative">
                                            <label for="menu-node-target-new" class="form-label" data-update="target">Target</label>
                                            <select class="form-control form-select" id="menu-node-target-new" name="target">
                                                <option value="_self">Open link directly</option>
                                                <option value="_blank">Open link in new tab</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                            <div class="mb-5">
                                <label for="permalink" class="form-label">Permalink <b class="text-danger">*</b></label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="basic-addon34">{{route('admin.blog.menus.index')}}/</span>
                                    <input type="text" class="form-control" name="permalink" id="permalink" value="{{$data->permalink}}" required>
                                </div>
                                </div>
                                <div class="mb-5">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" rows="3" class="form-control border-radius-5" placeholder="Description">{{$data->description}}</textarea>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
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
                        <h5>Status <b class="text-danger">*</b></h5>
                    </div>
                    <div class="card-body mt-4">
                        <select name="status" id="status" class="form-select">
                            <option value="Published" {{$data->status == 'Published' ? 'selected' : ''}}>Published</option>
                            <option value="Draft" {{$data->status == 'Draft' ? 'selected' : ''}}>Draft</option>
                            <option value="Pending" {{$data->status == 'Pending' ? 'selected' : ''}}>Pending</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endpush

@push('scripts')
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

</script>
@endpush
