import { gsap } from "gsap";
import { InertiaPlugin } from "gsap/InertiaPlugin.js";

import { Point } from "./point.js";

gsap.registerPlugin(InertiaPlugin);

const setTween = {
    x: 0,
    y: -60,
    rotationX: 20,
    rotationY: -25,
    rotationZ: 5
}

const HEIGHT_RADIO = 1.618;
const TRANSLATE_SPEED = 0.05;
const ROTATE_SPEED = 0.006;

export class Card {
    constructor(selector) {
        this.cardElement = document.querySelector(selector);

        this.innerWidth = this.cardElement.offsetWidth;
        this.innerHeight = this.innerWidth * HEIGHT_RADIO;

        this.innerCard = document.createElement('div');
        this.innerCard.classList.add('intro_card_item');
        this.innerCard.style.cssText = `
            width: ${this.innerWidth}px;
            height: ${this.innerHeight}px;
            `;

        // onload method
        this.cardElement.style.cssText = `
            transform-style: preserve-3d;
            perspective-origin: 50% 50%;
            perspective: 800px;`
        this.cardElement.appendChild(this.innerCard);
        gsap.to(this.innerCard, {
            inertia: {
                z: {
                    velocity: 1000,
                    max: 50,
                    min: 0
                }
            },
            y: setTween.y,
            rotationX: setTween.rotationX,
            rotationY: setTween.rotationY,
            rotationZ: setTween.rotationZ
        });

        this.mousePos = new Point();

        window.addEventListener('resize', this.resize.bind(this), false);
        this.resize();

    }
    resize() {
        this.innerWidth = this.cardElement.offsetWidth;
        this.innerHeight = this.innerWidth * HEIGHT_RADIO;

        gsap.to(this.innerCard, {
            width: this.innerWidth,
            height: this.innerHeight,
        })

        this.mousePos = new Point();
    }

    mouseMove(point) {
        this.mousePos = point.clone();
        gsap.to(this.innerCard, {
            x: this.mousePos.x * TRANSLATE_SPEED,
            y: this.mousePos.y * -TRANSLATE_SPEED + setTween.y,
            rotationY: this.mousePos.x * ROTATE_SPEED + setTween.rotationY,
            rotationX: this.mousePos.y * ROTATE_SPEED + setTween.rotationX,
        });
    }
}
