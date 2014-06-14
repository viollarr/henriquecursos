<?php
/*

Matt's MySQL Panel - administer MySQL databases remotely
Copyright (C) 2001 Matt Wilson <matt@mattsscripts.co.uk

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

*/

/* include the language stuff */
require "db_routines.php";
require "lang.php";

/* unget some stuff */
unget($vars["database"]);
unget($vars["sqlcmd"]);

/* connect to the database */
$db = dbconnect($vars["database"]);

/* check we connected OK */
if($db == false){
	Header("Location: nologin.php");
	exit();
}

/* perform the SQL query, if it went wrong then we didn't construct it, and hence, we don't know instantly what is wrong with it, so pass it onto the error.php page */
if(!($q = @mysql_query($vars["sqlcmd"]))){
	Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(@mysql_errno()." : ".@mysql_error()." : "._SQLERROR_.": '".$vars["sqlcmd"]."'"));
	exit();
}

/* obtain a list of fields for the result set */
$numfields = @mysql_num_fields($q);
$numrows = @mysql_num_rows($q);
$numrowsaffected = @mysql_affected_rows($db);

/* if this was a SELECT query then we want to show the results, otherwise there's no need! */
$vars["sqlcmd"] = trim($vars["sqlcmd"]);
if(!eregi("^(select|show|desc)", $vars["sqlcmd"])) {
	if(eregi("^(\s*)update", $vars["sqlcmd"])) {
		Header("Location: main.php?database=".urlencode($vars["database"])."&msg=".urlencode(_SQLEXECUTED_." - "._SQLRESULTROWSAFFECTED_." : ".$numrowsaffected));
	} else {
		Header("Location: main.php?database=".urlencode($vars["database"])."&msg=".urlencode(_SQLEXECUTED_));
	}
	exit;
}
settype($numfields, "integer");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> 
<head>
<title>MPanel: <?php echo _SQLRESULTS_; ?></title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" href="style.css"><script language="javascript" src="function.js"></script>
</head>
<body>
<table width="780" class="tmain">
<tr><td colspan="2" align="center"><a href="http://www.mattsscripts.co.uk/mpanel.htm"><img src="logo.gif" width="241" height="79" alt="Matt's MySQL Panel"></a></td></tr>
<tr><td colspan="2" align="center"><h4><?php echo _SQLEXECUTED_; ?></h4></td></tr>
<tr><td valign="top">
<table width="150" cellspacing="2">
<tr><td class="td_nav" align="center"><a class="a_nav" href="main.php?database=<?php echo urlencode($vars["database"]); ?>"><?php echo _BACKTOMAINPAGE_; ?></a></td></tr>
<tr><td class="td_nav" align="center"><a class="a_nav" href="help.php"><?php echo _HELPPAGE_; ?></a></td></tr>
</table>
</td><td align="center">
<?php

echo _SQLOUTPUT_;

// show the results
if($r = @mysql_fetch_array($q)){
        do{
?>
<table class="tmain" width="630">
<tr><th><?php echo _FIELDNAME_; ?></th><th align="center" width="350"><?php echo _VALUE_; ?></th></tr>
<?php
		while(list($key, $val) = each($r)) {
			list($key, $val) = each($r);
			echo "<tr><td class=\"td_sm\">", $key, "</td><td>";
			if(!strlen($val)) {
				echo "&nbsp;";
			} else {
				echo str_replace("<", "&lt;", str_replace(">", "&gt;", str_replace("&", "&amp;", $val)));
			}
			echo "</td></tr>\n";
		}
?>
</table>
<br>
<!-- end new code -->
<?php
/* loop em all */
	} while($r = @mysql_fetch_array($q));
} else {
/* do something to show that there were no entries found in the database */
	echo "<p align=\"center\" color=\"red\">", _SEARCHEMPTY_, "</p>";
}

/* output a little message */
echo _SQLRESULTCODE_, ":<BR>", _SQLRESULTROWS_, ": ", $numrows, "<BR>", _SQLRESULTFIELDS_, ": ", $numfields;

/* make sure to free the query */
@mysql_free_result($q);

?>

</td></tr></table>
</td></tr></table>
</body>
</html>
