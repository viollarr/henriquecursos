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

/* add the various (yet not existant as of 06/03/2001, nearly though ;) language stuff */
require "lang.php";

/* include db stuff and language stuff */
require "db_routines.php";

/* un get some */
unget($vars["database"]);
unget($vars["table"]);
unget($vars["name"]);
unget($vars["ftype"]);
unget($vars["fsize"]);

/* connect to the database */
$db = dbconnect($vars["database"]);
if($db == false){
	Header('Location: nologin.php');
	exit();
}

/* query db */
$q = 'ALTER TABLE '.$vars["table"].' ADD '.$vars["name"].' '.$vars["ftype"];
if($vars["fsize"]) { $q .= ' ('.$vars["fsize"].')'; }
if($vars["isunsigned"]) { $q .= ' UNSIGNED'; }
if($vars["isauto_increment"]) { $q .= ' AUTO_INCREMENT'; }
if($vars["isbinary"]) { $q .= ' BINARY'; }
if($vars["isnot_null"]) { $q .= ' NOT NULL'; }
if($vars["isunique"]) { $q .= ' UNIQUE'; }
if($vars["iszerofill"]) { $q .= ' ZEROFILL'; }
if($vars["isdefault"]) { $q .= ' DEFAULT '.sql($vars["isdefault"]); }
if($vars["isprimary_key"]) { $q .= ' PRIMARY KEY';
	//$q .= ', ADD PRIMARY KEY ('.$name.')';
}

if($vars["putafter"] != "") { $q .= " AFTER ".$vars["putafter"]; }

/* check to see whether the query went OK */
if(!@mysql_query($q)){
	@Header('Location: error.php?database='.urlencode($vars["database"]).'&errmsg='.urlencode(@mysql_errno()." : ".@mysql_error()." : "._CREATETABLEERROR_));
	exit();
}

/* close db */
@mysql_close();

/* go back */
@Header('Location: tabledetails.php?database='.urlencode($vars["database"]).'&table='.urlencode($vars["table"]).'&msg='.urlencode(_CREATETABLEGOOD_));

?>
