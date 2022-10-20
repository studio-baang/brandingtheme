import { EditGradient, Gradient } from "../component/color-gradient-comp";

(function (blocks) {
	const registerBlockType = blocks.registerBlockType;

	registerBlockType("studio-baang/color-gradient", {
		apiVersion: 2,
		title: "컬러 그라디언트",
		category: "design",
		icon: "lightbulb",
		description: "그라디언트 컬러 리스트를 생성합니다.",
		parent: ["studio-baang/color-guide"],

		attributes: {
			level: {
				type: "number",
				default: 0,
			},
			startColor: {
				type: "string",
				default: "#ffffff",
			},
			endColor: {
				type: "string",
				default: "#000000",
			},
			colorArray: {
				type: "array",
				default: [],
			},
		},

		edit: EditGradient,

		save: Gradient,
	});
})(window.wp.blocks);
