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

/* sort out the POST, GET etc */
global $vars;

if(!isset($_SERVER)) { $_SERVER = $HTTP_SERVER_VARS; }
if(!isset($_POST)) { $_POST = $HTTP_POST_VARS; }
if(!isset($_GET)) { $_GET = $HTTP_GET_VARS; }
if(!isset($_COOKIE)) { $_COOKIE = $HTTP_COOKIE_VARS; }
if(!isset($_FILES)) { $_FILES = $HTTP_POST_FILES; }
if(!isset($_ENV)) { $_ENV = $HTTP_ENV_VARS; }
if(!isset($_SESSION)) { $_SESSION = $HTTP_SESSION_VARS; }

while(list($key, $var) = each($_GET)) { $vars[$key] = $var; }
while(list($key, $var) = each($_POST)) { $vars[$key] = $var; }

/* include the language files incase we want them */
require "lang.php";

/* only connect to the database server, *dont* select a database to use */
function dbconnect_only()
{
	/* our cookies for username, password etc */
        //global $mmcd_username, $mmcd_password, $mmcd_hostname;
	global $db_username, $db_password, $db_hostname;
	global $use_login;

	if($use_login == true) {
		/* connect to the database */
//		$db = @mysql_connect($mmcd_hostname, $mmcd_username, $mmcd_password);
		$db = @mysql_connect($_COOKIE["mmcd_hostname"], $_COOKIE["mmcd_username"], $_COOKIE["mmcd_password"]);
	} else {
		$db = @mysql_connect($db_hostname, $db_username, $db_password);
	}
	
	/* check to make sure the db connection went through OK */
	if($db == false) { return false; }

	/* return the database handler */
	return $db;
}

/* connect to the database server and select the database we want to use */
function dbconnect($database)
{
	/* cookies etc for username, password and hostname */
	//global $mmcd_username, $mmcd_password, $mmcd_hostname;
	global $db_username, $db_password, $db_hostname;
	global $use_login;

	/* connect to the database server */
	if($use_login == true) {
//		$db = @mysql_connect($mmcd_hostname, $mmcd_username, $mmcd_password);
		$db = @mysql_connect($_COOKIE["mmcd_hostname"], $_COOKIE["mmcd_username"], $_COOKIE["mmcd_password"]);
	} else {
		$db = @mysql_connect($db_hostname, $db_username, $db_password);
	}

	/* check to make sure the db connection went through OK */
	if($db == false) { return false; }
	
	$res = @mysql_select_db($database, $db);
	
	/* if it fails selecting the database name then bum out */
	if($res == false){ return false; }

	/* return the database handler */
	return $db;
}

// tag()
// does a simple str_replace in order to fit in html tag's properly
// tag('123"<>') would return "123&quot;&lt;&gt;"
function tag($string, $encase = 1)
{
	/* if encase was not set either way make it 1 */
	if(!isset($encase)) { $encase = 1; }

	/* if we're to encase the output then do, otherwise don't */
	$string = str_replace('"', '&quot;', str_replace("<", "&lt;", str_replace(">", "&gt;", str_replace('&', '&amp;', $string))));
	if($encase) {
		return "\"".$string."\"";
	} else {
		return $string;
	}
}

// sql()
// similar to the above, just does some simple swaps
function sql($string, $encase = 1)
{
	/* if encase was not set either way make it 1 */
	if(!isset($encase)) { $encase = 1; }

	/* step through the string and make sure all the " are escaped, ditto for \ */
	$retstr = "";

	for($l=0; $l<strlen($string); ++$l) {
		$char = substr($string, $l, 1);

		// if the character is a " then check whether to escape it
		if($char == "\\") {
			$retstr .= "\\\\";
		} else if($char == "\"") {
			$retstr .= "\\\"";
		} else {
			$retstr .= $char;
		}
	}

	/* if we're to encase the output then do, otherwise don't */
	if($encase){
		return "\"".$retstr."\"";
	} else {
		return $retstr;
	}
}

// unget()
// converts \\ into \ and \' into ', oh \" to " too :P
function unget(&$string)
{
	$string = str_replace("\\\\", "\\", str_replace("\\'", "'", str_replace('\"', '"', $string)));
}

// my_in_array()
// checks whether a string/number already exists within an array
function my_in_array($string, $array)
{
	for($l=0; $l<sizeof($array); $l++){
		if($array[$l] == $string) { return 1; }
	}
	
	return 0;
}

// char_count()
// counts the number of occurences of $ch in $str
function char_count($str, $ch)
{	
	$count = 0;
	for($l=0; $l<strlen($ch); $l++){ if(substr($str, $l, 1) == $ch) { $count++; } }
	return $count;
}

function char_pos($str, $ch)
{
	for($l=0; $l<strlen($str); $l++){
		if(substr($str, $l, 1) == $ch) {
			return $l;
		}
	}

	return -1;
}

// is_null()
if(!function_exists("is_null")) {
function is_null($str)
{
	return ($str === NULL);
}
}

?>
