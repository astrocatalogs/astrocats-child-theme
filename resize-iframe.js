function resizeIframe(obj) {
	var iframeWin = obj.contentWindow || obj.contentDocument.parentWindow;
	if (iframeWin.document.body) {
		setTimeout( function() { obj.height = parseInt(iframeWin.document.documentElement.scrollHeight) + 'px'; }, 200);
		setInterval( function() { obj.height = parseInt(iframeWin.document.documentElement.scrollHeight) + 'px'; }, 2000);
	}
	document.getElementById('loading').style.display = 'none';
}
