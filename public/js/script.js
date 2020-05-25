$(document).ready(function () {
    // $('.catalog').on('click', function () {
    //     $('.podcatalog').toggle(250);
    // });

    $('.cabinet').on('click', function () {
        $('.cabins-items').toggle(250);
    });

    $(".tab_item").not(":first").hide();
    $(".product-infos .tab").click(function () {
        $(".product-infos .tab").removeClass("active").eq($(this).index()).addClass("active");
        $(".tab_item").hide().eq($(this).index()).fadeIn()
    }).eq(0).addClass("active");

    $(".owl-carousel").owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        items: 1,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true
    });
})