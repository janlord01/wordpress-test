jQuery(document).ready(function($) {
    // Toggle collapsible content
    $('.collapsible h3').click(function() {
        $(this).parent().toggleClass('open');
    });
});
