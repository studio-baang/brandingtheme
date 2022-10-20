(function (blocks, blockEditor, element) {
	const el = element.createElement,
		useBlockProps = blockEditor.useBlockProps,
		InnerBlocks = blockEditor.InnerBlocks,
		registerBlockType = blocks.registerBlockType;

	const MY_TEMPLATE = [
		["studio-baang/color-list", {}],
		["studio-baang/color-list", { isGrid: true }],
		["studio-baang/color-gradient", {}],
	];

	registerBlockType("studio-baang/color-guide", {
		apiVersion: 2,
		title: "컬러 가이드",
		category: "design",
		icon: "lightbulb",

		description: "브랜드 컬러 가이드 색션을 생성합니다.",

		edit: function () {
			const blockprops = useBlockProps();

			return el(
				"div",
				blockprops,
				el(InnerBlocks, {
					template: MY_TEMPLATE,
					templateLock: "all",
				})
			);
		},

		save: function () {
			return el(
				"section",
				{ className: "color-guide" },
				el(InnerBlocks.Content)
			);
		},
	});
})(window.wp.blocks, window.wp.blockEditor, window.wp.element);
