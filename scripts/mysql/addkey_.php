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

/* include db stuff and language stuff */
require "lang.php";
require "db_routines.php";

/* un get some */
unget($vars["database"]);
unget($vars["table"]);
unget($vars["name"]);
unget($vars["ktype"]);
unget($vars["kfields"]);
unget($vars["referer"]);

/* connect to the database */
$db = dbconnect($vars["database"]);
if($db == false){
	Header('Location: nologin.php');
	exit();
}

/* query db */
$q = "ALTER TABLE ".$vars["table"]." ADD ".$vars["ktype"];
if($vars["ktype"] == "PRIMARY"){
	$q .= ' KEY';
} else {
	$q .= ' '.$vars["name"];
}
$q .= ' ('.$vars["kfields"].')';

/* check to see whether the query went OK */
if(!@mysql_query($q)){
	@Header('Location: error.php?database='.urlencode($vars["database"]).'&errmsg='.urlencode(@mysql_errno()." : ".@mysql_error()." : "._CREATEKEYERROR_));
	exit();
}

/* close db */
@mysql_close();

/* go back */
@Header('Location: tabledetails.php?database='.urlencode($vars["database"]).'&table='.urlencode($vars["table"])."&msg=".urlencode(_CREATEKEYGOOD_));

?>
