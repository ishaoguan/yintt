var initClipBoard = function(a) {
	var c = null;
	var d;
	c = new ZeroClipboard.Client();
	c.setHandCursor(true);
	c.addEventListener("complete", function(e) {
		$("#txt_links").select();
		if(typeof b == "function")b();
	});
	c.addEventListener("mouseup", function() {
		c.setText($("#txt_links").val());
	});
	setTimeout(function() {
		c.glue("copy_button")
	}, 200)
};