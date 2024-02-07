$(document).ready(function () {
    $('.trusted-companies').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: true,
        dots: false,
        pauseOnHover: true,
        prevArrow: '<i class="slick-prev fas fa-angle-left"></i>',
        nextArrow: '<i class="slick-next fas fa-angle-right"></i>',
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 1
            }
        }]
    });
});