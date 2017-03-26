<!-- navigation links -->
@foreach( $navigation as $nav_menu )
    <li><a><i class="{{$nav_menu['class']}}"></i> {{$nav_menu['group']}} <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" style="display: none">
            @forelse($nav_menu['links'] as $navlink)
                @if ($navlink == 'separator')
                    <li role="separator" class="divider"></li>
                @elseif ($navlink['route'] === 'header')
                    <li class="text-muted text-center"><i class="{{ $navlink['class'] }}"></i> {{ $navlink['title'] }}</li>
                @else
                    <li><a href="{{ route($navlink['route']) }}"><i class="{{ $navlink['class'] }}"></i>  {{ $navlink['title'] }}</a></li>
                @endif
            @empty
                <li><a href="#">No links defined yet</a></li>
            @endforelse
        </ul>
    </li>
@endforeach

<!-- navigation links -->