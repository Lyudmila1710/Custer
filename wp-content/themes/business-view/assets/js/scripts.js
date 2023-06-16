(function ($) {
  "use strict";

const scrollElements = document.querySelectorAll(".js-scroll");

const elementInView = (el, dividend = 1) => {
  const elementTop = el.getBoundingClientRect().top;

  return (
    elementTop <=
    (window.innerHeight || document.documentElement.clientHeight) / dividend
  );
};

const elementOutofView = (el) => {
  const elementTop = el.getBoundingClientRect().top;

  return (
    elementTop > (window.innerHeight || document.documentElement.clientHeight)
  );
};

const displayScrollElement = (element) => {
  element.classList.add("scrolled");
};

const hideScrollElement = (element) => {
  element.classList.remove("scrolled");
};

const handleScrollAnimation = () => {
  scrollElements.forEach((el) => {
    if (elementInView(el, 1.25)) {
      displayScrollElement(el);
    } else if (elementOutofView(el)) {
      hideScrollElement(el)
    }
  })
}

window.addEventListener("scroll", () => { 
  handleScrollAnimation();
});

  $.fn.BusinessViewAccessibleDropDown = function () {
    var el = $(this);

    /* Make dropdown menus keyboard accessible */

    $("a", el)
      .focus(function () {
        $(this).parents("li").addClass("hover");
      })
      .blur(function () {
        $(this).parents("li").removeClass("hover");
      });
  };
  jQuery(document).ready(function ($) {
    $("#business-view-menu").BusinessViewAccessibleDropDown();
  }); // end document ready

  window.addEventListener(
    "scroll",
    function (event) {
      var top = this.scrollY;
      if (top >= 30) {
        document.body.classList.add("scrolling");
      } else {
        document.body.classList.remove("scrolling");
      }
    },
    false
  );

  let aghome = document.querySelector(".aghome");
  if (aghome) {
    aghome.classList.add("show-axbanner");
    aghome.previousElementSibling.classList.add("has-aghome");
  }
})(jQuery);
