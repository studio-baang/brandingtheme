function sliceHEX(colorHEX) {
	return {
		r: colorHEX.slice(1, 3),
		g: colorHEX.slice(3, 5),
		b: colorHEX.slice(5, 7),
	};
}

function HEXtoRGBrange(colorHEX) {
	const { r, g, b } = HEXtoRGB(colorHEX);
	return {
		r: r / 255,
		g: g / 255,
		b: b / 255,
	};
}

function checkBrightness(colorHEX) {
	const { r, g, b } = HEXtoRGBrange(colorHEX);
	const average = (r + g + b) / 3;
	return average >= 0.5 ? true : false;
}

function HEXtoRGB(colorHEX) {
	const { r, g, b } = sliceHEX(colorHEX);
	return {
		r: parseInt(r, 16),
		g: parseInt(g, 16),
		b: parseInt(b, 16),
	};
}

function HEXtoCMYK(colorHEX) {
	const { r, g, b } = HEXtoRGBrange(colorHEX);

	const calcPercent = (value) => Math.round(value * 100);

	const black = 1 - Math.max(r, g, b);
	const calcCMY = (value) => (1 - value - black) / (1 - black) || 0;

	return {
		c: calcPercent(calcCMY(r)),
		m: calcPercent(calcCMY(g)),
		y: calcPercent(calcCMY(b)),
		k: calcPercent(black),
	};
}

function shiftgrayscale(levelValue, first, last) {
	const grayscale = [];

	const firstColor = first ?? "ff";
	const lastColor = last ?? "00";

	const firstLevel = parseInt(firstColor, 16);
	const lastLevel = parseInt(lastColor, 16);

	const pushHexCode = (hex) => {
		grayscale.push(hex + hex + hex);
	};

	pushHexCode(firstColor);

	if (levelValue >= 0) {
		const level = Math.max(Math.min(levelValue + 1, 10), 1);
		for (let i = 1; i < level; i++) {
			const value = Math.round(
				firstLevel + (i / level) * (lastLevel - firstLevel)
			);
			const convertHex = value.toString(16);

			pushHexCode(convertHex);
		}
		pushHexCode(lastColor);
	}

	return grayscale;
}

export { checkBrightness, HEXtoRGB, HEXtoCMYK, shiftgrayscale };
