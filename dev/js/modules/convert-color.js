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

function HEXtoRGB(colorHEX) {
	const { r, g, b } = sliceHEX(colorHEX);

	return {
		r: parseInt(r, 16),
		g: parseInt(g, 16),
		b: parseInt(b, 16),
	};
}

function checkBrightness(colorHEX) {
	const { r, g, b } = HEXtoRGBrange(colorHEX);
	const average = (r + g + b) / 3;
	return average >= 0.6 ? true : false;
}

function RGBtoHEX(RGB) {
	const { r, g, b } = RGB;

	const getHexVaule = (number) => {
		const numerHex = number.toString(16);
		return numerHex.length < 2 ? "0" + numerHex : numerHex;
	};

	return "#" + getHexVaule(r) + getHexVaule(g) + getHexVaule(b);
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

function createGradientArray(props) {
	const { level, startColor, endColor } = props;
	const colorGroup = [];

	const startColorSliceRGB = HEXtoRGB(startColor);
	const endColorSlideRGB = HEXtoRGB(endColor);

	const calcGradientRGB = (index) => {
		const first = startColorSliceRGB;
		const last = endColorSlideRGB;

		const calcValue = (firstValue, lastValue) =>
			Math.round(firstValue + (index / level) * (lastValue - firstValue));

		return {
			r: calcValue(first.r, last.r),
			g: calcValue(first.g, last.g),
			b: calcValue(first.b, last.b),
		};
	};

	colorGroup.push(startColor);

	if (level > 0) {
		const limitLevel = Math.max(Math.min(level, 10), 1);
		for (let i = 1; i < limitLevel; i++) {
			colorGroup.push(RGBtoHEX(calcGradientRGB(i)));
		}
		colorGroup.push(endColor);
	}

	return colorGroup;
}

export { checkBrightness, HEXtoRGB, HEXtoCMYK, createGradientArray };
