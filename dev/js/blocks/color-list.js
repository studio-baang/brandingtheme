(function (blocks) {
	const registerBlockType = blocks.registerBlockType;
	const el = wp.element.createElement,
		useBlockProps = wp.blockEditor.useBlockProps,
		InnerBlocks = wp.blockEditor.InnerBlocks;

	function EditColorList(props) {
		const blockProps = useBlockProps();
		const {
			attributes: { isGrid },
			setAttributes,
		} = props;

		return el(
			"div",
			blockProps,
			el(
				"h3",
				{ onClick: () => setAttributes({ isGrid: !isGrid }) },
				!isGrid ? "컬러 리스트 - 기본" : "컬러 리스트 - 그리드"
			),
			el(InnerBlocks, {
				allowedBlocks: ["studio-baang/color-chip"],
				template: [["studio-baang/color-chip", {}]],
				templateLock: false,
				templateInsertUpdatesSelection: true,
				orientation: "horizontal",
			})
		);
	}

	function ColorList(props) {
		const { isGrid } = props.attributes;

		let className = "color-guide__list";
		className = isGrid ? className + " " + className + "--grid" : className;

		return el(
			"div",
			{
				className: className,
			},
			el(InnerBlocks.Content)
		);
	}

	registerBlockType("studio-baang/color-list", {
		apiVersion: 2,
		title: "컬러 리스트",
		category: "design",
		icon: "lightbulb",
		description: "브랜드 컬러 리스트을 생성합니다.",
		parent: ["studio-baang/color-guide"],

		attributes: {
			isGrid: {
				type: "boolean",
				default: false,
			},
		},

		edit: EditColorList,

		save: ColorList,
	});
})(window.wp.blocks);
