<div class="message">
    <div class="message__title">
        @lang('messages.No open positions currently')<br>
        @if($subtitle && !$searchPage)
        @lang('messages.in') <span>{{ $subtitle }}</span>
        @endif
    </div>
    <p class="message__text">
        @lang('messages.We might not have room for you at the moment, but we always want to hear from talented professionals. If you would like to submit your CV, we can get in touch with you should anything become available.')
    </p>
    <div class="message__actions">
        <a href="{{ route('application', [app()->getLocale(), $item->id]) }}" class="custom-button js-modal" data-modal="application">@lang('messages.Submit your CV')</a>
    </div>
</div>
