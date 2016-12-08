// Allow detect installed extension to seamless redirection
chrome.webRequest.onBeforeSendHeaders.addListener(
	function(info) {
		var headers = info.requestHeaders;
		headers.push({
			"name":"EET-Check-extension",
			"value" : "v0.1"
		});
		return {requestHeaders: headers};
	},
	{
		urls: [
			"https://*.eet-check.appspot.com/*"
		]
	},
	["blocking","requestHeaders"]
);