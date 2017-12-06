$(document).ready(function() {

    $(".mobile-menu__icon").click(function () {
        $(".mobile-menu__links").slideToggle();
        $(".mobile-menu__links").removeClass('hide')
    });

    $(".item-one").hover(function () {
        $(".item-one .questions-list__title").toggleClass("hover-title");
        $(".item-one .hover-image").toggleClass('hide');
        $(".item-one .no-hover").toggleClass('hide');
    });

    $(".item-two").hover(function () {
        $(".item-two .questions-list__title").toggleClass("hover-title");
        $(".item-two .hover-image").toggleClass('hide');
        $(".item-two .no-hover").toggleClass('hide');
    });

    $(".item-three").hover(function () {
        $(".item-three .questions-list__title").toggleClass("hover-title");
        $(".item-three .hover-image").toggleClass('hide');
        $(".item-three .no-hover").toggleClass('hide');
    });

    $(".item-four").hover(function () {
        $(".item-four .questions-list__title").toggleClass("hover-title");
        $(".item-four .hover-image").toggleClass('hide');
        $(".item-four .no-hover").toggleClass('hide');
    });

    $('#ex1').zoom();

});

