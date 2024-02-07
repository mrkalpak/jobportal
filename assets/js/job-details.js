$(document).ready(function() {
    var owl = $('.company-gallery-carousel');
    owl.owlCarousel({
      loop: true,
      margin: 10,
      nav: false, 
      dots:false,
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
    $('.main-title-nav .nav-icons .bi-chevron-left').click(function() {
      owl.trigger('prev.owl.carousel');
    });

    $('.main-title-nav .nav-icons .bi-chevron-right').click(function() {
      owl.trigger('next.owl.carousel');
    });

    var relatedJobs = $('.related-jobs-carousel');
    relatedJobs.owlCarousel({
      loop: true,
      margin: 10,
      nav: false, 
      dots:false,
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

    $('.related-jobs-nav .nav-icons .bi-chevron-left').click(function() {
      relatedJobs.trigger('prev.owl.carousel');
    });

    $('.related-jobs-nav .nav-icons .bi-chevron-right').click(function() {
      relatedJobs.trigger('next.owl.carousel');
    });
  });