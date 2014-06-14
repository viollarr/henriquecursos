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

/* unget some stuff */
unget($vars["database"]);
unget($vars["table"]);

/* connect to the database */
$db = dbconnect($vars["database"]);

/* check to make sure it connected */
if($db == false){
	Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(_ERRORDBCONNECT_." - ".@mysql_error." : ".@mysql_errno()));
	exit();
}

//if($pri) { $creatinfo[] = "PRIMARY KEY (".$pri.")"; }
$qkey = @mysql_query("SHOW INDEX FROM ".$vars["table"]);

/* retrieve the key info if it exists and use it */
$knames = array();
if($rkey = @mysql_fetch_array($qkey)){
	do {
		/* add the key info to the arrays */
		$keys[$rkey["Key_name"]]["nonunique"] = $rkey["Non_unique"];
		if(!$rkey["Sub_part"]){
			$keys[$rkey["Key_name"]]["order"][$rkey["Seq_in_index"]-1] = $rkey["Column_name"];
		} else {
			$keys[$rkey["Key_name"]]["order"][$rkey["Seq_in_index"]-1] = $rkey["Column_name"]."(".$rkey["Sub_part"].")";
		}

		if(!my_in_array($rkey["Key_name"], $knames)) { $knames[] = $rkey["Key_name"]; }
	} while($rkey = @mysql_fetch_array($qkey));
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>MPanel: <?php echo _KEYMANAGEMENT_; ?></title>
<link rel="stylesheet" href="style.css"><script language="javascript" src="function.js"></script>
</head>
<body>
<table width="780" class="tmain">
<tr><td colspan="2" align="center"><a href="http://www.mattsscripts.co.uk/mpanel.htm"><img src="logo.gif" width="241" height="79" alt="Matt's MySQL Panel"></a></td></tr>
<tr><td colspan="2" align="center"><h4><?php echo _CURDATABASE_; ?> : '<?php echo $vars["database"]; ?>'</h4></td></tr>
<tr><td colspan="2" align="center"><h4><?php echo _CURTABLE_; ?> : '<?php echo $vars["table"]; ?>'</h4></td></tr>
<tr><td valign="top">
<table width="150" cellspacing="2">
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='addkey.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>';"><a class="a_nav" href="addkey.php?database=<?php echo urlencode($vars["database"]); ?>&table=<?php echo urlencode($vars["table"]); ?>"><?php echo _ADDKEYTOTABLE_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='main.php?database=<?php echo urlencode($vars["database"]); ?>';"><a class="a_nav" href="main.php?database=<?php echo urlencode($vars["database"]); ?>"><?php echo _BACKTOMAINPAGE_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:my_back();"><a class="a_nav" href="javascript:my_back();"><?php echo _BACK_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='help';"><a class="a_nav" href="help.php"><?php echo _HELPPAGE_; ?></a></td></tr>
</table>
</td><td align="center">
<table width="630">
<tr><th><?php echo _KEYNAME_; ?></th><th align="center"><?php echo _KEYTYPE_; ?></th><th align="center"><?php echo _FIELDS_; ?></th><th align="center"><?php echo _COMMANDS_; ?></th></tr>
<?php

/* show all the field info and stuff */
for($tmp=0; $tmp<sizeof($knames); $tmp++){
	echo "<tr><td class=\"td_sm\">", $knames[$tmp], "</td><td align=\"center\" class=\"td_sm\">";
	if($knames[$tmp] == "PRIMARY"){
		echo _PRIMARYKEY_;
	} else {
		if($keys[$knames[$tmp]]["nonunique"] == "0"){
			echo _UNIQUEKEY_;
		} else {
			echo _NORMALKEY_;
		}
	}
	echo "</td><td class=\"td_sm\" align=\"center\">", implode(",",$keys[$knames[$tmp]]["order"]), "</td><td class=\"td_nav\" width=\"50\" align=\"center\"><a class=\"a_nav\" href=\"deletekey.php?table=", urlencode($vars["table"]), "&database=", urlencode($vars["database"]), "&keyname=", urlencode($knames[$tmp]), "\" onClick='return confirm(", tag(_DELETEKEYCONFIRM_), ");'>", _DELETEKEY_, "</a></td></tr>";
}

/* close the database */
@mysql_close();

?>
</table>
</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" align="center">
<form action="submitsql.php" method="post">
<?php echo _EXECUTESQL_; ?>:<input type="text" name="sqlcmd" size="50">
<input type="hidden" name="database" value=<?php echo tag($vars["database"]); ?>>
<input type="submit" value=<?php echo _OK_; ?> border="0">
</form>
</td></tr>
</table>
</body>
</html>
