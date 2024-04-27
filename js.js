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
                jQuery('.mcw-trigger').addClass('hide');
                jQuery('#mcw').removeClass('hide');
                jQuery('body').addClass('mcw-no-scroll');
                jQuery('.mcw-close').on('click', function () {

                    if ('true' == $promo) {
                        jQuery('#mcw-promo').removeClass('hide');
                        jQuery('#mcw').addClass('hide');
                        jQuery('body').removeClass('mcw-no-scroll');
                        jQuery('.close-mcw-promo').on('click', function () {
                            jQuery('#mcw-promo').addClass('hide');
                            jQuery('#mcw-greeting.mcw-trigger').removeClass('hide');
                            setTimeout(function () {
                                jQuery('#mcw-greeting-text-wr.mcw-trigger').removeClass('hide');
                            }, 1000);

                        });
                    } else {
                        jQuery('#mcw-greeting.mcw-trigger').removeClass('hide');
                        jQuery('#mcw').addClass('hide');
                        jQuery('body').removeClass('mcw-no-scroll');
                        setTimeout(function () {
                            jQuery('#mcw-greeting-text-wr.mcw-trigger').removeClass('hide');
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