@php
    $dataset = $nestedMenu ?? json_decode($data->dataset ?? "{}", true);
@endphp

<div class="cf nestable-lists">

    <div class="dd" id="nestable">
        <ol class="dd-list">
            @foreach ($dataset as $item)
            @include('admin.menus.partial-item', ['item' => $item])
            @endforeach
        </ol>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#nestable').nestable();
})
</script>
