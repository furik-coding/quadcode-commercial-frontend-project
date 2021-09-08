@foreach(\A17\Twill\Models\Feature::forBucket('main_navigation') as $navItem)
    @php
        if ($navItem->custom_url) {
            $url = $navItem->custom_url;
        } else {
            $url = route('page.show', [app()->getLocale(), $navItem->slug]);
        }
    @endphp
    <a href="{{ $url }}" class="app-{{ $type }}__nav-link{{ strpos(Request::url(), $url) === 0 ? ' is-current-page' : '' }}">
        {{ $navItem->title }}
    </a>
@endforeach
