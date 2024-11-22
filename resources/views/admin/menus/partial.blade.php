@php
    $dataset = json_decode($data->dataset ?? "{}", true);
@endphp

<div class="cf nestable-lists">

    <div class="dd" id="nestable">
        <ol class="dd-list">
            @foreach ($dataset as $item)

            <li class="dd-item" data-id="{{$item['id']}}">
                <div class="dd-handle p-0 d-flex">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center justify-content-between ms-2" style="flex: 1; border-right: 1px solid #ccc">
                            <span class="flex-1">{{$item['title']}}</span>
                            <span class="text-end me-2 ">{{$item['label'] ?? ''}}</span>
                        </div>
                    </div>
                    <button type="button" href="#" style="height: 40px; width: 40px;" class="dd-content-collapse-toggle-btn border-1 border-gray text-center d-flex align-items-center justify-content-center" data-id="{{$item['id']}}"><i class="bx bx-chevron-down"></i></button>
                </div>
                <div class="dd-content" data-content="{{$item['id']}}" style="display: none;">
                    <input type="text" name="title" data-name='Home' placeholder="Title" value="item 1 title">
                    <input type="text" name="link" data-link='Home' placeholder="Link" value="item 1 Link">
                </div>
            </li>
            {{-- <li class="dd-item" data-id="2">
                <div class="dd-handle">Item 2</div>
                <ol class="dd-list">
                    <li class="dd-item" data-id="3"><div class="dd-handle">Item 3</div></li>
                    <li class="dd-item" data-id="4"><div class="dd-handle">Item 4</div></li>
                    <li class="dd-item" data-id="5">
                        <div class="dd-handle">Item 5</div>
                        <ol class="dd-list">
                            <li class="dd-item" data-id="6"><div class="dd-handle">Item 6</div></li>
                            <li class="dd-item" data-id="7"><div class="dd-handle">Item 7</div></li>
                            <li class="dd-item" data-id="8"><div class="dd-handle">Item 8</div></li>
                        </ol>
                    </li>
                    <li class="dd-item" data-id="9"><div class="dd-handle">Item 9</div></li>
                    <div class="dd-placeholder" style="height: 30px;"></div>
                </ol>
            </li>
            <li class="dd-item" data-id="12">
                <div class="dd-handle">Item 12</div>
            </li><li class="dd-item" data-id="11">
                <div class="dd-handle">Item 11</div>
            </li> --}}
            @endforeach

        </ol>
    </div>

</div>
{{--
<div class="cf nestable-lists">

    <div class="dd" id="nestable">
        <ol class="dd-list">

            <li class="dd-item" data-id="1">
                <div class="dd-handle">Item 1</div>
            </li><li class="dd-item" data-id="2">
                <div class="dd-handle">Item 2</div>
                <ol class="dd-list">
                    <li class="dd-item" data-id="3"><div class="dd-handle">Item 3</div></li>
                    <li class="dd-item" data-id="4"><div class="dd-handle">Item 4</div></li>
                    <li class="dd-item" data-id="5">
                        <div class="dd-handle">Item 5</div>
                        <ol class="dd-list">
                            <li class="dd-item" data-id="6"><div class="dd-handle">Item 6</div></li>
                            <li class="dd-item" data-id="7"><div class="dd-handle">Item 7</div></li>
                            <li class="dd-item" data-id="8"><div class="dd-handle">Item 8</div></li>
                        </ol>
                    </li>
                    <li class="dd-item" data-id="9"><div class="dd-handle">Item 9</div></li>
                    <div class="dd-placeholder" style="height: 30px;"></div>
                </ol>
            </li>
            <li class="dd-item" data-id="12">
                <div class="dd-handle">Item 12</div>
            </li><li class="dd-item" data-id="11">
                <div class="dd-handle">Item 11</div>
            </li>

        </ol>
    </div>

</div> --}}
