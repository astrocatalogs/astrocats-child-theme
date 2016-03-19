function resizeIframe(obj) {
	obj.style.height = obj.contentWindow.document.body.scrollHeight + 650 + 'px';
	document.getElementById('loading').style.display = 'none';
}
