@php($showCategory = $showCategory ?? true)
@php($showLocation = $showLocation ?? true)
@php($searchPage = $searchPage ?? false)

<article class="joblist">
    @if(count($jobs))
    <div class="joblist__items">
        <div class="vacancy">
            <div class="vacancy__row as-heading">
                <div class="vacancy__job">@lang('messages.Job')</div>
                @if($showCategory)
                <div class="vacancy__category">@lang('messages.Category')</div>
                @endif
                @if($showLocation)
                <div class="vacancy__location">@lang('messages.Location')</div>
                @endif
            </div>
            @foreach($jobs as $job)
            <div class="vacancy__row">
                <div class="vacancy__job">
                    <a href="{{ route('job.show', [app()->getLocale(), $job->id]) }}">{{ $job->getTitle() }}</a>
                </div>
                @if($showCategory)
                <div class="vacancy__category">
                    <a class="link" href="{{ route('category.show', [app()->getLocale(), $job->category->slug]) }}">{{ $job->getCategoryTitle() }}</a>
                </div>
                @endif
                @if($showLocation)
                <div class="vacancy__location">
                    <a class="link" href="{{ route('location.show', [app()->getLocale(), $job->location->slug]) }}">{{ $job->getLocationTitle() }}</a>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
        @include('site.partials.vacancy_list_pagination')

    @else
        @include('site.partials.vacancy_list_empty', ['subtitle' => $item->title, 'searchPage' => $searchPage])
    @endif
</article>
