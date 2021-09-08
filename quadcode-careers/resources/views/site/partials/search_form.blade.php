<form action="{{ route('search', [app()->getLocale()]) }}" class="search">
    <div class="search__field">
        <input type="text" name="keywords" placeholder="@lang('messages.Enter keywords')" value="{{ request('keywords') }}">
    </div>
    <div class="search__field has-select ">
        <div class="search-select js-category-selector-parent">
            <select class="js-category-selector" name="category[]" multiple="multiple" data-placeholder="@lang('messages.Choose category')" placeholder="@lang('messages.Choose category')">
                @foreach(app(\App\Repositories\CategoryRepository::class)->getPublicData() as $category)
                <option value="{{ $category->id_external }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="search__field has-select">
        <div class="search-select js-location-selector-parent">
            <select class="js-location-selector" name="location[]" multiple="multiple" data-placeholder="@lang('messages.Choose location')" placeholder="@lang('messages.Choose location')">
                @foreach(app(\App\Repositories\LocationRepository::class)->getPublicData() as $location)
                    <option value="{{ $location->id_external }}">{{ $location->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="search__field search__field--submit">
        <button type="submit" class="btn">@lang('messages.Search')</button>
    </div>
</form>

<script>
$(document).ready(function() {
    $('.js-category-selector').select2({
        dropdownParent: '.js-category-selector-parent',
        closeOnSelect:false,
        minimumResultsForSearch: Infinity
    });

    $('.js-location-selector').select2({
        dropdownParent: '.js-location-selector-parent',
        closeOnSelect:false,
        minimumResultsForSearch: Infinity
    });
});
</script>
