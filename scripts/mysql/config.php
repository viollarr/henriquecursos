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

// $use_language = [string]
// - specifis the language file to use for executing the script (see the lang/
//   directory)
$use_language = "english";
//$use_language = "castellano";
//$use_language = "br_portuguese";
//$use_language = "polish";

// $use_login = [bool]
// - whether or not to show the user login page, if set to false the username
//   and password to connect to the database with must be specified below
$use_login = true;

// $db_username = [string]
// $db_password = [string]
// $db_hostname = [string]
// - the username, password and hostname (respectively) to connect to the
//   database server when $use_login is false. The user will automatically
//   be presented with the "choose database" screen. $db_hostname will
//   usually be set to "localhost" although other values are allowed.
// - this is most useful when using a .htaccess and .htpasswd file to protect
//   the directory (especially across a secure connection such as SSL) as the
//   user will not have plain text cookie files on his computer.
$db_username = "matt";
$db_password = "password";
$db_hostname = "localhost";

?>
