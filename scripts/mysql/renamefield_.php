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

/* include the functions for database n stuff */
require "db_routines.php";
require "lang.php";

/* un GET some stuff */
unget($vars["database"]);
unget($vars["oldfield"]);
unget($vars["newfield"]);
unget($vars["table"]);
unget($vars["fieldtype"]);

/* connect to the database using cookies $mmcd_username and $mmcd_password */
$db = dbconnect($vars["database"]);

/* check the connection went Ok */
if($db == false){
	Header("Location: nologin.php");
	exit();
}

/* perform the table renaming */
if(!mysql_query("ALTER TABLE ".sql($vars["table"], 0)." CHANGE ".sql($vars["oldfield"],0)." ".sql($vars["newfield"],0)." ".sql($vars["fieldtype"], 0))){
	Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(@mysql_errno()." : ".@mysql_error()." : "._ERRORRENAMEFIELD_." : 'ALTER TABLE ".sql($vars["table"],0)." CHANGE ".sql($vars["oldfield"],0)." ".sql($vars["newfield"],0)." ".sql($vars["fieldtype"],0)));
	exit();
}

/* close the DB connection */
mysql_close();

/* redirect to the main page */
Header("Location: tabledetails.php?database=".urlencode($vars["database"])."&table=".urlencode($vars["table"])."&msg=".urlencode(_SUCCESSRENAMEFIELD_." : '".$vars["oldfield"]."' -> '".$vars["newfield"]."'"));

?>
