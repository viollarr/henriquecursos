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

/* include the database stuff */
require "db_routines.php";
require "lang.php";

/* un get some vars */
unget($vars["database"]);
unget($vars["newtable"]);

/* connect to the database */
$db = dbconnect($vars["database"]);

/* check to make sure the db connection is opened properly */
if($db == false){
	Header("Location: nologin.php");
	exit();
}

/* create the new table, a table must have at least one column *so* we create a column, type "int", called "delete_me"  */
if(!@mysql_query("CREATE TABLE ".sql($vars["newtable"], 0)." (delete_me int)")){
	Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(@mysql_errno()." : ".@mysql_error()." : "._CREATETABLEERROR_));
	exit();
}

/* close the db connection */
@mysql_close();

/* redirect back to the referer */
Header("Location: main.php?database=".urlencode($vars["database"])."&msg=".urlencode(_CREATETABLEGOOD_));

?>
