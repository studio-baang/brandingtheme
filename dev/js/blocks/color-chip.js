import { ColorChip, EditColorChip } from "../component/color-chip-comp";

(function (blocks) {
	const registerBlockType = blocks.registerBlockType;

	registerBlockType("studio-baang/color-chip", {
		apiVersion: 2,
		title: "컬러 칩",
		category: "design",
		icon: "lightbulb",
		parent: ["studio-baang/color-list"],
		description:
			"브랜드 컬러 칩을 생성합니다. hex값을 선택하면 자동으로 rgb, cmyk값을 반환합니다.",

		attributes: {
			name: {
				type: "string",
			},
			color: {
				type: "string",
				default: "#ffffff",
			},
		},

		edit: EditColorChip,

		save: ColorChip,
	});
})(window.wp.blocks);
