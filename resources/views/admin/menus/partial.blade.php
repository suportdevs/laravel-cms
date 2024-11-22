@php
    $dataset = $nestedMenu ?? json_decode($data->dataset ?? "{}", true);
@endphp

<div class="cf nestable-lists">

    <div class="dd" id="nestable">
        <ol class="dd-list">
            @foreach ($dataset as $item)
            @include('admin.menus.partial-item', ['item' => $item])
            {{-- <li class="dd-item" data-id="{{$item['id']}}" data-label="{{$item['label']}}" data-model_id="{{$item['model_id'] ?? NULL}}" data-reference="{{$item['reference'] ?? NULL}}">
                <div class="dd-handle p-0 d-flex">
                </div>
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <div class="d-flex align-items-center justify-content-between ms-2" style="flex: 1; border-right: 1px solid #ccc">
                        <span class="flex-1">{{$item['title']}}</span>
                        <span class="text-end me-2 ">{{$item['label'] ?? ''}}</span>
                    </div>
                    <button type="button" href="#" style="height: 40px; width: 40px; border-radius: 0px 4px 4px 0px;" class="dd-content-collapse-toggle-btn border-1 border-gray text-center d-flex align-items-center justify-content-center" data-id="{{$item['id']}}"><i class="bx bx-chevron-down"></i></button>
                </div>
                <div class="dd-content mb-3" data-content="{{$item['id']}}" style="display: none;">
                    <div class="menu-structure-node-content p-5" id="menu-structure-node-form" style="border:1px solid #ccc; border-top: none;">
                        <input class="menu_id" name="menu_id" type="hidden" value="1">
                        <!-- Title Field -->
                        <div class="mb-3 position-relative">
                            <label for="menu-node-title-new" class="form-label" data-update="title">Title</label>
                            <input class="form-control" id="custom-menu-node-title-new" name="title" type="text" value="{{$item['title']}}">
                        </div>

                        <!-- URL Field -->
                        <div class="mb-3 position-relative">
                            <label for="menu-node-url-new" class="form-label" data-update="custom-url">URL</label>
                            <input class="form-control" data-old="/" id="custom-menu-node-url-new" name="url" type="text" value="{{$item['permalink'] ?? NULL}}">
                        </div>

                        <!-- Icon Font Field -->
                        <div class="mb-3 position-relative">
                            <label for="icon_font" class="form-label" data-update="icon">Icon</label>
                            <select name="icon" id="custom-menu-node-icon-new" class="form-select" data-control="select2" data-placeholder="Ex: box box-home">
                                <option></option>
                                @foreach (get_box_icons() as $icon)
                                    <option value="{{$icon}}" data-icon="{{$icon}}" {{($item['icon_font'] ?? NULL) == $icon ? 'selected' : ''}}>{{$icon}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- CSS Class Field -->
                        <div class="mb-3 position-relative">
                            <label for="menu-node-css-class-new" class="form-label" data-update="css_class">CSS class</label>
                            <input class="form-control" id="custom-menu-node-css-class-new" name="css_class" type="text" value="{{$item['css_class'] ?? NULL}}">
                        </div>

                        <!-- Target Field -->
                        <div class="mb-3 position-relative">
                            <label for="menu-node-target-new" class="form-label" data-update="target">Target</label>
                            <select class="form-control form-select" id="custom-menu-node-target-new" name="target">
                                <option value="_self" {{($item['target'] ?? NULL) == '_self' ? 'seleted' : ''}}>Open link directly</option>
                                <option value="_blank" {{($item['target'] ?? NULL) == '_blank' ? 'seleted' : ''}}>Open link in new tab</option>
                            </select>
                        </div>
                        <div class="mb-3 position-relative text-end">
                            <button class="btn btn-sm bg-danger text-white">Remove</button>
                        </div>
                    </div>
                </div>
            </li> --}}
            @endforeach

        </ol>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#nestable').nestable();
})
</script>
