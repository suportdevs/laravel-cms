@php
    $menuData = App\Models\Menu::whereJsonContains('locations', 'main-menu')->first();
    $menuItems = json_decode($menuData->dataset ?? '{}', true);

    // Get the nested menu
    $nestedMenu = buildNestedMenu($menuItems);
    $megaMenuShowingRaw = 6;
@endphp

@foreach ($nestedMenu as $data)
    @if(empty($data['children']))
        <li class="single off-arrow">
            <a class="single {{$data['css_class'] ?? ''}}"
               href="{{ url($data['permalink'] ?? '#') }}"
               target="{{ $data['target'] ?? '_self' }}">
                @if(!empty($data['icon_font']))
                <i class="{{$data['icon_font']}}"></i>
                @endif
                {{ $data['title'] ?? '' }}
            </a>
        </li>
    @endif

    @if(!empty($data['children']))
        <li class="single-items {{$device == 'mobile' ? 'rts-dropdown' : ''}}">
            <a class="navmain" href="#">{{ $data['title'] ?? '' }}</a>

            @if(!empty($data['children']) && count($data['children']) > $megaMenuShowingRaw)
                <ul class="submenu mega-menu pages">
                    @php
                        // Divide the children into 3 columns
                        $childChunks = array_chunk($data['children'], ceil(count($data['children']) / 3));
                    @endphp
                    <li class="mega-menu-1">
                        @foreach ($childChunks as $chunk)
                            <ul class="mega-1">
                                @foreach ($chunk as $child)
                                    <li>
                                        <a href="{{ url($child['permalink'] ?? '#') }}"
                                           target="{{ $child['target'] ?? '_self' }}">
                                           @if(!empty($child['icon_font']))
                                           <i class="{{$child['icon_font']}}"></i>
                                           @endif
                                            {{ $child['title'] ?? '' }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                    </li>
                </ul>
            @else
                <ul class="submenu explore">
                    @foreach ($data['children'] as $child)
                        <li class="single">
                            <a href="{{ url($child['permalink'] ?? '#') }}"
                               target="{{ $child['target'] ?? '_self' }}">
                               @if(!empty($child['icon_font']))
                               <i class="{{$child['icon_font']}}"></i>
                               @endif
                                {{ $child['title'] ?? '' }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endif
@endforeach
