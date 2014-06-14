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

/* include the db routines */
require "db_routines.php";
require "lang.php";

/* blah blah */
unget($vars["database"]);
unget($vars["table"]);

/* make a db connection */
$db = dbconnect($vars["database"]);

/* check it went OK */
if($db == false){
	Header("Location: nologin.php");
	exit();
}

/* drop the table */
if(!@mysql_query("DROP TABLE ".sql($vars["table"], 0))){
	Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(@mysql_errno()." : ".@mysql_error()." : "._DROPTABLEERROR_));
	exit();
}

/* close the db connection */
@mysql_close();

/* redirect back to the main page */
Header("Location: main.php?database=".urlencode($vars["database"])."&msg=".urlencode(_DROPTABLEGOOD_));

?>
