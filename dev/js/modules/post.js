import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollSmoother } from "gsap/ScrollSmoother";

gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

class Post {
	constructor() {
		this.LIMITSPEED = 5;

		ScrollTrigger.defaults({
			scroller: "#app",
			markers: false,
		});

		this.smoother = ScrollSmoother.get();

		this.addOpacityAnimation(".studio-baang-composition__title h2");
		this.addOpacityAnimation(".studio-baang-composition__description p,li");
		this.addGalleryAnimation(".wp-block-image", ".studio-baang-gallery");
		this.addGalleryAnimation(
			".studio-baang-cover__image--cover,.studio-baang-cover__image--logo",
			".studio-baang-cover",
			0.4,
			0.2
		);
	}

	addOpacityAnimation(selectorText) {
		const targets = gsap.utils.toArray(selectorText);
		targets.forEach((e) => {
			gsap.defaults({
				ease: "none",
			});
			const anim = gsap.fromTo(
				e,
				{
					opacity: 0,
					transformOrigin: "0% 100%",
				},
				{
					opacity: 1,
					paused: true,
				}
			);
			ScrollTrigger.create({
				trigger: e,
				start: "center 80%",
				onEnter: () => anim.play(),
			});
		});
	}

	addGalleryAnimation(selectorText, scopeText, modulus, phase) {
		if (scopeText) {
			const scopeQuery = document.querySelectorAll(scopeText);
			scopeQuery.forEach((element) => {
				this.createGalleryAnimation(selectorText, element, modulus, phase);
			});
			return;
		}
		this.createGalleryAnimation(selectorText, scopeText);
	}

	createGalleryAnimation(selectorText, scopeText, modulus, phase) {
		const targets = gsap.utils.toArray(selectorText, scopeText);
		const modulusValue = modulus || 0.6;
		const phaseValue = phase || 0.04;
		targets.forEach((e, i) => {
			gsap.set(e, {
				zIndex: i + 1,
			});
		});
		this.smoother.effects(targets, {
			speed: (index) => {
				return modulusValue + (index % this.LIMITSPEED) * phaseValue;
			},
		});
	}
}

export { Post };
