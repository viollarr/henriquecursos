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

/* unget the vars */
unget($vars["table"]);
unget($vars["database"]);

/* connect to the database server */
$db = dbconnect($vars["database"]);

/* make sure that the database connection went through OK and then optimize the table */
if($db != -1) {
	if(!@mysql_query("OPTIMIZE TABLE ".sql($vars["table"],0))){
		Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=", urlencode(@mysql_errno(), " : ", @mysql_error(), " : ", _ERROROPTIMIZE_, " : 'OPTIMIZE TABLE ",sql($vars["table"],0)));
		exit();
	}
}

/* close the connection */
@mysql_close();

/* go back to the referer */
Header("Location: main.php?database=".urlencode($vars["database"])."&msg=".urlencode(_SUCCESSOPTIMIZE_));

?>
