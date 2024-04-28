window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {
        //jquery code start


        //get screen width start
        function mcwScreenWidth() {
            var screenWidth = $(window).width();
            return screenWidth;
        }
        //get screen width end



        //launch whatsapp content start
        function mcwLaunchWhatsapp() {

            var $promo = jQuery('#mcw-greeting').attr('data-mcw-promo');
            var $mcwTrigger = jQuery('.mcw-trigger');
            $mcwTrigger.on('click', function () {
                jQuery('.mcw-trigger').addClass('hide').removeClass('animate__rubberBand');
                jQuery('#mcw').removeClass('hide').addClass('animate__rubberBand');

                setTimeout(function () {
                    jQuery('.mcwi').addClass('mcw-scale');
                }, 300);
                jQuery('.mcw-close').on('click', function () {
                    if ('true' == $promo) {
                        jQuery('.mcwi').removeClass('mcw-scale');
                        jQuery('#mcw-promo').removeClass('hide').addClass('animate__rubberBand');
                        jQuery('#mcw').addClass('hide').removeClass('animate__rubberBand');
                        jQuery('.close-mcw-promo').on('click', function () {
                            jQuery('#mcw-promo').addClass('animate__hinge').removeClass('animate__rubberBand');

                            setTimeout(function () {
                                jQuery('#mcw-promo').removeClass('animate__hinge animate__rubberBand').addClass('hide');
                            }, 2000);


                            jQuery('#mcw-greeting.mcw-trigger').removeClass('hide').addClass('animate__rubberBand');
                            setTimeout(function () {
                                jQuery('#mcw-greeting-text-wr.mcw-trigger').removeClass('hide').addClass('animate__backInUp');
                            }, 1000);

                        });
                    } else {
                        // jQuery('#mcw-greeting.mcw-trigger').removeClass('hide');
                        jQuery('#mcw-greeting.mcw-trigger').removeClass('hide').addClass('animate__rubberBand');
                        jQuery('#mcw').addClass('hide');
                        setTimeout(function () {
                            jQuery('#mcw-greeting-text-wr.mcw-trigger').removeClass('hide').addClass('animate__backInUp');
                        }, 1000);
                    }

                });
            });
        }
        mcwLaunchWhatsapp();
        //launch whatsapp content end


        //find this
        function mm_find_image_width_height() {
            var imgs = jQuery('img.mcw-find-this');
            imgs.each(function () {
                var ini = jQuery(this);
                var w = ini.width();
                var h = ini.height();
                ini.attr('width', w);
                ini.attr('height', h);
            });
        }
        // Fungsi debounce untuk membatasi frekuensi pemanggilan fungsi
        function mm_debounce(func, wait, immediate) {
            var timeout;
            return function () {
                var context = this, args = arguments;
                var later = function () {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        };
        mm_find_image_width_height();
        jQuery(window).on('resize', mm_debounce(function () {
            mm_find_image_width_height();
        }, 250));
        //find this



















        //jquery code end
    });


});