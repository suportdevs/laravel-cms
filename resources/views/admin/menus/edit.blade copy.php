@extends('admin.layouts.app2')

@push('style')
<style type="text/css">
    .cf:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0;
    }

    * html .cf {
        zoom: 1;
    }

    *:first-child+html .cf {
        zoom: 1;
    }

    html {
        margin: 0;
        padding: 0;
    }

    body {
        font-size: 100%;
        margin: 0;
        font-family: 'Helvetica Neue', Arial, sans-serif;
    }

    h1 {
        font-size: 1.75em;
        margin: 0 0 0.6em 0;
    }

    a {
        color: #2996cc;
    }

    a:hover {
        text-decoration: none;
    }

    p {
        line-height: 1.5em;
    }

    .small {
        color: #666;
        font-size: 0.875em;
    }

    .large {
        font-size: 1.25em;
    }

    /**
* Nestable
*/
    .dd {
        position: relative;
        display: block;
        margin: 0;
        padding: 0;
        max-width: 600px;
        list-style: none;
        font-size: 13px;
        line-height: 20px;
    }

    .dd-list {
        display: block;
        position: relative;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .dd-list .dd-list {
        padding-left: 30px;
    }

    .dd-collapsed .dd-list {
        display: none;
    }

    .dd-item,
    .dd-empty,
    .dd-placeholder {
        display: block;
        position: relative;
        margin: 0;
        padding: 0;
        min-height: 20px;
        font-size: 13px;
        line-height: 20px;
    }

    .dd-handle, .dd-handle-right  {
        display: block;
        width: 100%;
        height: 30px;
        margin: 5px 0;
        padding: 5px 10px;
        color: #333;
        text-decoration: none;
        font-weight: bold;
        border: 1px solid #ccc;
        background: #fafafa;
        background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: linear-gradient(top, #fafafa 0%, #eee 100%);
        -webkit-border-radius: 3px;
        border-radius: 5px 0 0 5px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .dd-handle:hover, .dd-handle-right :hover {
        color: #2ea8e5;
        background: #fff;
    }

    .dd-item>button {
        display: block;
        position: relative;
        cursor: pointer;
        float: left;
        width: 25px;
        height: 20px;
        margin: 5px 0;
        padding: 0;
        text-indent: 100%;
        white-space: nowrap;
        overflow: hidden;
        border: 0;
        background: transparent;
        font-size: 12px;
        line-height: 1;
        text-align: center;
        font-weight: bold;
    }

    .dd-item>button:before {
        content: '+';
        display: block;
        position: absolute;
        width: 100%;
        text-align: center;
        text-indent: 0;
    }

    .dd-item>button[data-action="collapse"]:before {
        content: '-';
    }

    .dd-placeholder,
    .dd-empty {
        margin: 5px 0;
        padding: 0;
        min-height: 30px;
        background: #f2fbff;
        border: 1px dashed #b6bcbf;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .dd-empty {
        border: 1px dashed #bbb;
        min-height: 100px;
        background-color: #e5e5e5;
        background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-image: -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-image: linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-size: 60px 60px;
        background-position: 0 0, 30px 30px;
    }

    .dd-dragel {
        position: absolute;
        pointer-events: none;
        z-index: 9999;
    }

    .dd-dragel>.dd-item .dd-handle,.dd-dragel>.dd-item .dd-handle-right {
        margin-top: 0;
    }

    .dd-dragel .dd-handle,.dd-dragel .dd-handle-right {
        -webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
        box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
    }

    /**
* Nestable Extras
*/

    .nestable-lists {
        display: block;
        clear: both;
        padding: 30px 0;
        width: 100%;
        border: 0;
        border-top: 2px solid #ddd;
        border-bottom: 2px solid #ddd;
    }

    #nestable-menu {
        padding: 0;
        margin: 20px 0;
    }

    #nestable-output {
        width: 100%;
        height: 7em;
        font-size: 0.75em;
        line-height: 1.333333em;
        font-family: Consolas, monospace;
        padding: 5px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    @media only screen and (min-width: 700px) {

        .dd {
            float: left;
            width: 80%;
        }

        .dd+.dd {
            margin-left: 2%;
        }

    }

    .dd-hover>.dd-handle, .dd-hover>.dd-handle-right {
        background: #2ea8e5 !important;
    }

    /**
* Nestable Draggable Handles
*/

    .dd3-content {
        display: block;
        height: 30px;
        margin: 5px 0;
        padding: 5px 10px 5px 40px;
        color: #333;
        text-decoration: none;
        font-weight: bold;
        border: 1px solid #ccc;
        background: #fafafa;
        background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: linear-gradient(top, #fafafa 0%, #eee 100%);
        -webkit-border-radius: 3px;
        border-radius: 3px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .dd3-content:hover {
        color: #2ea8e5;
        background: #fff;
    }

    .dd-dragel>.dd3-item>.dd3-content {
        margin: 0;
    }

    .dd3-item>button {
        margin-left: 30px;
    }

    .dd3-handle {
        position: absolute;
        margin: 0;
        left: 0;
        top: 0;
        cursor: pointer;
        width: 30px;
        text-indent: 100%;
        white-space: nowrap;
        overflow: hidden;
        border: 1px solid #aaa;
        background: #ddd;
        background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
        background: -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
        background: linear-gradient(top, #ddd 0%, #bbb 100%);
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .dd3-handle:before {
        content: '≡';
        display: block;
        position: absolute;
        left: 0;
        top: 3px;
        width: 100%;
        text-align: center;
        text-indent: 0;
        color: #fff;
        font-size: 20px;
        font-weight: normal;
    }

    .dd3-handle:hover {
        background: #ddd;
    }
    .menu-structure-node-content{
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 5px 10px;
    }
</style>

@endpush

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
                                    @foreach ($pages as $value)
                                        <label class="list-group-item border-none px-0">
                                        <input class="form-check-input me-3" type="checkbox" name="menu_id[]" data-title="{{$value->name}}" data-reference-id="{{$value->id}}" data-reference-type="App\Models\Page" data-menu-id="{{$value->id}}" data-link="{{$value->permalink}}" data-label="Page" value="{{$value->id}}">
                                        {{$value->name}}
                                        </label>
                                    @endforeach
                                </div>
                                <div class="mt-5">
                                    <button type="button" class="btn p-1 border btn-add-to-menu">
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
                                    @foreach ($categories as $value)
                                        <label class="list-group-item border-none px-0">
                                        <input class="form-check-input me-3" type="checkbox" name="menu_id" data-title="{{$value->name}}" data-reference-id="{{$value->id}}" data-reference-type="App\Models\Category" data-menu-id="{{$value->id}}" data-link="{{$value->permalink}}" data-label="Category" value="{{$value->id}}">
                                        {{$value->name}}
                                        </label>
                                    @endforeach
                                </div>
                                <div class="mt-5">
                                    <button type="button" class="btn p-1 border btn-add-to-menu">
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
                                    @foreach ($tags as $value)
                                        <label class="list-group-item border-none px-0">
                                        <input class="form-check-input me-3" type="checkbox" name="menu_id" data-title="{{$value->name}}" data-reference-id="{{$value->id}}" data-reference-type="App\Models\Tag" data-menu-id="{{$value->id}}" ddata-link="{{$value->permalink}}" ata-label="Tag" value="{{$value->id}}">
                                        {{$value->name}}
                                        </label>
                                    @endforeach
                                </div>
                                <div class="mt-5">
                                    <button type="button" class="btn p-1 border btn-add-to-menu">
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
                                            <input class="form-control" id="custom-menu-node-title-new" name="title" type="text">
                                        </div>

                                        <!-- URL Field -->
                                        <div class="mb-3 position-relative">
                                            <label for="menu-node-url-new" class="form-label" data-update="custom-url">URL</label>
                                            <input class="form-control" data-old="/" id="custom-menu-node-url-new" name="url" type="text" value="/">
                                        </div>

                                        <!-- Icon Font Field -->
                                        <div class="mb-3 position-relative">
                                            <label for="icon_font" class="form-label" data-update="icon">Icon</label>
                                            <select name="icon" id="custom-menu-node-icon-new" class="form-select" data-control="select2" data-placeholder="Ex: box box-home">
                                                <option></option>
                                                @foreach (get_box_icons() as $icon)
                                                    <option value="{{$icon}}" data-icon="{{$icon}}">{{$icon}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- CSS Class Field -->
                                        <div class="mb-3 position-relative">
                                            <label for="menu-node-css-class-new" class="form-label" data-update="css_class">CSS class</label>
                                            <input class="form-control" id="custom-menu-node-css-class-new" name="css_class" type="text">
                                        </div>

                                        <!-- Target Field -->
                                        <div class="mb-3 position-relative">
                                            <label for="menu-node-target-new" class="form-label" data-update="target">Target</label>
                                            <select class="form-control form-select" id="custom-menu-node-target-new" name="target">
                                                <option value="_self">Open link directly</option>
                                                <option value="_blank">Open link in new tab</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <button type="button" class="btn p-1 border btn-add-to-menu" data-menu-id="{{$data->id}}" data-btn-type="Custom Btn">
                                        <i class="tf-icons bx bx-plus"></i> Add to menu
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        {{-- <div class="card">
                            <div class="card-body">
                            <div class="mb-5">

                            </div>
                        </div> --}}
                        <div class="accordion mb-4" id="accordionExample">
                            <div class="card accordion-item active">
                                <div class="card-header p-4 border-bottom d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Menu Structure</h5>
                                    <button type="button" class="btn p-1" data-bs-toggle="collapse" data-bs-target="#" aria-expanded="true" aria-controls="">
                                        <i class="tf-icons bx bx-chevron-down" id="toggleIcon"></i>
                                    </button>
                                </div>
                                <div id="ajax_content" class="card-body mt-4 collapse show">
                                    @include("admin.menus.partial")
                                </div>
                                <textarea id="nestable-output"></textarea>
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
<script src="{{asset('assets/js/nestable.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#custom-menu-node-icon-new').select2({
            templateResult: formatIcon, // Format dropdown options
            templateSelection: formatIcon, // Format selected option
            escapeMarkup: function (markup) {
                return markup; // Allow HTML rendering
            },
            allowClear: true,                         // Enable clear button
            theme: "bootstrap-5",                     // Use the Bootstrap 5 theme
            width: '100%' // Ensure dropdown matches the parent element's width
        });

        function formatIcon(state) {
            if (!state.id) {
                return state.text; // Default text
            }
            return `<i class="${state.element.dataset.icon}"></i> ${state.text}`;
        }

        $(".btn-add-to-menu").on("click", function(event) {
            let menuesProperties = [];
            if($(this).data('btn-type') === 'Custom Btn'){
                if($('#custom-menu-node-title-new').val() == ''){
                    toastr.warning('Please provide a Custom Menu title.');
                    return false;
                }
                menuesProperties.push({
                        model_id: $(this).data('menu-id'),
                        title: $('#custom-menu-node-title-new').val(),
                        label: 'Custom link',
                        permalink: $('#custom-menu-node-url-new').val(),
                        icon: $('#custom-menu-node-icon-new').val(),
                        class: $('#custom-menu-node-css-class-new').val(),
                        target: $('#custom-menu-node-target-new').val(),
                    });
            }else{
                let checkedInputs = $(this).closest('.card-body').find('input[type=checkbox]:checked'); // Find checked checkboxes within the same container
                checkedInputs.each(function () {
                    menuesProperties.push({
                        model_id: $(this).data('menu-id'),
                        reference: $(this).data('reference-type'),
                        title: $(this).data('title'),
                        label: $(this).data('label'),
                        permalink: $(this).data('link'),
                    });
                });
            }

            if (menuesProperties && menuesProperties.length > 0) {
                $.ajax({
                    url: "{{ route('admin.blog.menus.ajax.get_node') }}",
                    method: "POST",
                    data: {
                        menu_id: "{{$data->id}}",
                        dataset: menuesProperties,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {
                        toastr.success('Item added successfull.');
                        $("#ajax_content").html(response);
                    },
                    eerror: function (xhr, status) {
                        // Hide the loader
                        toastr.error('There is some error. Try after some time.');
                    }
                });
            }else{
                toastr.warning("You should must be select any item to add menu");
            }
        });
    });

</script>
<script>
    let menuDataset = [];
    $(document).ready(function() {
        var updateOutput = function(e) {
            var list = e.length ? e : $(e.target),
                outputSelector = list.data('output'),
                output = outputSelector ? $(outputSelector) : null;

            if (output && output.length) {
                if (window.JSON) {
                    let serializeList = list.nestable('serialize');
                    output.val(window.JSON.stringify(serializeList));
                    updateMenuItemDetails(serializeList);
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            } else {
                console.error('Output element is not defined or invalid.');
            }
        };

        // activate Nestable for list
        $('#nestable').nestable({
            group: 1,
        }).on('change', updateOutput);


        $('input').nestable({
                group: 1
            })
            .on('input', updateOutput);

        // output initial serialised data
        updateOutput($('#nestable').data('output', $('#nestable-output')));

        $('#nestable-menu').on('click', function(e) {
            var target = $(e.target),
                action = target.data('action');
            if (action === 'expand-all') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse-all') {
                $('.dd').nestable('collapseAll');
            }
        });

        $(document).on('click', '.dd-content-collapse-toggle-btn', function() {
            let button = $(this);
            let _id = $(this).data('id');
            console.log(_id)
            let content = button.closest('.dd-item').find(`.dd-content[data-content="${_id}"]`);

            if (content.is(':visible')) {
                content.slideUp();
                button.text('+');
            } else {
                content.slideDown();
                button.text('-');
            }
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#save-menu").on("click", function() {
            updateOutput($('#nestable').data('output', $('#nestable-output')));
            if (menuDataset && menuDataset.length > 1) {
                $.ajax({
                    url: "{{ route('admin.blog.menus.save_structure') }}",
                    method: "POST",
                    data: {
                        menus: menuDataset,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {
                        console.log(response)
                        $("#ajax_content").html(response);
                    },
                    error: function(){
                        toastr.error('Something went wrong!');
                    }
                });
            }
        });
    });


    let updateMenuItemDetails = function(data) {
        // Reset the global menuDataset to avoid duplication
        menuDataset = [];
        data.forEach((item) => {
            let menuItem = {
                id: item.id,
                title: "",
                link: "",
                children: [],
            };
            // Add title and link if available in the DOM
            let $currentItem = $(`.dd-item[data-id="${item.id}"]`);
            menuItem.title = $currentItem.find('input[name="title"]').val();
            menuItem.link = $currentItem.find('input[name="link"]').val();
            // Process children recursively if they exist
            if (item.children && item.children.length > 0) {
                menuItem.children = processMenuItemChildren(item.children);
            }
            // Push the menuItem to the global dataset
            menuDataset.push(menuItem);
        });
        console.log("Updated Menu Dataset:", menuDataset);
    };

    let processMenuItemChildren = function(children) {
        let childArray = [];
        children.forEach((child) => {
            let menuItem = {
                id: child.id,
                title: "",
                link: "",
                children: [],
            };

            // Get title and link from the DOM for the child
            let $currentChild = $(`.dd-item[data-id="${child.id}"]`);
            menuItem.title = $currentChild.find('input[name="title"]').val();
            menuItem.link = $currentChild.find('input[name="link"]').val();

            // Process child elements recursively if they exist
            if (child.children && child.children.length > 0) {
                menuItem.children = processMenuItemChildren(child.children);
            }
            // Add the menuItem to the current child array
            childArray.push(menuItem);
        });
        return childArray;
    };
</script>
@endpush
