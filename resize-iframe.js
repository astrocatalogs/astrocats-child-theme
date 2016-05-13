function resizeIframe(obj, height = 950) {
	obj.style.height = obj.contentWindow.document.body.scrollHeight + height + 'px';
	document.getElementById('loading').style.display = 'none';
}
