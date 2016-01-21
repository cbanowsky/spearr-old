jQuery(document).ready(function($) {
    var gallery_modal = $('.gallery-modal');

    function initGallerySlider() {
        var width = $('.slider-width').actual('width'),
            slider_wrapper = $('.gallery-image-slider'),
            slider_holder = $('.slider-holder'),
            slider_ul = slider_wrapper.find('ul.slides'),
            total_slides = slider_wrapper.find('ul.slides li.slide').length,
            next_button = slider_holder.find('.next'),
            prev_button = slider_holder.find('.prev'),
            x = 1;

        gallery_modal.bind('slideChanged', function() {
            var slider_text_holder = $('.gallery-slider-text'),
                slide = slider_text_holder.find('li'),
                id = '#desc-'+x;
            $(slide).removeClass('active');
            $(id).addClass('active');
        });

        $(next_button).click(function(event) {
            event.preventDefault();
            var current_slide = slider_wrapper.find('li.active');

            if (x == total_slides) {
                var next_slide = slider_wrapper.find('li').first();
                $(slider_ul).animate({
                    'margin-left': '0'},
                    500, function() {
                    $(slider_wrapper).animate({'height': $(next_slide).actual('height')}, 500);
                });
                x = 1;
            } else {
                var next_slide = $(current_slide).next();
                $(slider_ul).animate({
                    'margin-left': '-='+width},
                    500, function() {
                    $(slider_wrapper).animate({'height': $(next_slide).actual('height')}, 500);
                });
                x = x + 1;
            }

            $(current_slide).removeClass('active');
            $(current_slide).removeAttr('data-active');
            $(next_slide).addClass('active');
            $(next_slide).attr('data-active', 'active');

            gallery_modal.trigger('slideChanged');
        });

        $(prev_button).click(function(event) {
            event.preventDefault();
            var current_slide = slider_wrapper.find('li.active');

            if (x == 1) {
                var previous_slide = slider_wrapper.find('li').last();
                $(slider_ul).animate({
                    'margin-left': '-='+width},
                    500, function() {
                    $(slider_wrapper).animate({'height': $(previous_slide).actual('height')}, 500);
                });
                x = total_slides;
            } else {
                var previous_slide = $(current_slide).prev();
                $(slider_ul).animate({
                    'margin-left': '+='+width},
                    500, function() {
                    $(slider_wrapper).animate({'height': $(previous_slide).actual('height')}, 500);
                });
                x = x - 1;
            }

            $(current_slide).removeClass('active');
            $(current_slide).removeAttr('data-active');
            $(previous_slide).addClass('active');
            $(previous_slide).attr('data-active', 'active');        

            gallery_modal.trigger('slideChanged');
        });

        var slides = $(slider_ul).find('li.slide'),
            slide_wrapper_width = total_slides * width;
        $(slider_ul).width(slide_wrapper_width);
        $(slides).width(width);

    }

    initGallerySlider();


    // $(window).on('resize', function(e) {

    //     initGallerySlider();

    // }, 250);

    $('.launch-gallery-modal').on('click', function(event) {
        event.preventDefault();

        if (!$(this).hasClass('opened')) {
            var target = this.hash,
                $target = $(target),
                header_height = $('#header').actual('height');
            
            gallery_modal.addClass('opened');

            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - header_height
            }, 400, 'swing');
        } else {
            gallery_modal.animate({
                'height': '0'
            }, 500, function() {
                gallery_modal.removeAttr('style');
                gallery_modal.removeClass('opened');

                var $target = $('#single-gallery-posts'),
                    header_height = $('#header').actual('height') + 25;
                
                $('html, body').stop().animate({
                    'scrollTop': $target.offset().top - header_height
                }, 400, 'swing');
            });
        }

        $(this).toggleClass('opened');
    });

    $('.close-gallery-slideshow-button').on('click', function(event) {
        event.preventDefault();
        gallery_modal.animate({
            'height': '0'
        }, 500, function() {
            gallery_modal.removeAttr('style');
            gallery_modal.removeClass('opened');
            $('.launch-gallery-modal').removeClass('opened');

            var $target = $('#single-gallery-posts'),
                header_height = $('#header').actual('height') + 25;
            
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - header_height
            }, 400, 'swing');
        });
    });

    $('.gallery-slider-lighbox').iLightBox({
        skin: 'smooth',
        fullViewPort: 'fill',
        infinite: true,
        styles: {
            nextOffsetX: 0,
            nextOpacity: .85,
            prevOffsetX: 0,
            prevOpacity: .85
        },
        thumbnails: {
            normalOpacity: .9,
            activeOpacity: 1
        }
    });

});