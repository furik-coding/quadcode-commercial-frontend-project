require('./bootstrap');

// Register $ global var for jQuery
import $ from 'jquery';

window.$ = window.jQuery = $;
import intlTelInput from 'intl-tel-input';

$(function () {
    $(window).on('load scroll', function() {
        if ($(window).scrollTop() > 5) {
            $('.app-header').addClass('is-sticked');
        } else {
            $('.app-header').removeClass('is-sticked');
        }

        $(".container").each(function() {
            if (isScrolledIntoView($(this))) {
                $(this).addClass('is-current');
                $(this).addClass('play-anim');
            }
        });
    });
      
    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height() / 2;
        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }

    const input = document.querySelector("#phone");
    if (input) {
        intlTelInput(input, {
            'separateDialCode': true,
            'preferredCountries': ['gb', 'us', 'de', 'es', 'fr', 'it', 'pt', 'zh']
        });
    }

    $('.js-scroll-down').each(function () {
        var nextSectionId = $(this).closest('section').next('section').find('.app-section__anchor').attr('id');
        if (nextSectionId) {
            $(this).attr('href', '#' + nextSectionId);
        } else {
            $(this).hide();
        }
    });

    // Link on click form trigger
    $('.js-modal').on('click', function (e) {
        e.preventDefault();

        var $targetForm = $(this).data('modal');
        $('#' + $targetForm).addClass('is-active');
        $('body').css('overflow', 'hidden');
    });

    // Close current active modal
    $('.js-close-modal').on('click', function (e) {
        e.preventDefault();

        $(this).closest('.modal').removeClass('is-active');
        $('body').css('overflow', 'auto');
    });

    $(document).on('click', function (e) {

        var menuSwitcher = $('#menu-switcher');
        var headNavWrap = $('.app-header__nav-wrap');
        if (menuSwitcher.prop('checked') == true && e.target !== menuSwitcher[0]) {
            if (!headNavWrap.is(e.target) && headNavWrap.has(e.target).length === 0) {
                menuSwitcher.prop('checked', false);
            }
        }

    });


});

(function ($) {

    $.fn.extend({

        addTemporaryClass: function (className, duration) {
            var elements = this;
            setTimeout(function () {
                elements.removeClass(className);
            }, duration);

            return this.each(function () {
                $(this).addClass(className);
            });
        }
    });

})(jQuery);
