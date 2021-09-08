@if($jobs->lastPage() > 1)

<div class="joblist__pagination">
    <div class="pagination">
        @if($jobs->currentPage() > 1)
        <a href="{{ $jobs->previousPageUrl() }}" class="pagination__prev">
                <span class="pagination__icon">
                    <svg aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path fill="currentColor" d="M238.475 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L50.053 256 245.546 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L10.454 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z"></path></svg>
                </span>
            <span>@lang('pagination.previous')</span>
        </a>
        @endif
        <div class="pagination__page">
            <span class="pagination__current">{{ $jobs->currentPage() }}</span>
            <span class="pagination__total">{{ $jobs->lastPage() }}</span>
        </div>
        @if($jobs->currentPage() < $jobs->lastPage())
        <a href="{{ $jobs->nextPageUrl() }}" class="pagination__next is-not-available">
            <span>@lang('pagination.next')</span>
            <span class="pagination__icon">
                    <svg aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path fill="currentColor" d="M17.525 36.465l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L205.947 256 10.454 451.494c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l211.051-211.05c4.686-4.686 4.686-12.284 0-16.971L34.495 36.465c-4.686-4.687-12.284-4.687-16.97 0z"></path></svg>
                </span>
        </a>
        @endif
    </div>
</div>
@endif
