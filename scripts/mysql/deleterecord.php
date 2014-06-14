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

/* include database connectivity stuff... */
require "db_routines.php";
require "lang.php";

/* un get */
unget($vars["database"]);
unget($vars["table"]);
unget($vars["query"]);

/* connect to the database */
$db = dbconnect($vars["database"]);

/* submit the query */
if(!@mysql_query("DELETE FROM ".sql($vars["table"], 0)." WHERE ".$vars["query"], $db)){
	Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(@mysql_errno()." : ".@mysql_error()." : "._DELETERECORDERROR_));
	exit();
}

/* close the db connection */
@mysql_close($db);

/* redirect back to the referer */
Header("Location: tabledetails.php?database=".urlencode($vars["database"])."&table=".urlencode($vars["table"])."&msg=".urlencode(_DELETERECORDGOOD_));

?>
