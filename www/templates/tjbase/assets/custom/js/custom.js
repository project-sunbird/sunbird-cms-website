//Footer fixed at the bottom
jQuery(document).ready(function() {
    var footerHeight = jQuery('footer').outerHeight();
	jQuery('body').css('margin-bottom', footerHeight+'px');
});