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

/* include the various database connectivity stuff and language config */
require "db_routines.php";
require "lang.php";

/* un get some */
unget($vars["table"]);
unget($vars["field"]);
unget($vars["ftype"]);
unget($vars["database"]);

/* connect to the database */
$db = dbconnect($vars["database"]);
if($db == false){
	Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(_ERRORDBCONNECT_." - ".@mysql_error." : ".@mysql_errno()));
	exit();
}

/* query db */
$q = 'ALTER TABLE '.$vars["table"].' MODIFY '.$vars["field"].' '.$vars["ftype"];
unget($fsize);
if($fsize) { $q .= " (".$fsize.")"; }
if($isunsigned) { $q .= ' UNSIGNED'; }
if($isauto_increment) { $q .= ' AUTO_INCREMENT'; }
if($isbinary) { $q .= ' BINARY'; }
if($isnot_null) { $q .= ' NOT NULL'; }
if($isunique) { $q .= ' UNIQUE'; }
if($iszerofill) { $q .= ' ZEROFILL'; }
if($isdefault) { $q .= ' DEFAULT '.sql($isdefault); }
if($isprimary_key) { 
	$q .= ', ADD PRIMARY KEY ('.$name.')';
}

/* do the query */
if(@mysql_query($q) == false){
	Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(@mysql_errno().": ".@mysql_error()." : "._EDITFIELDERROR_));
	exit();
}

/* close the db connection */
@mysql_close();

/* go back to the main page */
Header("Location: tabledetails.php?database=".urlencode($vars["database"])."&table=".urlencode($vars["table"])."&msg=".urlencode(_EDITFIELDGOOD_));

?>
