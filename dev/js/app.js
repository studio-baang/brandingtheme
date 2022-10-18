import barba from "@barba/core";
import { debounce } from "lodash";
import { addBrowserClass as getBrowerInfo } from "./modules/browser";

import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollSmoother } from "gsap/ScrollSmoother";

gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

import { Post } from "./modules/post";

class App {
	constructor() {
		this.documentDom = document.documentElement;

		this.browserArray = getBrowerInfo();

		// this.smoother;
		// this.setBarba();
		this.onResize();

		window.addEventListener(
			"resize",
			debounce(this.onResize.bind(this), 100),
			false
		);
	}

	onResize(e) {
		if (
			Math.abs(this.vh - window.visualViewport.height) < 200 &&
			this.vw == window.visualViewport.width
		) {
			return false;
		}
		this.vw = window.visualViewport.width;
		this.vh = window.visualViewport.height;
		this.documentDom.style.cssText = `--vh: ${this.vh / 100}px;`;
	}

	setBarba() {
		let post;
		barba.hooks.beforeLeave(() => {
			this.smoother.kill();
			ScrollTrigger.refresh();
		});
		barba.hooks.afterEnter(() => {
			this.smoother = ScrollSmoother.create({
				wrapper: "#app",
				content: "#wrapper",
				effects: true,
				smooth: 1,
				smoothTouch: 0.1,
			});
			ScrollTrigger.normalizeScroll(true);
		});
		barba.init({
			debug: true,
			views: [
				{
					namespace: "home",
					afterEnter() {
						console.log("i'm in home!");
					},
				},
				{
					namespace: "post",
					afterEnter() {
						new Post();
					},
				},
			],
		});
	}
}

window.onload = () => {
	new App();
};
