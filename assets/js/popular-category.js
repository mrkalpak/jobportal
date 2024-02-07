$(document).ready(function() {
    var owl = $('.popular-category-carousel');
    owl.owlCarousel({
      loop: true,
      margin: 10,
      nav: false, // Disable default navigation
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 3
        },
        1000: {
          items: 4
        }
      }
    });

    // Custom navigation
    $('.nav-icons .bi-chevron-left').click(function() {
      owl.trigger('prev.owl.carousel');
    });

    $('.nav-icons .bi-chevron-right').click(function() {
      owl.trigger('next.owl.carousel');
    });
  });