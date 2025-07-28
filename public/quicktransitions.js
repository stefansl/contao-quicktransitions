/*
 * Contao Quick Transitions
 *
 * @author: Stefan Schulz-Lauterbach <ssl@clickpress.de>
 */

(function () {
    'use strict'

    const observer = new IntersectionObserver( (entries)=>{
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("animate")
            }
        })
    }, {})

    const elAnimation = document.querySelectorAll('[data-animation]')
    elAnimation.forEach(el => {
        observer.observe(el)
    })
}())

