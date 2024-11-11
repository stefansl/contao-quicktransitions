/*
 * Contao Quick Transitions
 *
 * @author: Stefan Schulz-Lauterbach <ssl@clickpress.de>
 */

(function () {
    'use strict'

    const intFrameHeight = window.innerHeight

    // Animations
    const elAnimation = document.querySelectorAll('[data-animation]'),
        countContainer = elAnimation.length

    if (elAnimation.length === 0) return;

    if (window.innerWidth >= 768) {
        const animateInViewport = function () {
            for (let i = 0; i < countContainer; ++i) {
                const pos = elAnimation[i].getBoundingClientRect(),
                    rounded = Math.round(pos.top) - 100

                if (rounded <= intFrameHeight) {
                    elAnimation[i].classList.add("animate")
                }
            }
        }
        const startAnimation = function () {
            animateInViewport()
        }

        // Initial fade in anim on load
        animateInViewport()

        window.addEventListener("resize", function () {
            requestAnimationFrame(startAnimation)
        }, {
            capture: true,
            passive: true
        })

        window.addEventListener("scroll", function () {
            requestAnimationFrame(startAnimation)
        }, {
            capture: true,
            passive: true
        })
    }


}())

