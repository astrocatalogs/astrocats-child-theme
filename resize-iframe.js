function resizeIframe(obj) {
	obj.style.height = obj.contentWindow.document.body.scrollHeight + 1350 + 'px';
	document.getElementById('loading').style.display = 'none';
}
