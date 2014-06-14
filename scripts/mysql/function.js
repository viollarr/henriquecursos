// needed
function my_back()
{
	// for some reason, IE doesn't recognise back() as a function...
	if(navigator.userAgent.indexOf("MSIE") != -1) {
		history(-1);
	} else {
		back();
	}
}
