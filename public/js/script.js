$(document).ready(function () {
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

    $("#buying-type").on("change", function () {
        let option = this.value;
        if (option == "Доставка") {
            $("#remove").removeClass("col-sm-12");
            $("#remove").addClass("col-sm-6");
            $("#addressBlock").css("display", "block");
            $("#address").attr("required", "required")
        } else {
            $("#remove").removeClass("col-sm-6");
            $("#remove").addClass("col-sm-12");
            $("#addressBlock").css("display", "none");
        }
    });

    $(".addToBookmark").on("click", function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: 'bookmark/addToBookmark',
            data: {id: id},
            type: 'GET',
            success: function(res){
                $("#myModal").modal();
                $(".modal-title").html("Добавлен товар в закладки!");
                $(".modal-body").html(res);
            },
            error: function(){
                alert('Ошибка! Попробуйте позже');
            }
        });
    });

    $(".addToCart").on("click", function (e) {
        e.preventDefault();
        var id = $(this).data('id'), qty = $('#qty').val() ? $('#qty').val() : 1;
        $.ajax({
            url: 'cart/addToCart',
            data: {id: id, qty: qty},
            type: 'GET',
            success: function(res){
                $("#myModal").modal();
                $(".modal-title").html("Добавлен товар в корзину!");
                $(".modal-body").html(res);
            },
            error: function(){
                alert('Ошибка! Попробуйте позже');
            }
        });
    });

    $("#recount").on("click", function (e) {
        e.preventDefault();
        location.reload();
    });
})
