function resizeIframe(obj, height) {
	if (typeof(height) === 'undefined') height = 950;
	obj.style.height = obj.contentWindow.document.body.scrollHeight + height + 'px';
	document.getElementById('loading').style.display = 'none';
}
