<!-- navigation links -->
@foreach( config('tyondo_menu_generator.navigation') as $nav_menu )
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="{{ $nav_menu['group'] }}">
            <i class="{{$nav_menu['class']}}"></i><span class="sr-only"> {{$nav_menu['group']}}</span> <span class="caret"></span></a>
        <ul class="dropdown-menu">
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