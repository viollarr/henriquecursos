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

/* include the db connectivity stuff and language stuff */
require "db_routines.php";
require "lang.php";

/* connect to the database */
$db = dbconnect($vars["database"]);

/* check to make sure it connected */
if($db == false){
	Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(_ERRORDBCONNECT_." - ".@mysql_error()." : ".@mysql_errno()));
	exit();
}

/* unget some stuff */
unget($vars["database"]);
unget($vars["table"]);
unget($vars["msg"]);

/* store all the fields and their types in an array (for ease of reference) */
if(!($fi = @mysql_query("DESC ".$vars["table"]))){
	Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(@mysql_errno()." : ".@mysql_error()." : "._ERRORTABLEDESC_." : 'DESC ".$vars["table"]."'"));
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
<title>MPanel: <?php echo _TABLEDETAILS_; ?></title>
<link rel="stylesheet" href="style.css"><script language="javascript" src="function.js"></script>
</head>
<body>
<table width="780" class="tmain">
<tr><td colspan="2" align="center"><a href="http://www.mattsscripts.co.uk/mpanel.htm"><img src="logo.gif" width="241" height="79" alt="Matt's MySQL Panel"></a></td></tr>
<tr><td colspan="2" align="center"><h4><?php echo _CURDATABASE_; ?> : '<?php echo $vars["database"]; ?>'</h4></td></tr>
<tr><td colspan="2" align="center"><h4><?php echo _CURTABLE_; ?> : '<?php echo $vars["table"]; ?>'</h4></td></tr>
<?php if(isset($msg)) { echo "<tr><td colspan=\"2\" align=\"center\">", $msg, "</td></tr>"; } ?>
<tr><td valign="top">
<table width="150" cellspacing="2">

<tr><td align="center" class="td_nav" onClick="javascript:top.location.href='addfield.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>';"><a class="a_nav" href="addfield.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>"><?php echo _ADDNEWFIELD_; ?></a></td></tr>
<tr><td align="center" class="td_nav" onClick="javascript:top.location.href='addrecord.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>';"><a class="a_nav" href="addrecord.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>"><?php echo _ADDRECORD_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='querytable.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>';"><a class="a_nav" href="querytable.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>"><?php echo _SEARCHDELETEMODIFYRECORDS_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='querytable_.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>';"><a class="a_nav" href="querytable_.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>"><?php echo _BROWSE_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='querytable_.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>';"><a class="a_nav" href="querytable_.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>&do_matrix=1&rpp=50"><?php echo _BROWSEQUICK_; ?></a></td></tr>
<tr><td align="center" class="td_nav" onClick="javascript:top.location.href='importdata.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>';"><a class="a_nav" href="importdata.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>"><?php echo _IMPORTDBDATA_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='dumpdata.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>';"><a class="a_nav" href="dumpdata.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>"><?php echo _EXPORTTABLE_; ?></a></td></tr>
<tr><td align="center" class="td_nav" onClick="javascript:top.location.href='main.php?database=<?php echo urlencode($vars["database"]); ?>';"><a class="a_nav" href="main.php?database=<?php echo urlencode($vars["database"]); ?>"><?php echo _BACKTOMAINPAGE_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='managekeys.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>';"><a class="a_nav" href="managekeys.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>"><?php echo _KEYMANAGEMENT_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='help.php';"><a class="a_nav" href="help.php"><?php echo _HELPPAGE_; ?></a></td></tr>
<?php
	$q = @mysql_query("SHOW TABLES");
	if(@mysql_num_rows($q) > 1) {
?>
<tr><td>&nbsp;</td></tr>
<tr><td align="center"><form method="post" action="tabledetails.php"><input type="hidden" name="database" value=<?php echo tag($vars["database"]); ?>><select name="table" class="td_sm">
<?php
		while(list($vars["tablename"]) = @mysql_fetch_row($q)) {
			echo "<option";
			if($vars["tablename"] == $vars["table"]) { echo " SELECTED"; }
			echo ">", $vars["tablename"], "</option>";
		}
?>
</select><br><input type="submit" class="td_sm" value=<?php echo tag(_CHANGETABLE_); ?></form></td></tr>
<?php
	}
?>
</table>

</td><td align="center">
<table width="630">
<tr><th><?php echo _FIELDNAME_; ?></th><td align="center"><u><?php echo _FIELDTYPE_; ?></u></td><td colspan="3" width="150" align="center"><u><?php echo _COMMANDS_; ?></u></td></tr>
<?php

/* show all the field info and stuff */
for($tmp=0; $tmp<sizeof($fields); $tmp++) {
	echo "<tr><td class=\"td_sm\">", $fields[$tmp]["name"], "</td><td class=\"td_sm\" align=\"center\">", $fields[$tmp]["type"], "</td><td class=\"td_nav\" width=\"50\" align=\"center\"><a class=\"a_nav\" href=\"editfield.php?table=", urlencode($vars["table"]), "&database=", urlencode($vars["database"]), "&field=", urlencode($fields[$tmp]["name"]), "&fieldtype=", urlencode($fields[$tmp]["type"]), "\">", _EDITFIELD_, "</a></td><td class=\"td_nav\" width=\"50\" align=\"center\"><a href=\"deletefield.php?table=", urlencode($vars["table"]), "&database=", urlencode($vars["database"]), "&field=", urlencode($fields[$tmp]["name"]), "\" class=\"a_nav\" onClick='return confirm(", tag(_DELETEFIELDCONFIRM_), ");'>", _DELETEFIELD_, "</a></td><td class=\"td_nav\" width=\"50\" align=\"center\"><a class=\"a_nav\" href=\"renamefield.php?table=", urlencode($vars["table"]), "&field=", urlencode($fields[$tmp]["name"]), "&fieldtype=", urlencode($fields[$tmp]["type"]), "&database=", urlencode($vars["database"]), "\">", _RENAMEFIELD_, "</a></td></tr>\n";
}

/* close the database */
@mysql_close();

?>
</table>
</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" align="center">
<form action="submitsql.php" method="post">
<?php echo _EXECUTESQL_; ?>: <input type="text" name="sqlcmd" size="50">
<input type="hidden" name="database" value=<?php echo tag($vars["database"]); ?>>
<input type="submit" value=<?php echo tag(_OK_); ?>>
</form>
</td></tr>
</table>
</body>
</html>
