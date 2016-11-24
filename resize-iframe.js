function autoResize(){
	setTimeout( function() { jQuery('#themeframe').height(jQuery('#themeframe').contents().height()); }, 400);
	document.getElementById('loading').style.display = 'none';
}

window.onfocus = function() { autoResize(); };
