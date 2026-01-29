/*
Author       : Themesvila
Template Name: Edplus
Version      : 1.0
*/

(function ($) {
  "use strict";

  /*PRELOADER JS*/
  $(window).on("load", function () {
    $(".preloader_wrap").fadeOut();
    $(".preloader_wrap").delay(350).fadeOut("slow");
  });

  /*END PRELOADER JS*/

  jQuery(document).ready(function ($) {
    //Mobile Menu Js Start //
    $("#main-menu").meanmenu({
      meanMenuContainer: ".mobile-menu",
      meanScreenWidth: "1199",
      meanExpand: ['<i class="far fa-plus"></i>'],
    });

    // // Sidebar Toggle Js Start //
    // $(".offcanvas__close,.offcanvas__overlay").on("click", function () {
    // 	$(".offcanvas__info").removeClass("info-open");
    // 	$(".offcanvas__overlay").removeClass("overlay-open");
    // });
    // $(".sidebar__toggle").on("click", function () {
    // 	$(".offcanvas__info").addClass("info-open");
    // 	$(".offcanvas__overlay").addClass("overlay-open");
    // });
    //////////////////////////////////////////////////////////////
    // Sidebar Toggle Js Start //
    $(document).ready(function () {
      // Toggle sidebar
      $(".offcanvas__close, .offcanvas__overlay").on("click", function () {
        $(".offcanvas__info").removeClass("info-open");
        $(".offcanvas__overlay").removeClass("overlay-open");
        $("body").removeClass("offcanvas-open");
      });

      $(".sidebar__toggle").on("click", function () {
        $(".offcanvas__info").addClass("info-open");
        $(".offcanvas__overlay").addClass("overlay-open");
        $("body").addClass("offcanvas-open");
      });

      // Close sidebar on escape key
      $(document).on("keydown", function (e) {
        if (e.key === "Escape") {
          $(".offcanvas__info").removeClass("info-open");
          $(".offcanvas__overlay").removeClass("overlay-open");
          $("body").removeClass("offcanvas-open");
        }
      });

      // Handle swipe to close on mobile
      let startX = 0;
      let currentX = 0;
      let isSwiping = false;

      $(".offcanvas__info").on("touchstart", function (e) {
        startX = e.touches[0].clientX;
        currentX = startX;
        isSwiping = true;
      });

      $(".offcanvas__info").on("touchmove", function (e) {
        if (!isSwiping) return;

        currentX = e.touches[0].clientX;
        const diff = startX - currentX;

        // Only allow swipe to close from the left edge
        if (diff > 0) {
          e.preventDefault();
          const translateX = Math.max(0, -diff);
          $(this).css("transform", `translateX(${translateX}px)`);
        }
      });

      $(".offcanvas__info").on("touchend", function () {
        if (!isSwiping) return;

        isSwiping = false;
        const diff = startX - currentX;
        const threshold = 100; // Minimum swipe distance to close

        if (diff > threshold) {
          // Close sidebar
          $(this).removeClass("info-open");
          $(".offcanvas__overlay").removeClass("overlay-open");
          $("body").removeClass("offcanvas-open");
        } else {
          // Return to open state
          $(this).css("transform", "translateX(0)");
        }
      });

      // Reset transform after animation
      $(".offcanvas__info").on("transitionend", function () {
        if (!$(this).hasClass("info-open")) {
          $(this).css("transform", "");
        }
      });
    });
    //////////////////////////////////////////////////////////////
    // Body Overlay Js Start //
    $(".body-overlay").on("click", function () {
      $(".offcanvas__area").removeClass("offcanvas-opened");
      $(".df-search-area").removeClass("opened");
      $(".body-overlay").removeClass("opened");
    });

    /*Banner Counter */
    $(".home-banner").on(
      "inview",
      function (event, visible, visiblePartX, visiblePartY) {
        if (visible) {
          $(this)
            .find(".count")
            .each(function () {
              var $this = $(this);
              $({ Counter: 0 }).animate(
                { Counter: $this.text() },
                {
                  duration: 2000,
                  easing: "swing",
                  step: function () {
                    $this.text(Math.ceil(this.Counter));
                  },
                },
              );
            });
          $(this).unbind("inview");
        }
      },
    );

    /*Counter Up */
    $(".counter-up").on(
      "inview",
      function (event, visible, visiblePartX, visiblePartY) {
        if (visible) {
          $(this)
            .find(".count")
            .each(function () {
              var $this = $(this);
              $({ Counter: 0 }).animate(
                { Counter: $this.text() },
                {
                  duration: 2000,
                  easing: "swing",
                  step: function () {
                    $this.text(Math.ceil(this.Counter));
                  },
                },
              );
            });
          $(this).unbind("inview");
        }
      },
    );
  });

  /*START Mini Cart JS*/

  $(".mcart_icon").on("click", function () {
    var menu = $(this).attr("data-menu");
    $(menu).toggleClass("min_cart_active");
  });

  $(".min_cart_wrapper").on("click", function (event) {
    if ($(event.target).hasClass("min_cart_wrapper")) {
      $(".min_cart_active").removeClass("min_cart_active");
    }
  });

  $(".cart_close").on("click", function (event) {
    $(".min_cart_active").removeClass("min_cart_active");
  });

  /*END Mini Cart JS*/

  /*START Popup Searchbox JS*/

  $(".search_btn").on("click", function () {
    var menu = $(this).attr("data-menu");
    $(menu).toggleClass("popupsbox_active");
  });

  $(".popup_searchbox_wrapper").on("click", function (event) {
    if ($(event.target).hasClass("popup_searchbox_wrapper")) {
      $(".popupsbox_active").removeClass("popupsbox_active");
    }
  });

  $(".popup_close").on("click", function (event) {
    $(".popupsbox_active").removeClass("popupsbox_active");
  });

  /*END Popup Searchbox JS*/

  /* Image Popup */
  $(".popbtn").magnificPopup({
    type: "image",
    gallery: {
      enabled: true,
    },
  });

  /*START Home Slider*/
  $(".active-hslider").owlCarousel({
    items: 1,
    loop: true,
    nav: true,
    navText: [
      "<i class='ph ph-caret-left'></i>",
      "<i class='ph ph-caret-right'></i>",
    ],
    dots: false,
    margin: 0,
    responsive: {
      0: {
        items: 1,
        nav: false,
      },
      575: {
        items: 1,
        nav: false,
      },
      768: {
        items: 1,
        nav: false,
      },
      1000: {
        items: 1,
        nav: true,
      },
      1200: {
        items: 1,
        nav: true,
      },
    },
  });

  /*END Features*/

  /*START Features*/
  $(".feature_slider").owlCarousel({
    items: 4,
    loop: true,
    nav: false,
    dots: true,
    margin: 30,
    responsive: {
      0: {
        items: 1,
        nav: false,
      },
      575: {
        items: 1,
        nav: false,
      },
      768: {
        items: 2,
        nav: false,
      },
      1000: {
        items: 3,
        nav: false,
      },
      1200: {
        items: 3,
        nav: false,
      },
      1400: {
        items: 4,
        nav: false,
      },
    },
  });

  /*END Features*/

  /*START PARTNER LOGO*/
  $(".client_slider1").owlCarousel({
    margin: 60,
    autoPlay: 5000, //Set AutoPlay to 3 seconds
    items: 6,
    nav: false,
    dots: false,
    loop: true,
    responsive: {
      0: {
        items: 2,
      },
      575: {
        items: 3,
      },
      768: {
        items: 4,
      },
      1000: {
        items: 5,
      },
      1200: {
        items: 6,
      },
    },
  });
  /*END PARTNER LOGO*/

  /*START PARTNER Two */
  $(".client_slider2").owlCarousel({
    margin: 60,
    autoPlay: 5000,
    items: 6,
    nav: true,
    navText: [
      "<i class='ph ph-arrow-left'></i>",
      "<i class='ph ph-arrow-right'></i>",
    ],
    dots: false,
    loop: true,
    responsive: {
      0: {
        items: 2,
        nav: true,
      },
      575: {
        items: 3,
        nav: true,
      },
      768: {
        items: 4,
        nav: true,
      },
      1000: {
        items: 5,
        nav: true,
      },
      1200: {
        items: 6,
        nav: true,
      },
    },
  });
  /*END PARTNER Two*/

  /*Start Techers*/
  $(".teacher_slider").owlCarousel({
    items: 4,
    margin: 30,
    loop: true,
    nav: false,
    navText: [
      "<i class='ph ph-arrow-left'></i>",
      "<i class='ph ph-arrow-right'></i>",
    ],
    dots: false,
    responsive: {
      0: {
        items: 1,
        nav: false,
      },
      575: {
        items: 1,
        nav: false,
      },
      768: {
        items: 2,
        nav: false,
      },
      1000: {
        items: 3,
        nav: false,
      },
      1200: {
        items: 3,
        nav: true,
      },
      1400: {
        items: 4,
        nav: false,
      },
    },
  });
  /*END Teacher*/

  /*Start Instructor*/
  $(".instructor-slider").owlCarousel({
    items: 4,
    margin: 30,
    loop: true,
    nav: false,
    dots: true,
    responsive: {
      0: {
        items: 1,
        nav: false,
      },
      575: {
        items: 1,
        nav: false,
      },
      768: {
        items: 2,
        nav: false,
      },
      1000: {
        items: 3,
        nav: false,
      },
      1300: {
        items: 3,
        nav: false,
      },
      1400: {
        items: 4,
        nav: false,
      },
    },
  });
  /*END Instructor*/

  /*START Testimonials */
  $(".testimonial_slider").owlCarousel({
    margin: 30,
    autoPlay: 5000, //Set AutoPlay to 3 seconds
    items: 1,
    nav: true,
    navText: [
      "<i class='ph ph-arrow-left'></i>",
      "<i class='ph ph-arrow-right'></i>",
    ],
    dots: false,
    loop: true,
    responsive: {
      0: {
        items: 1,
        nav: false,
      },
      575: {
        items: 1,
        nav: false,
      },
      768: {
        items: 1,
      },
      1000: {
        items: 1,
      },
      1200: {
        items: 1,
      },
    },
  });
  /*END Testimonials*/

  /*START Testimonials 2 */
  $(".testimonial2_slider").owlCarousel({
    margin: 30,
    autoPlay: 5000, //Set AutoPlay to 3 seconds
    items: 2,
    nav: true,
    navText: [
      "<i class='ph ph-arrow-left'></i>",
      "<i class='ph ph-arrow-right'></i>",
    ],
    dots: false,
    loop: true,
    responsive: {
      0: {
        items: 1,
        nav: false,
      },
      575: {
        items: 1,
        nav: false,
      },
      768: {
        items: 2,
        nav: false,
      },
      1000: {
        items: 2,
      },
      1200: {
        items: 2,
      },
    },
  });
  /*END Testimonials 2 */

  /*START Blog */
  $(".blog_slider").owlCarousel({
    margin: 30,
    autoPlay: 5000, //Set AutoPlay to 3 seconds
    items: 3,
    nav: false,
    dots: true,
    loop: true,
    responsive: {
      0: {
        items: 1,
      },
      575: {
        items: 1,
      },
      768: {
        items: 2,
      },
      1000: {
        items: 2,
      },
      1200: {
        items: 3,
      },
    },
  });
  /*END Blog*/

  /*START Related Course */
  $(".relcourse_slider").owlCarousel({
    margin: 30,
    autoPlay: 5000, //Set AutoPlay to 3 seconds
    items: 3,
    nav: true,
    navText: [
      "<i class='ph ph-arrow-left'></i>",
      "<i class='ph ph-arrow-right'></i>",
    ],
    dots: false,
    loop: true,
    responsive: {
      0: {
        items: 1,
        nav: false,
      },
      575: {
        items: 1,
        nav: false,
      },
      768: {
        items: 2,
        nav: false,
      },
      1000: {
        items: 2,
      },
      1200: {
        items: 3,
      },
    },
  });
  /*END Blog*/

  //------------- DETAIL ADD - MINUS COUNT ORDER -------------//
  $(".btn-number").on("click", function () {
    var $button = $(this);
    var oldValue = $button
      .closest(".quantity_option")
      .find("input.quntity-input")
      .val();

    if ($button.text() == "+") {
      var newVal = parseFloat(oldValue) + 1;
    } else {
      // Don't allow decrementing below zero
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 0;
      }
    }

    $button.closest(".quantity_option").find("input.quntity-input").val(newVal);
  });

  /* WOW */
  new WOW().init();
})(jQuery);
