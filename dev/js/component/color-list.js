function List(props) {
	const className = "color-guide__list";

	const style = {
		backgroundColor: `${
			props.colorGroup[props.colorGroup.length - 1].hex ??
			props.colorGroup[props.colorGroup.length - 1]
		}`,
	};
	if (props.colorGroup.length > 0) {
		return el(
			"article",
			{
				class: props.modifyName
					? className + " " + className + "--" + props.modifyName
					: className,
				style: style,
			},
			props.colorGroup.map((e) => el(ColorChip, { target: e }))
		);
	}
}
