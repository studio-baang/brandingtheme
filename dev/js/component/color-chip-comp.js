import { checkBrightness, HEXtoRGB, HEXtoCMYK } from "../modules/convert-color";

const el = wp.element.createElement;
const components = window.wp.components;

function ChipTitle(props) {
	const name = props.name;
	return name != null
		? el("h2", { class: "color-chip__title" }, `${name}`)
		: "";
}

function ChipDataList(props) {
	const hex = props.color;

	const { r, g, b } = HEXtoRGB(hex);
	const { c, m, y, k } = HEXtoCMYK(hex);

	return el(
		"dl",
		{ class: "color-chip__list" },
		el("dt", { class: "color-chip__type" }, "HEX"),
		el("dd", { class: "color-chip__value" }, `${hex}`),
		el("dt", { class: "color-chip__type" }, "RGB"),
		el("dd", { class: "color-chip__value" }, `${r} ${g} ${b}`),
		el("dt", { class: "color-chip__type" }, "CMYK"),
		el("dd", { class: "color-chip__value" }, `${c}% ${m}% ${y}% ${k}%`)
	);
}

export function EditColorChip(props) {
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
		{ className: "edit-color-chip" },
		el("input", {
			type: "text",
			value: name,
			onChange: editName,
			placeholder: "칩 이름을 기입하세요",
		}),
		el(components.ColorPicker, {
			copyFormat: "hex",
			color: color,
			onChange: editColor,
		})
	);
}

export function ColorChip(props) {
	const { name, color } = props.attributes;

	const styled = {
		backgroundColor: `${color}`,
		color: !checkBrightness(color) ? "#ffffff" : "#000000",
	};

	return el(
		"div",
		{ class: "color-chip", style: styled },
		el(ChipTitle, { name }),
		el(ChipDataList, { color })
	);
}
