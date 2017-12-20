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

        $('#viewArea').zoomMarker({
            src: "img/sertificate.png",
            rate: 0.2, // from 0 to 1
            markers:[
                {src:"marker.png", x:500, y:500},
                {src:"marker.png", x:200, y:200},
                {src:"marker.png", x:1280, y:720, size:20},
            ]
        });

});

