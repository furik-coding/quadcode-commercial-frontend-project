@foreach(\A17\Twill\Models\Feature::forBucket('main_navigation') as $navItem)
    @php ( $url = route('page.show', [app()->getLocale(), $navItem->slug]) )
    <a href="{{ $url }}" class="app-{{ $type }}__nav-link{{ strpos(Request::url(), $url) === 0 ? ' is-current-page' : '' }}">
        {{ $navItem->title }}
    </a>
@endforeach
