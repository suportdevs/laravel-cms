

@if (!empty($item['children']))
@php
    pr($item['children']);
@endphp
    <ol class="dd-list">
        @foreach ($item['children'] as $child)
        @include('admin.menus.partial-item', ['item' => $child])
        @endforeach
    </ol>
@else
    <li class="single-items off-arrow"><a class="single" href="contact.html">{{$item['title']}}</a></li>
@endif
