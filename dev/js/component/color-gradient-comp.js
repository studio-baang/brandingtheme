import { createGradientArray } from "../modules/convert-color";
import { ColorChip } from "./color-chip-comp";

const el = wp.element.createElement,
	useBlockProps = wp.blockEditor.useBlockProps,
	component = wp.components;

function EntryDesc(props) {
	const { title, desc } = props;
	const styled = {
		whiteSpace: "pre-line",
	};

	return [el("h3", { style: styled }, title), el("p", { style: styled }, desc)];
}

export function EditGradient(props) {
	const blockprops = useBlockProps();
	const {
		attributes: { level, startColor, endColor },
		setAttributes,
	} = props;

	const editLevel = (val) => {
		setAttributes({ level: Number(val.target.value) });
	};

	const editStartColor = (val) => {
		setAttributes({ startColor: val });
	};

	const editEndColor = (val) => {
		setAttributes({ endColor: val });
	};

	return el(
		"div",
		Object.assign(blockprops, {
			style: {
				display: "flex",
				flexDirection: "column",
				gap: "1em",
			},
		}),
		el(
			"div",
			{
				style: {
					display: "flex",
					gap: "1em",
				},
			},
			el("input", {
				type: "number",
				min: 0,
				max: 10,
				value: level,
				onChange: editLevel,
			}),
			el("input", {
				type: "range",
				min: 0,
				max: 10,
				value: level,
				onChange: editLevel,
			})
		),
		el(
			"div",
			{
				style: {
					display: "flex",
					gap: "1em",
				},
			},
			el(
				"div",
				null,
				el(EntryDesc, {
					title: "그라디언트 시작 색상",
					desc: `그라디언트 시작 색상을 지정합니다.\n기본값 : #ffffff`,
				}),
				el(component.ColorPicker, {
					copyFormat: "hex",
					color: startColor,
					onChange: editStartColor,
				})
			),
			el(
				"div",
				null,
				el(EntryDesc, {
					title: "그라디언트 끝 색상",
					desc: `그라디언트 끝 색상을 지정합니다. \n 기본값 : #000000`,
				}),
				el(component.ColorPicker, {
					copyFormat: "hex",
					color: endColor,
					onChange: editEndColor,
				})
			)
		)
	);
}

export function Gradient(props) {
	const colorArray = createGradientArray(props.attributes);

	const content = colorArray.map((color) =>
		el(ColorChip, {
			attributes: {
				color: color,
			},
		})
	);

	return el(
		"div",
		{ className: "color-guide__list color-guide__list--gradient" },
		content
	);
}
