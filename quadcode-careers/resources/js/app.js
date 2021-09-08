require('./bootstrap');

// Register $ global var for jQuery
import $ from 'jquery';

window.$ = window.jQuery = $;
import intlTelInput from 'intl-tel-input';

$(window).on('scroll load', function (e) {
    var windowHeight = $(window).height();

    if ($(window).scrollTop() > 5) {
        $('.app-header').addClass('is-sticked');
    } else {
        $('.app-header').removeClass('is-sticked');
    }

    $('.container').each(function () {
        var elemPosition = $(this).position().top;
        var elemHeight = $(this).height();

        if ($(window).scrollTop() + windowHeight * 0.66 >= elemPosition &&
            $(window).scrollTop() - windowHeight * 0.2 < elemPosition + elemHeight) {

            if (!$(this).hasClass('is-current')) {
                $(this).addClass('is-current');
                $(this).addClass('play-anim');
                $(this).prev().addTemporaryClass('is-exiting', 600);
            }
        } else if ($(this).hasClass('is-current')) {
            $(this).removeClass('is-current');
            $(this).addClass('is-viewed');
        }
    });

});

$(function () {
    $('.js-scroll-down').each(function () {
        var nextSectionId = $(this).closest('section').next('section.app-section__anchor').attr('id');

        if (nextSectionId) {
            $(this).attr('href', '#' + nextSectionId);
        } else {
            $(this).hide();
        }
    });

    $('.js-modal').on('click', function (e) {
        e.preventDefault();
        var $targetForm = $(this).data('modal');
        var targetModal = $('#' + $targetForm);
        targetModal.addClass('is-active');
        if ($(this).data('vacancy')) {
            targetModal.find('[name=vacancy_id]').val($(this).data('vacancy'));
        }
        $('body')
            .css('overflow', 'hidden')
            .on('click', modalCloseBg);

    });

    $('.js-close-modal').on('click', function (e) {
        e.preventDefault();

        $('body').off('click', modalCloseBg);

        modalClose($(this).closest('.modal'));
    });

    const input = document.querySelector("#phone");
    if (input) {
        intlTelInput(input, {
            'separateDialCode': true,
            'preferredCountries': ['gb', 'us', 'de', 'es', 'fr', 'it', 'pt', 'zh']
        });
    }

    var $body = $("body");

    //create new element
    $body.on("click", ".js-upload-file", function () {
        var wrapFiles = $(".js-file"),
            newFile;

        newFile = '<span class="file-name"><span></span></span>';

        $('.js-file-item').prepend(newFile);
    });

    //show text file and check type file
    $body.on("change", 'input[type="file"]', function () {
        var $this = $(this),
            valText = $this.val(),
            fileName = valText.split(/(\\|\/)/g).pop(),
            fileItem = $this.siblings(".js-file-item");

        fileItem.find(".file-name span").text(fileName);
        $('.js-file-item').addClass('is-not-empty');

    });

    //remove file
    $body.on("click", ".js-file-remove", function () {
        var elem = $('.js-file-item .file-name');
        elem.remove();
        $('.js-file-item').removeClass('is-not-empty');
    });

    $body.on('click', function (e) {

        var menuSwitcher = $('#menu-switcher');
        var headNavWrap = $('.app-header__nav-wrap');
        if (menuSwitcher.prop('checked') == true && e.target !== menuSwitcher[0]) {
            if (!headNavWrap.is(e.target) && headNavWrap.has(e.target).length === 0) {
                menuSwitcher.prop('checked', false);
            }
        }

    });

    function modalCloseBg(e) {
        var $modal = $('.modal');
        var modalInner = $modal.find('.modal__inner');
        if ($modal.length && $modal.hasClass('is-active') && !$(e.target).hasClass('js-modal')) {
            if (!modalInner.is(e.target) && modalInner.has(e.target).length === 0) {
                modalClose($modal);
            }
        }
    }

    function modalClose($modal) {
        $('body').css('overflow', 'auto');

        $modal.removeClass('is-active');
        $('.js-form-validate').show();
        $('.form-message').hide();
    }

    if ($('.office-info__heading').length > 0) {
        if($(window).width() > 769) {
            $('.office-info__heading').css({
                'height': $('.js-info-heading-city').width() + 'px'
            })
        }
        $(document).on('scroll', function () {
            let officeScrollCounter = $(document).scrollTop() - $('.office-info__heading').height();
            let scrImg1 = $('.js-info-heading-img-1');
            let scrImg2 = $('.js-info-heading-img-2');
            // console.log('[officeScrollCounter]', officeScrollCounter);
            if ($(window).width() > 769) {
                $('.office-info__section').each(function (index, item) {
                    // console.log($(item)[0].offsetTop)
                    if ($(document).scrollTop() >= $(item)[0].offsetTop - $(window).height() / 1.5) {
                        $(item).addClass('animate-default');
                        if ($(document).scrollTop() >= $(item)[0].offsetTop + $(item).height() / 1.5 && $(item).next().hasClass('right-aligned')) {

                            $(item).addClass('animate-right-next');
                        } else {
                            $(item).removeClass('animate-right-next');
                        }
                    } else {
                        $(item).removeClass('animate-default');
                    }
                })
                if ($(document).scrollTop() >= $('.office-info__heading')[0].offsetTop - $(window).height() / 1.5) {
                    // $('.js-inner-anim').removeClass('animate-end');
                    $('.js-inner-anim').addClass('animate');
                    $('.js-info-heading-city').css({
                        'transform': 'translateX(-' + ($('.js-info-heading-city').width() + officeScrollCounter) + 'px)'
                    });

                    scrImg1.css({
                        'transform': 'translateY(-' + ($('.js-info-heading-city').width() + officeScrollCounter) / 10 + '%)'
                    });

                    scrImg2.css({
                        'transform': 'translateY(-' + (($('.js-info-heading-city').width() + officeScrollCounter) / 10) + '%)'
                    });



                    // } else if($(document).scrollTop() >= ($('.office-info__heading')[0].offsetTop + $('.office-info__heading').height() - $(window).height())) {
                    //     $('.js-inner-anim').addClass('animate-end');
                    //     setTimeout(function() {
                    //         $('.js-inner-anim').removeClass('animate');
                    //     }, 700)
                } else if ($(document).scrollTop() < $('.office-info__heading')[0].offsetTop) {
                    $('.js-inner-anim').removeClass('animate');
                }
            }
        })
    }

    $('.category').each(function (index, item) {
        $(item).on('mouseover', function () {
            $('.category').addClass('no-active');
            $(item).removeClass('no-active');
        })
    });

    $('.category').each(function (index, item) {
        $(item).on('mouseleave', function () {
            $('.category').removeClass('no-active');
        })
    });

    $('.is-required input').each(function (index, item) {
        $(item).on('input', function(){
            if($(item).val() !== '') {
                $('.is-required:eq('+index+')').addClass('not-empty');
            } else {
                $('.is-required:eq('+index+')').removeClass('not-empty');
            }
        })
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
