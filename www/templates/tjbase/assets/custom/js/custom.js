// jQuery(window).on('scroll',function(e) {
//     var scrolledHeight = jQuery(window).scrollTop();
//     if( scrolledHeight > 10){
//         jQuery('header').addClass('header-fix');
//     } else {
//         jQuery('header').removeClass('header-fix');
//     }
// });

//Footer fixed at the bottom
jQuery(document).ready(function() {
    var footerHeight = jQuery('footer').outerHeight();
	jQuery('body').css('margin-bottom', footerHeight+'px');
});


//Feartured Article first box having effect & on hover on other remove effect of the first box
jQuery(document).ready(function() {     
    jQuery('.featured-blogs .sppb-row .sppb-col-sm-3:nth-child(2) .sppb-addon-article, .featured-blogs .sppb-row .sppb-col-sm-3:nth-child(3) .sppb-addon-article, .featured-blogs .sppb-row .sppb-col-sm-3:nth-child(4) .sppb-addon-article').hover(function(){     
        jQuery('.featured-blogs .sppb-row .sppb-col-sm-3:first-child .sppb-addon-article').addClass('remove-effect');    
    },     
    function(){    
        jQuery('.featured-blogs .sppb-row .sppb-col-sm-3:first-child .sppb-addon-article').removeClass('remove-effect');     
    });
});   

//Full Feature block cliackable

jQuery(document).ready(function() {
    jQuery('.sppb-addon-title a').closest('.sppb-addon-feature').css('cursor', 'pointer');
    jQuery('a.sppb-readmore').closest('.featured-blogs .sppb-addon-article').css('cursor', 'pointer');

    jQuery('.sppb-addon-feature, .featured-blogs .sppb-addon-article').click(function() {
        var anchor = jQuery(this).find('a');
        
        if (anchor.length) {      
            window.location = anchor.attr('href'); 
            return false;
        }
        
  });
});
