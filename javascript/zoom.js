function zoom600x600(parameter1) {
	var name = new Date().getTime();
	Fenster = window.open("about:blank", name, "width=600,height=600,menubar=no,screenX=10,screenY=10,scrollbars=no,status=no,toolbar=no");
	Fenster.document.write("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">\n<html>\n<head>\n\t<title>Dark Rain &ndash; Bild</title>\n</head>\n<body>\n");
	Fenster.document.write("\t<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n\t\t<tr>\n\t\t\t<td colspan=\"2\" width=\"565\" height\"1\"><img alt=\"\" src=\"../images/sonstiges/spacer.gif\" width=\"565\" height=\"1\" border=\"0\" /></td>\n\t\t</tr>\n\t\t<tr>\n\t\t\t<td width=\"1\" height\"565\"><img alt=\"\" src=\"../images/sonstiges/spacer.gif\" width=\"1\" height=\"565\" border=\"0\" /></td>\n\t\t\t<td align=\"center\" valign=\"middle\"><img src=\"" + parameter1 + "\" border=\"0\" /></td>\n\t\t</tr>\n\t</table>" );

	Fenster.document.write("\n</body>\n</html>");
	Fenster.document.bgColor = "#000000";
}

function zoom800x600(parameter1) {
	var name = new Date().getTime();
	Fenster = window.open("about:blank", name, "width=800,height=600,menubar=no,screenX=10,screenY=10,scrollbars=no,status=no,toolbar=no");
	Fenster.document.write("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">\n<html>\n<head>\n\t<title>Dark Rain &ndash; Bild</title>\n</head>\n<body>\n");
	Fenster.document.write("\t<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n\t\t<tr>\n\t\t\t<td colspan=\"2\" width=\"765\" height\"1\"><img alt=\"\" src=\"../images/sonstiges/spacer.gif\" width=\"765\" height=\"1\" border=\"0\" /></td>\n\t\t</tr>\n\t\t<tr>\n\t\t\t<td width=\"1\" height\"565\"><img alt=\"\" src=\"../images/sonstiges/spacer.gif\" width=\"1\" height=\"565\" border=\"0\" /></td>\n\t\t\t<td align=\"center\" valign=\"middle\"><img src=\"" + parameter1 + "\" border=\"0\" /></td>\n\t\t</tr>\n\t</table>" );
	Fenster.document.write("\n</body>\n</html>");
	Fenster.document.bgColor = "#000000";
}

