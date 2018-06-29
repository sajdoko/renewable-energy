(function ($) {

    // Carousel Slide
    $(".carousel-item").first().addClass("active");

    // Back to Top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 600);
        return false;
    });

// preloader
document.body.onload = function () {
    setTimeout(function () {
        var preloader = document.getElementById('loader');
        if (!preloader.classList.contains('done')) {
            preloader.classList.add('done');
        }
    }, 1000)
}
})(jQuery);