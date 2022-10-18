import { ColorChip } from "./component/color-chip-components";

(function (blocks, element, data, blockEditor) {
	const el = element.createElement,
		useBlockProps = blockEditor.useBlockProps,
		registerBlockType = blocks.registerBlockType,
		component = wp.components;

	registerBlockType("studio-baang/color-chip", {
		apiVersion: 2,
		title: "컬러 칩",
		category: "design",
		icon: "lightbulb",
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

		edit: function (props) {
			const blockProps = useBlockProps();
			const {
				attributes: { name, color },
				setAttributes,
			} = props;

			const editName = (event) => {
				setAttributes({ name: event.target.value });
			};

			const editColor = (val) => {
				setAttributes({ color: val });
			};

			return el(
				"div",
				blockProps,
				el("input", {
					type: "text",
					value: name,
					onChange: editName,
					placeholder: "칩 이름을 기입하세요",
				}),
				el(component.ColorPicker, {
					copyFormat: "hex",
					color: color,
					onChange: editColor,
				})
			);
		},

		save: function (props) {
			let content;
			const { name, color } = props.attributes;

			return el(
				ColorChip,
				{
					name,
					color,
				},
				null
			);
		},
	});
})(window.wp.blocks, window.wp.element, window.wp.data, window.wp.blockEditor);
