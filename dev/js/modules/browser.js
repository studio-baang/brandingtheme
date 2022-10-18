const returnArray = [];

function pushBrowser(array) {
	const body = document.querySelector("body");
	array.forEach((element) => {
		body.classList.add(element);
		returnArray.push(element);
	});
}

export function addBrowserClass() {
	const deviceAgent = navigator.userAgent.toLowerCase();
	if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
		pushBrowser(["ios", "mobile"]);
	}
	if (deviceAgent.match(/(Android)/)) {
		pushBrowser(["android", "mobile"]);
	}
	if (navigator.userAgent.search("MSIE") >= 0) {
		pushBrowser(["ie"]);
		return returnArray;
	}
	if (navigator.userAgent.search("Chrome") >= 0) {
		pushBrowser(["chrome"]);
		return returnArray;
	}
	if (navigator.userAgent.search("Firefox") >= 0) {
		pushBrowser(["firefox"]);
		return returnArray;
	}
	if (
		navigator.userAgent.search("Safari") >= 0 &&
		navigator.userAgent.search("Chrome") < 0
	) {
		pushBrowser(["safari"]);
		return returnArray;
	}
	if (navigator.userAgent.search("Opera") >= 0) {
		pushBrowser(["opera"]);
		return returnArray;
	}
}
