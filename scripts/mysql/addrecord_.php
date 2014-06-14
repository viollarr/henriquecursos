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

/* include the db routine code */
require 'db_routines.php';
require "lang.php";

/* priority 1 : unget some ! */
unget($vars["database"]);
unget($vars["table"]);

/* connect to the db */
$db = dbconnect($vars["database"]);

/* check to make sure the connection went through OK */
if($db == false){
	Header('Location: nologin.php');
	exit();
}

/* begin construction of the INSERT query */
$q = "INSERT INTO ".sql($vars["table"],0)." VALUES (";

/* use this for a temporary "holder" array */
$holder = array();

/* loop through the parts of the form and store relevant parts in the holder array */
for($tmp=0; $tmp<$vars["numfields"]; $tmp++){
	unget($vars["rec_$tmp"]);
	unget($vars["intype_$tmp"]);

	if($vars["intype_$tmp"] == "FUNC") {
		// it's a function
		$holder[] = $vars["rec_$tmp"];
	} else if($vars["intype_$tmp"] == "NULL") {
		// null
		$holder[] = "NULL";
	} else {
		// plain and boring
		$holder[] = sql($vars["rec_$tmp"]);
	}
}

/* implode all elements from the holder array */
$q .= implode(",", $holder).")";

/* perform a query to insert the data into the db */
if(!@mysql_query($q)){
	Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(@mysql_errno()." : ".@mysql_error()." : "._ADDRECORDERROR_));
	exit();
}

/* close the db */
@mysql_close();

/* redirect back to the referer page */
Header('Location: tabledetails.php?database='.urlencode($vars["database"]).'&table='.urlencode($vars["table"])."&msg=".urlencode(_ADDRECORDGOOD_));

?>
