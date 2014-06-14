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

/* un GET !!! */
unget($vars["database"]);
unget($vars["table"]);
unget($vars["modify_query"]);

/* connect to the database */
$db = dbconnect($vars["database"]);

/* check the connection is OK */
if($db == false){
	Header("Location: nologin.php");
	exit();
}

/* store all the fields and their types in an array (for ease of reference) */
if(!($fi = @mysql_query("DESC ".$vars["table"]))){
	Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(@mysql_errno()." : ".@mysql_error()." : Error attempting to get table info for '".$vars["table"]."', query was 'DESC ".$vars["table"]."'"));
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

/* begin the construction of a query for updating the record */
$query = 'UPDATE '.sql($vars["table"], 0).' SET ';
$holders = array();
for($tmp=0; $tmp<$vars["numfields"]; $tmp++){
	unget($vars["rec_$tmp"]);
	unget($vars["intype_$tmp"]);

	if($vars["intype_$tmp"] == "NULL") {
		$holders[] = $fields[$tmp]["name"]."=NULL";
	} else if($vars["intype_$tmp"] == "FUNC") {
		$holders[] = $fields[$tmp]["name"]."=".$vars["rec_$tmp"];
	} else {
		$holders[] = $fields[$tmp]["name"]."=".sql($vars["rec_$tmp"]);
	}
}

if($vars["numfields"] > 1) {
	$query .= implode(",", $holders);
} else {
	$query .= $holders;
}

$query .= " WHERE ".$vars["modify_query"];

/* perform the query */
if(!@mysql_query($query)){
	Header("Location: error.php?errmsg=".urlencode(@mysql_errno()." : ".@mysql_error()." : "._ERRORMOD_." : '".$query."'"));
	exit();
}

/* go back */
Header("Location: tabledetails.php?database=".urlencode($vars["database"])."&table=".urlencode($vars["table"])."&msg=".urlencode(_SUCCESSMOD_));

?>
