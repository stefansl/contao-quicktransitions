/*
 * Contao Quick Transitions
 * @author: Stefan Schulz-Lauterbach <ssl@clickpress.de>
 */



(function () {
  'use strict';
  if (window.innerWidth >= 768) {
    var intFrameHeight = window.innerHeight;

  // Animations
  var elAnimation = document.querySelectorAll('[data-animation]'),
      countContainer = elAnimation.length;

  var animateInViewport = function () {
    for (var i = 0; i < countContainer; ++i) {
      var pos = elAnimation[i].getBoundingClientRect(),
        rounded = Math.round(pos.top) - 100;

      if (rounded <= intFrameHeight) {
        elAnimation[i].classList.add('animate');
      }
    }
  };

    var startAnimation = function () {
      animateInViewport();
    };

    // Initial fade in anim on load
    animateInViewport();
  }


  window.addEventListener('scroll', function () {
    requestAnimationFrame(startAnimation);
  }, {
    capture: true,
    passive: true
  });

}());
