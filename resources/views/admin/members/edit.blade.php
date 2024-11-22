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
            <a href="{{route('admin.members.index')}}">Members</a>
        </li>
        <li class="breadcrumb-item active">Edit ** {{$data->name}} **</li>
        </ol>
    </nav>
    <form action="{{route('admin.members.update', $data->_key)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body row">
                        <div class="mb-5 col-md-6">
                          <label for="first_name" class="form-label"><b>First Name</b> <b class="text-danger">*</b></label>
                          <input type="text" class="form-control border-radius-5" id="first_name" name="first_name" placeholder="First Name" value="{{$data->first_name}}" required>
                        </div>
                        <div class="mb-5 col-md-6">
                          <label for="last_name" class="form-label"><b>Last Name</b> <b class="text-danger">*</b></label>
                          <input type="text" class="form-control border-radius-5" id="last_name" name="last_name" placeholder="Last Name" value="{{$data->last_name}}" required>
                        </div>
                        <div class="mb-5 col-md-6">
                          <label for="email" class="form-label"><b>Email</b> <b class="text-danger">*</b></label>
                          <input type="email" class="form-control border-radius-5" id="email" name="email" placeholder="e.g:example@domain.com" value="{{$data->email}}" required>
                        </div>
                        <div class="mb-5 col-md-6">
                          <label for="phone" class="form-label"><b>Phone</b> <b class="text-danger"></b></label>
                          <input type="text" class="form-control border-radius-5" id="phone" name="phone" placeholder="Phone"  value="{{$data->phone}}">
                        </div>
                        <div class="mb-5 col-md-12">
                          <label for="dob" class="form-label"><b>Date of Birth</b> <b class="text-danger"></b></label>
                          <input type="date" class="form-control border-radius-5" id="dob" name="dob" placeholder="Phone"  value="{{date('d-m-Y', strtotime($data->dob))}}">
                        </div>
                          <div class="mb-5">
                              <label for="description" class="form-label"><b>Description</b></label>
                              <textarea name="description" id="description" rows="5" class="form-control border-radius-5" placeholder="Description">{{$data->description}}</textarea>
                          </div>
                          <div class="mb-5 col-md-6">
                            <label for="password" class="form-label"><b>Password</b> <b class="text-danger">*</b></label>
                            <input type="password" class="form-control border-radius-5" id="password" name="password" placeholder="">
                          </div>
                          <div class="mb-5 col-md-6">
                            <label for="password_confirmation" class="form-label"><b>Password confirmation</b> <b class="text-danger">*</b></label>
                            <input type="password" class="form-control border-radius-5" id="password_confirmation" name="password_confirmation" placeholder="">
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
                                    data-default="{{!is_null($data->image) ? $data->getFirstMediaUrl('image') : 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png' }}"
                                    src="{{!is_null($data->image) ? $data->getFirstMediaUrl('image') : 'https://cms.botble.com/vendor/core/core/base/images/placeholder.png' }}"
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
            </div>
    </form>
</div>
@endpush

@push('scripts')
<script>
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
