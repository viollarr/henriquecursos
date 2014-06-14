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
unget($vars["user"]);

/* connect to the db */
$db = dbconnect_only();

/* check to make sure the connection went through OK */
if($db == false){
	Header('Location: nologin.php');
	exit();
}

/* grab the user name and the hostname */
if(!isset($vars["user"])) {
	Header("Location: dbmanager.php?errmsg=".urlencode(_REVOKEUSERCHOOSE_));
	exit();
}

/* otherwise proceed */
list($username, $hostname, $database) = explode("@", $vars["user"], 3);

@mysql_select_db("mysql");

if(!@mysql_query("DELETE FROM db WHERE User=".sql($username)." AND Host=".sql($hostname)." AND Db=".sql($database))) {
	Header("Location: dbmanager.php?errmsg=".urlencode(_REVOKEUSERBAD_));
	exit();
}

/* close the db */
@mysql_close();

/* redirect back to the referer page */
Header('Location: dbmanager.php?msg='.urlencode(_REVOKEUSERGOOD_));

?>
