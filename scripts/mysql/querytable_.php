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

/* include the db connection stuff */
require "db_routines.php";
require "lang.php";

/* connect to the database */
$db = dbconnect($vars["database"]);

/* un GET stuff */
unget($vars["database"]);
unget($vars["table"]);

/* make sure the connection worked ok */
if($db == false){
	Header("Location: nologin.php");
	exit();
}

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
	$fields[$t]["key"] = $tmp[3];
	$t++;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>MPanel: <?php echo _SEARCHRESULTS_; ?></title>
<link rel="stylesheet" href="style.css"><script language="javascript" src="function.js"></script>
</head>
<body>
<table width="780" class="tmain">
<tr><td colspan="2" align="center"><a href="http://www.mattsscripts.co.uk/mpanel.htm"><img src="logo.gif" width="241" height="79" alt="Matt's MySQL Panel"></a></td></tr>
<tr><td colspan="2" align="center"><h4><?php echo _CURDATABASE_; ?> : '<?php echo $vars["database"]; ?>'</h4></td></tr>
<tr><td colspan="2" align="center"><h4><?php echo _CURTABLE_; ?> : '<?php echo $vars["table"]; ?>'</h4></td></tr>
<tr><td colspan="2" align="center"><h4><?php echo _FOUNDRECORDS_; ?></h4></td></tr>
<tr><td valign="top">
<table width="150">
<tr><td align="left" valign="top">
<table cellspacing="2" width="150">
<tr><td class="td_nav" onClick="javascript:top.location.href='main.php?database=<?php echo urlencode($vars["database"]); ?>';"><a class="a_nav" href="main.php?database=<?php echo urlencode($vars["database"]); ?>"><?php echo _BACKTOMAINPAGE_; ?></a></td></tr>
<tr><td class="td_nav" onClick="javascript:my_back();"><a class="a_nav" href="javascript:my_back();"><?php echo _BACK_; ?></a></td></tr>
</table>
</td><td align="center">
<?php

// make sure we have a query to use
if(!isset($vars["q"])) {
	/* OK, this is to make the following bit easier, as long as we're using AND as the seperation operator this won't matter and makes my life easier */
	$vars["q"] = "1=1";

	/* perform a loop to create the query based off the input from the form */
	for($tmp=0; $tmp<$vars["numfields"]; $tmp++){
		unget($vars["rec_$tmp"]);
		unget($vars["intype_$tmp"]);

		/* use this field? */
		echo "\n<!-- \$tmp = ", $tmp, " ; inuse_", $tmp, " = \"", $vars["inuse_".$tmp], "\" -->";
		if($vars["inuse_".$tmp] == 1) {
			/* start the ball rowling */
			$vars["q"].= ' AND '.$fields[$tmp]["name"].' ';

			/* if the input type (REGEXP, NULL, PLAIN etc) is not Plain and *not* NULL do this bit */
			if($vars["intype_$tmp"] == "FUNC") {
				if($vars["recop_$tmp"] != "=") { $vars["q"].= " NOT "; }
			
				/* if it is a function then it wants to be by itself */
				if($vars["intype_$tmp"] == "FUNC") {
					$vars["q"].= $vars["recop_$tmp"].$vars["rec_$tmp"];
				} else {
					/* if it is not a function then it is one of the built in functions, ie REGEXP, LIKE etc and wants to be in the form TYPE(REC) ie REGEXP('^m') */
					$vars["q"].= $vars["intype_$tmp"]."(".sql($vars["rec_$tmp"]).")";
				}
			} else if($vars["intype_$tmp"] == "NULL") {
				$vars["q"].= " IS ";
				if($vars["recop_$tmp"] != "=") { $vars["q"].= "NOT "; }
				$vars["q"].= "NULL";
			} else {
				/* this should mean that the input type is either NULL or PLAIN, ie foo='bar' */
				echo "\n<!-- ELSE! -->";
				if($vars["recop_$tmp"] == "REGEXP" || $vars["recop_$tmp"] == "LIKE") {
					$vars["q"].= $vars["recop_$tmp"]." (".sql($vars["rec_$tmp"]).")";
				} else {
					$vars["q"].= $vars["recop_$tmp"].sql($vars["rec_$tmp"]);
				}
			}
		}
	}
}

/* query the table using the query we just constructed */
if(!isset($vars["rpp"])) { $vars["rpp"] = 25; }
if(!isset($vars["pn"])) {
	$vars["pn"] = 0;
} else {
	$vars["pn"]--;
}

$found2 = @mysql_query("SELECT * FROM ".sql($vars["table"], 0)." WHERE ".$vars["q"]." LIMIT ".($vars["pn"]*$vars["rpp"]).", ".($vars["rpp"]+1));
$numtuples = @mysql_num_rows($found2);

/* are there any results? if so, store em all in $rows */
$numfound = 0;
$numfields = sizeof($fields);
$rows = array();
while($found = @mysql_fetch_row($found2)) {
	$rows[] = $found;
}

/* decide which field to use for unique modification/deletion */
$altquery = array();
for($tmp=0; $tmp<$numfields; ++$tmp) {
	if(@eregi("PRI", $fields[$tmp]["key"]) || @eregi("UNI", $fields[$tmp]["key"])){
		$altquery[] = $tmp;
	}
}

/* show a warning if a PRIMARY or UNIQUE key doesn't exist */
if(!sizeof($altquery)) {
	echo	"<div align=\"center\"><u>", _NOTE_, "</u> : ", _NOPRIMARYKEY_, "</div>";
	for($l=0; $l<sizeof($fields); ++$l) {
		$altquery[] = $l;
	}
}

/* right, we should be good to go now :) */
if($numtuples) {
	$numtoshow = ($numtuples > $vars["rpp"] ? $vars["rpp"] : $numtuples);

	if($vars["do_matrix"] == 1) {
		echo	"<table border=\"1\" width=\"630\">",
			"<tr><td>&nbsp;</td>";
		for($tmp=0; $tmp<$numfields; ++$tmp) {	echo "<td class=\"td_sm\">", $fields[$tmp]["name"], "</td>";	}
		echo	"</tr>";

		for($l=0; $l<$numtoshow; ++$l) {
			$alt = "";

			/* attempt to create a long query for non-PRIMARY/UNIQUE */
			$alts = array();

			for($t=0; $t<sizeof($altquery); ++$t) {
				if(@is_null($rows[$l][$altquery[$t]])) {
					$alts[] = $fields[$altquery[$t]]["name"]." IS NULL";
				} else {
					$alts[] = $fields[$altquery[$t]]["name"]."=".sql($rows[$l][$altquery[$t]]);
				}
			}

			$alt = implode($alts, " AND ");

			echo	"<tr>",
				"<td class=\"td_sm\" align=\"center\"><a href=\"modifyrecord.php?database=", urlencode($vars["database"]), "&table=", urlencode($vars["table"]), "&modify_query=", urlencode($alt), "\" class=\"a_nav\">", substr(_MODIFYRECORD_, 0, 1), "</a>&nbsp;/&nbsp;<a href=\"deleterecord.php?table=", urlencode($vars["table"]), "&database=", urlencode($vars["database"]), "&query=", urlencode($alt), "\" OnClick='return confirm(", tag(_DELETERECORDCONFIRM_), ");' class=\"a_nav\">", substr(_DELETERECORD_, 0, 1), "</a></td>";

			for($lb=0; $lb<$numfields; ++$lb) {
				echo	"<td class=\"td_sm\">";
				if(!strlen($rows[$l][$lb])) {
					echo	"&nbsp;";
				} else {
					echo	str_replace("<", "&lt;", str_replace(">", "&gt;", str_replace("&", "&amp;", $rows[$l][$lb])));
				}
				echo	"</td>";
			}
			echo	"</tr>";
		}

		echo	"</table>";
	} else {
		for($l=0; $l<$numtoshow; ++$l) {
			$alt = "";

			/* attempt to create a long query for non-PRIMARY/UNIQUE */
			$alts = array();

			for($t=0; $t<sizeof($altquery); ++$t) {
				if(is_null($rows[$l][$altquery[$t]])) {
					$alts[] = $fields[$altquery[$t]]["name"]." IS NULL";
				} else {
					$alts[] = $fields[$altquery[$t]]["name"]."=".sql($rows[$l][$altquery[$t]]);
				}
			}

			$alt = implode($alts, " AND ");

			echo	"<table class=\"tmain\" width=\"630\">",
				"<tr><th>", _FIELDNAME_, "</th><th align=\"center\" width=\"350\">", _VALUE_, "</th></tr>";

			for($lb=0; $lb<$numfields; ++$lb) {
				echo	"<tr><td class=\"td_sm\">", $fields[$lb]["name"], " (", $fields[$lb]["type"], ")</td><td>";

				if(!strlen($rows[$l][$lb])) {
					echo	"&nbsp;";
				} else {
					echo	str_replace("<", "&lt;", str_replace(">", "&gt;", str_replace("&", "&amp;", $rows[$l][$lb])));
				}

				echo	"</td></tr>";
			}

			echo	"<tr>",
				"<td colspan=\"2\">",
				"<table width=\"650\" cellspacing=\"2\">",
				"<tr>",
				"<td class=\"td_nav\" align=\"center\" width=\"300\"><a OnClick='return confirm(", tag(_DELETERECORDCONFIRM_), ");' class=\"a_nav\" href=\"deleterecord.php?table=", urlencode($vars["table"]), "&database=", urlencode($vars["database"]), "&query=", urlencode($alt), "\">", _DELETERECORD_, "</a></td>",
				"<td class=\"td_nav\" width=\"350\" align=\"center\"><a class=\"a_nav\" href=\"modifyrecord.php?database=", urlencode($vars["database"]), "&table=", urlencode($vars["table"]), "&modify_query=", urlencode($alt), "\">", _MODIFYRECORD_, "</a></td>",
				"</tr>",
				"</table>",
				"</td>",
				"</tr>",
				"</table>",
				"<br>";
		}
	}

?>
<!-- show page w/results -->
<br>
<div align="left">
<table>
<form method="post" action="querytable_.php">
<input type="hidden" name="database" value="<?php echo urlencode($vars["database"]); ?>">
<input type="hidden" name="table" value="<?php echo urlencode($vars["table"]); ?>">
<input type="hidden" name="q" value=<?php echo tag($vars["q"]); ?>>
<input type="hidden" name="do_matrix" value=<?php echo tag($vars["do_matrix"]); ?>>
<input type="hidden" name="max_size" value=<?php echo tag($vars["max_size"]); ?>>
<tr><td><?php echo _SHOWPAGE_; ?></td><td><input type="text" name="pn" size="10" value=<?php echo tag($vars["pn"]+1); ?>></td></tr>
<tr><td><?php echo _RESULTSPERPAGE_; ?></td><td><input type="text" name="rpp" size="10" value=<?php echo tag($vars["rpp"]); ?>></td></tr>
<tr><td><input type="submit" value=<?php echo tag(_OK_); ?>></td></tr>
</td></tr>
</form>
</table>
</div>
<br>
<!-- the next page/previous page bit -->
<table width="630">
<tr><td><?php
	if($pn > 0) {
		echo "<a href=\"querytable_.php?database=", urlencode($vars["database"]), "&table=", urlencode($vars["table"]), "&pn=", urlencode($vars["pn"]), "&q=", urlencode($vars["q"]), "&rpp=", urlencode($vars["rpp"]), "&do_matrix=", urlencode($vars["do_matrix"]), "&max_size=", urlencode($vars["max_size"]), "\">", _PREVIOUSPAGE_, "</a>";
	} else {
		echo _PREVIOUSPAGE_;
	}
?></td><td align="right"><?php
	if($numfound < $totalrows) {
		echo "<a href=\"querytable_.php?database=", urlencode($vars["database"]), "&table=", urlencode($vars["table"]), "&pn=", urlencode($vars["pn"]+2), "&q=", urlencode($vars["q"]), "&rpp=", urlencode($vars["rpp"]), "&do_matrix=", urlencode($vars["do_matrix"]), "&max_size=", urlencode($vars["max_size"]), "\">", _NEXTPAGE_, "</a>";
	} else {
		echo _NEXTPAGE_;
	}
?></td></tr>
</table>
<?php
} else {
/* do something to show that there were no entries found in the database */
	echo "<p align=\"center\" color=\"red\">", _SEARCHEMPTY_, "</p>";
}
?>
</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" align="center">
<form action="submitsql.php" METHOD="GET">
<?php echo _EXECUTESQL_; ?>: <input type="text" name="sqlcmd" size="50">
<input type="hidden" name="database" value=<?php echo tag($vars["database"]); ?>>
<input type="submit" value=<?php echo tag(_OK_); ?>>
</form>
</td></tr></table>
</body>
</html>
