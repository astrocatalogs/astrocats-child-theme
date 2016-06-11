function resizeIframe(obj) {
	var iframeWin = obj.contentWindow || obj.contentDocument.parentWindow;
	if (iframeWin.document.body) {
		setTimeout( function() { obj.height = (iframeWin.document.body.scrollHeight || iframeWin.document.documentElement.scrollHeight) + 30 + 'px'; }, 10);
	}
	document.getElementById('loading').style.display = 'none';
}
