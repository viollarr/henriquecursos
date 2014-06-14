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

/* funcs n stuff */
require "db_routines.php";
require "lang.php";

/* more un getting */
unget($vars["database"]);
unget($vars["table"]);

/* make a connection to the database */
$db = dbconnect($vars["database"]);

/* check the connection is ok */
if($db == false){
	Header("Location: nologin.php");
	exit();
}

/* retrieve a list of fields from $vars["table"] */

/* store all the fields and their types in an array (for ease of reference) */
if(!($fi = @mysql_query("DESC ".$vars["table"]))){
	Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(@mysql_errno()." : ".@mysql_error()." : ".$vars["table"]." - "._LISTFIELDSERROR_));
	exit();
}
$t=0;
while($tmp = @mysql_fetch_row($fi)){
	$fields[$t]["name"] = $tmp[0];
	$fields[$t]["type"] = trim($tmp[1]." ".$tmp[5]);
	if($tmp[2] != "YES") { $fields[$t]["type"] .= " not null"; }
	if($tmp[4]) { $fields[$t]["type"] .= " default '".$tmp[4]."'"; }
	$t++;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>MPanel: <?php echo _ADDRECORD_; ?></title>
<link rel="stylesheet" href="style.css"><script language="javascript" src="function.js"></script>
</head>
<body>
<table width="780" class="tmain">
<tr><td colspan="2" align="center"><a href="http://www.mattsscripts.co.uk/mpanel.htm"><img src="logo.gif" width="241" height="79" alt="Matt's MySQL Panel"></a></td></tr>
<tr><td colspan="2" align="center"><h4><?php echo _CURDATABASE_; ?> : '<?php echo $vars["database"]; ?>'</h4></td></tr>
<tr><td colspan="2" align="center"><h4><?php echo _CURTABLE_; ?> : '<?php echo $vars["table"]; ?>'</h4></td></tr>
<tr><td valign="top">
<table width="150" cellspacing="2">
<tr><td align="center" class="td_nav" onClick="javascript:top.location.href='addfield.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>';"><a class="a_nav" href="addfield.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>"><?php echo _ADDNEWFIELD_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='dumpdata.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>';"><a class="a_nav" href="dumpdata.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>"><?php echo _EXPORTTABLE_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='main.php?database=<?php echo urlencode($vars["database"]); ?>';"><a class="a_nav" href="main.php?database=<?php echo urlencode($vars["database"]); ?>"><?php echo _BACKTOMAINPAGE_; ?></a></td></tr>
<tr><td align="center" class="td_nav" onClick="javascript:my_back();"><a class="a_nav" href="javascript:my_back();"><?php echo _BACK_; ?></a></td></tr>
</table>
</td><td align="center">
<table width="630">
<tr><th><?php echo _FIELDNAME_; ?></th><th align="center" colspan="2"><?php echo _VALUE_; ?></th></tr>
<form action="addrecord_.php" method="post">
<input type="hidden" name="database" value=<?php echo tag($vars["database"]); ?>>
<input type="hidden" name="table" value=<?php echo tag($vars["table"]); ?>>
<input type="hidden" name="numfields" value=<?php echo tag(sizeof($fields)); ?>>
<?php

/* for each of the fields display a new row with options etc */
for($tmp=0; $tmp<sizeof($fields); $tmp++){
	// is this an enum() type? if so then we should use a drop down menu for it
	if(eregi("^enum", $fields[$tmp]["type"])) {
		$type = "<select name=\"rec_".$tmp."\"><option value=\"\">[empty]</option>";

		// construct the various <option> tags
		$s = strpos($fields[$tmp]["type"], "(")+1;
		$e = strpos($fields[$tmp]["type"], ")", $s);

		$str = substr($fields[$tmp]["type"], $s, $e-$s);

		$bits = explode(",", substr($fields[$tmp]["type"], $s, $e-$s));
		for($l=0; $l<sizeof($bits); ++$l) {
			$bits[$l] = ereg_replace("(^')|('$)", "", $bits[$l]);
			$type .= "<option value=".tag($bits[$l]).">".$bits[$l].'</option>';
		}
		$type .= "</select>";
		// check to see whether or not there is a "default" set
		if(($d = strpos($fields[$tmp]["type"], "default")) != FALSE) {
			$d += 8;
			$de = strpos($fields[$tmp]["type"], "'", $d+1)+1;
			$str = substr($fields[$tmp]["type"], $d, $de-$d);
			$type = str_replace("value=".tag($str), "value=".tag($str)." SELECTED", $type);
		}

		// remove the enum(...) from the type, well, swap it for enum(...)
		$fields[$tmp]["type"] = str_replace("enum(".substr($fields[$tmp]["type"], $s, $e-$s).")", "enum(...)", $fields[$tmp]["type"]);
	} else if(eregi("^text", $fields[$tmp]["type"])) {
		$type = "<textarea rows=\"6\" cols=\"47\" name=\"rec_".$tmp."\"></textarea>";
	} else {
		// this is the default type for each field
		$type = "<input type=\"text\" size=\"50\" name=\"rec_".$tmp."\">";
	}

	echo "<tr><td class=\"td_sm\" width=\"100%\" valign=\"top\">", $fields[$tmp]["name"], " (", $fields[$tmp]["type"], ")</td><td align=\"center\"><select class=\"td_sm\" name=\"intype_", $tmp, "\"><option value=\"\"></option><option value=\"NULL\">NULL</option><option value=\"FUNC\">", _FUNC_, "</option></select></td><td valign=\"top\">", $type, "</td></tr>\n";
}

/* close the mysql database connection */
@mysql_close();

?>
<tr><td colspan="3" align="center"><input type="submit" value=<?php echo tag(_ADDRECORD_); ?>></td></tr>
</form>
</table>
</td></tr>
<tr><td colspan="2" align="center">
<form action="submitsql.php" method="post">
<?php echo _EXECUTESQL_; ?> <input type="text" name="sqlcmd" size="50">
<input type="hidden" name="database" value=<?php echo tag($vars["database"]); ?>>
<input type="submit" value=<?php echo tag(_OK_); ?>>
</form>
</td></tr>
</table>
</body>
</html>
