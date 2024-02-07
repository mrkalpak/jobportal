$(document).ready(function () {
    var feedbackCarousel = $(".feedback-carousel");
    var totalItems = feedbackCarousel.find(".item").length;
    var currentItem = 0;

    feedbackCarousel.owlCarousel({
        items: 1,
        loop: true,
        nav: false,
        dots:false
    });

    $('.feedback-nav-icons .bi-chevron-left').click(function () {
        feedbackCarousel.trigger('prev.owl.carousel');
        currentItem = (currentItem - 1 + totalItems) % totalItems;
        updateCountText();
    });

    $('.feedback-nav-icons .bi-chevron-right').click(function () {
        feedbackCarousel.trigger('next.owl.carousel');
        currentItem = (currentItem + 1) % totalItems;
        updateCountText();
    });

    function updateCountText() {
        var currentSlide = (currentItem % totalItems) + 1;
        $(".count-item").text(currentSlide + "/" + totalItems);
    }

    updateCountText();
});