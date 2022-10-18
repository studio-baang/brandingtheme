import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

export const ScrollAnimate = {
    animDom: gsap.utils.toArray('.scroll-animate'),
    animDomArray: [],
    init: function () {
        for (let i = 0; i < this.animDom.length; i++) {
            const target = this.animDom[i];
            // const getDataScrollAnimate = target.getElementsByClassName();
            const coords = { x: 0, y: 250 };
            if (target.classList.contains('scroll-animate__left')) {
                coords.x = '100%';
                coords.y = 0;
            };
            if (target.classList.contains('scroll-animate__right')) {
                coords.x = '-100%';
                coords.y = 0;
            };
            this.animDomArray.push({ selector: target, transform: coords })
        }
        this.animDomArray.forEach(e => {
            const transformX = e.transform.x;
            const transformY = e.transform.y;
            gsap.set(e.selector, {
                x: transformX,
                y: transformY,
                opacity: 1,
            });
            gsap.to(e.selector, {
                x: 0,
                y: 0,
                opacity: 1,
                scrollTrigger: {
                    trigger: e.selector,
                    start: 'top bottom',
                    end: "bottom top",
                    toggleActions: "restart none none reverse"
                },
                ease: 'power2.out'
            });
        });
    }
};