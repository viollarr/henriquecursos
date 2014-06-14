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

/* include the database connectivity stuff and language configuration */
require "db_routines.php";
require "lang.php";

unget($vars["msg"]);

/* connect to the database server */
$db = dbconnect_only();

/* manage any errors */
if($db == false){
	Header("Location: error.php?errmsg=".urlencode(@mysql_errno()." : ".@mysql_error()." : "._ERRORDBCONNECT_));
	exit();
}

/* attempt to get a list of databases */
if(($t = @mysql_list_dbs($db)) == false){
	Header("Location: error.php?errmsg=".urlencode(@mysql_errno()." : ".@mysql_error()." : "._ERRORDBLIST_));
	exit();
}

$alloweddbs = array();
$disalloweddbs = array();

$dbtables = array();

/* show a list of all the database with links attached */
for($tmp=0; $tmp<mysql_num_rows($t); $tmp++){
	$db = mysql_tablename($t, $tmp);
	$tables = array();
	if(mysql_select_db($db) != false) {
		$q = @mysql_query("SHOW TABLES");
		while(list($tablename) = @mysql_fetch_row($q)) { $tables[] = $tablename; }
		$alloweddbs[] = $db;
		$alloweddbs[$db] = $tables;
	} else {
		$disalloweddbs[] = $db;
	}
}

/* test to see whether or not the user is limited to only one database */
if(sizeof($alloweddbs) == 1 && $vars["msg"] == "login") {
	Header("Location: main.php?database=".urlencode($alloweddbs[0]));
	exit();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>MPanel: <?php echo _DBMANAGER_; ?></title>
<link rel="stylesheet" href="style.css"><script language="javascript" src="function.js"></script>
</head>
<body>
	<table width="780" class="tmain">
	<tr>
		<td colspan="2" align="center"><a href="http://www.mattsscripts.co.uk/mpanel.htm"><img src="logo.gif" width="241" height="79" alt="Matt's MySQL Panel"></a></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><h4><?php echo _DBMANAGER_; ?></h4></td>
	</tr>
	<tr>
		<td valign="top">
		<table width="150" cellspacing="2">
		<tr>
			<td align="center" class="td_nav" onClick="javascript:top.location.href='help.php';"><a class="a_nav" href="help.php"><?php echo _HELPPAGE_; ?></a></td>
		</tr>
		<tr>
			<td align="center" class="td_nav" onClick="javascript:my_back();"><a class="a_nav" href="javascript:my_back();"><?php echo _BACK_; ?></a></td>
		</tr>
<?php
// no point in showing the "Logout" button if we aren't logged in!
if($use_login == true) {
?>
		<tr>
			<td align="center" class="td_nav"><a class="a_nav" href="logout.php" onClick='return confirm(<?php echo tag(_LOGOUTCONFIRM_); ?>);'><?php echo _LOGOUT_; ?></a></td>
		</tr>
<?php
}

?>
		</table>
		</td>
		<td align="center">
		<table width="630">
<?php
if($vars["msg"] != "" && $vars["msg"] != "login") {
?>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="center"><?php echo $vars["msg"]; ?></td>
		</tr>
<?php
}
?>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="center"><?php echo _WELCOMEDB_; ?></td>
		</tr>
<?php
if(sizeof($alloweddbs)) {
?>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="center"><?php echo _ALLOWEDDBS_; ?>;</td>
		</tr>
<?php
	$dbname = "";
	foreach($alloweddbs as $db) {
		if(!is_array($db)) {
			$dbname = $db;
			echo	"<tr><td>&nbsp;</td></tr>\n<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"main.php?database=", urlencode($db), "\">", $db, "</a></td></tr>\n";
		} else {
			foreach($db as $table) {
				echo	"<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;<a class=\"td_sm\" href=\"tabledetails.php?database=", urlencode($dbname), "&table=", urlencode($table), "\">", $table, "</a></td></tr>\n";
			}
		}
	}
}

if(sizeof($disalloweddbs)) {
?>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="center"><?php echo _DISALLOWEDDBS_; ?>;</td>
		</tr>
<?php
	foreach($disalloweddbs as $db) {
		echo	"<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;", $db, "</td></tr>\n";
	}
}
?>
		</table>
<?php

// do we have access to grant user access? and creating databases? and the rest...
// actually this probably isn't right, this checks whether you have access to the "mysql" db
if(in_array("mysql", $alloweddbs)) {
	// probably
?>
		<BR><HR>
		<table align="left">
		<tr>
			<td><?php echo _DELETEDB_; ?></td>
			<td><form method="post" action="deletedb.php"><select name="deldbname"><option value="">-- Choose</option><?php
	foreach($alloweddbs as $db) {
		if(!is_array($db)) {
			echo "<option value=", tag($db), ">", $db, "</option>";
		}
	}
?></select></td>
			<td><input type="submit" value=<?php echo tag(_OK_); ?>></form></td>
		</tr>
		<tr>
			<td><?php echo _CREATEDB_; ?></td>
			<td><form method="post" action="createdb.php"><input type="text" name="newdbname" size="20"></td>
			<td><input type="submit" value=<?php echo tag(_OK_); ?>></form></td>
		</tr>
		<tr>
			<td><?php echo _DELUSER_; ?></td>
			<td><form method="post" action="deluser.php"><select name="user"><option value="">-- Choose</option><?php
	@mysql_select_db("mysql");
	$q = @mysql_query("SELECT User, Host FROM user");
	while(list($user, $host) = @mysql_fetch_array($q)) {
		echo "<option value=", tag($user."@".$host), ">User \"", $user, "\" @ host \"", $host, "\"</option>";
	}
?></select></td>
			<td><input type="submit" value=<?php echo tag(_OK_); ?>></form></td>
		</tr>
		<tr>
			<form method="post" action="revokeuser.php">
			<td><?php echo _REVOKEUSER_; ?></td>
			<td><select name="user"><option value="">-- Choose</option><?php
	$q = @mysql_query("SELECT Host, Db, User FROM db");
	while(list($host, $db, $user) = @mysql_fetch_array($q)) {
		echo "<option value=", tag($user."@".$host."@".$db), ">User \"", $user, "\" @ host \"", $host, "\" on \"", $db, "\"</option>";
	}
?></td>
			<td><input type="submit" value=<?php echo tag(_OK_); ?>></td>
			</form>
		</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><HR></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
		<table>
			<tr>
				<td>
				<form method="post" action="grantdb.php">
				<table width="100%">
					<tr>
						<td colspan="2"><?php echo _GRANTUSER_; ?></td>
					</tr>
					<tr>
						<td align="right"><?php echo _DBNAME_; ?></td>
						<td><select name="dbname"><option value="">-- Choose</option><option value="*">[ALL DATABASES]</option><?php
	foreach($alloweddbs as $db) {
		if(!is_array($db)) {
			echo "<option value=", tag($db), ">", $db, "</option>";
		}
	}
?></select></td>
					</tr>
					<tr>
						<td align="right"><?php echo _USERNAME_; ?></td>
						<td><input type="text" name="grantuser" size="20"></td>
					</tr>
					<tr>
						<td align="right"><?php echo _PASSWORD_; ?></td>
						<td><input type="text" name="grantpass" size="20"></td>
					</tr>
					<tr>
						<td align="right"><?php echo _DBHOST_; ?></td>
						<td><input type="text" name="granthost" size="20" value="localhost"></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" value=<?php echo tag(_OK_); ?>></td>
					</tr>
				</table>
				</td>
				<td>&nbsp;&nbsp;</td>
				<td>
				<!-- GRANT options -->
				<table>
					<tr>
						<td class="td_sm"><input type="checkbox" name="grant_alter" value="1"></td>
						<td class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">ALTER</a></td>
						<td class="td_sm"><input type="checkbox" name="grant_create" value="1"></td>
						<td class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">CREATE</a></td>
						<td class="td_sm"><input type="checkbox" name="grant_create_temporary_tables" value="1"></td>
						<td colspan="3" class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">CREATE TEMPORARY TABLES</a>*</td>
					</tr>
					<tr>
						<td class="td_sm"><input type="checkbox" name="grant_delete" value="1"></td>
						<td class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">DELETE</a></td>
						<td class="td_sm"><input type="checkbox" name="grant_drop" value="1"></td>
						<td class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">DROP</a></td>
						<td class="td_sm"><input type="checkbox" name="grant_execute" value="1"></td>
						<td class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">EXECUTE</a>*</td>
						<td class="td_sm"><input type="checkbox" name="grant_file" value="1"></td>
						<td class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">FILE</a></td>
					</tr>
					<tr>
						<td class="td_sm"><input type="checkbox" name="grant_index" value="1"></td>
						<td class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">INDEX</a></td>
						<td class="td_sm"><input type="checkbox" name="grant_insert" value="1"></td>
						<td class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">INSERT</a></td>
						<td class="td_sm"><input type="checkbox" name="grant_lock_tables" value="1"></td>
						<td class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">LOCK TABLES</a>*</td>
						<td class="td_sm"><input type="checkbox" name="grant_process" value="1"></td>
						<td class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">PROCESS</a></td>
					</tr>
					<tr>
						<td class="td_sm" align="right"><input type="checkbox" name="grant_replication_client" value="1"></td>
						<td class="td_sm" colspan="3"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">REPLICATION CLIENT</a>*</td>
						<td class="td_sm"><input type="checkbox" name="grant_replication_slave" value="1"></td>
						<td class="td_sm" colspan="3"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">REPLICATION SLAVE</a>*</td>
					</tr>
					<tr>
						<td class="td_sm"><input type="checkbox" name="grant_references" value="1"></td>
						<td class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">REFERENCES</a></td>
						<td class="td_sm"><input type="checkbox" name="grant_select" value="1"></td>
						<td class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">SELECT</a></td>
						<td class="td_sm"><input type="checkbox" name="grant_show_databases" value="1"></td>
						<td class="td_sm" colspan="3"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">SHOW DATABASES</a>*</td>
					</tr>
					<tr>
						<td class="td_sm"><input type="checkbox" name="grant_shutdown" value="1"></td>
						<td class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">SHUTDOWN</a></td>
						<td class="td_sm"><input type="checkbox" name="grant_super" value="1"></td>
						<td class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">SUPER</a>*</td>
						<td class="td_sm"><input type="checkbox" name="grant_update" value="1"></td>
						<td class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">UPDATE</a></td>
						<td class="td_sm"><input type="checkbox" name="grant_grant" value="1"></td>
						<td class="td_sm"><a class="td_sm" href="http://www.mysql.com/doc/en/GRANT.html" target="blank">GRANT OPTION</a></td>
					</tr>
					<tr>
						<td align="center" colspan="8" class="td_sm">* - Only available in MySQL version 4.0.2 and above</td>
					</tr>
				</table>
				</form>
				<!-- [END] GRANT options -->
				</td>
			</tr>
		</table>
<?php
}

?>
		</td>
	</tr>
</table>
</body>
</html>

<?php

/* close the mysql connection */
mysql_close();

?>
