jQuery(window).on('scroll',function(e) {
    var scrolledHeight = jQuery(window).scrollTop();
    if( scrolledHeight > 10){
        jQuery('#header').addClass('header-fix');
    } else {
        jQuery('#header').removeClass('header-fix');
    }
});
