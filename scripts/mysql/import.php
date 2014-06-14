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
require "lang.php";

/* unget the vars - not needed due to POST */
unget($vars["database"]);
unget($vars["table"]);
unget($vars["csvcontainer"]);
unget($vars["csvseperator"]);
//unget($referer);
//unget($userfile);

/* connect to the database */
$db = dbconnect($vars["database"]);

/* error! */
if($db == false){
	Header("Location: nologin.php");
	exit();
}

// read the data file into an array
$data = file($_FILES["userfile"]["tmp_name"]);
	
// step through each line of the array and perform sql queries
$sql = "";
$gen = array();

// if this is an SQL import
if($vars["filetype"] == "sql") {
	for($l=0; $l<sizeof($data); $l++) {
		$num_sp = 0;
		$num_ap = 0;
		$escapenext = 0;
	
		// are we currently "in" a query?
		if($sql == "") {
			// no, we're not, let's start a new
			$data[$l] = ltrim($data[$l]);
	
			// is this either a blank line or a commented line?
			if(rtrim($data[$l]) == "" || substr($data[$l], 0, 1) == "#" || substr($data[$l], 0, 2) == "--") {
				// it certainly is! let's just ignore it
				continue;
			}
		}
	
		$sql .= $data[$l];
	
		// no, this isn't just a comment, let's get started
		for($lc=0; $lc<strlen($sql); $lc++) {
			if($escapenext == 1) {
				$escapenext = 0;
			} else {
				$char = substr($sql, $lc, 1);
	
				// is this a speech mark?
				if($char == "\"") {
					// are we "in" a speech mark quote?
					if($num_sp%2) {
						// yup, so let's see whether or not this is escaped
						$num_sp++;
						// yea, it is escaped (unless above done), so ignore it
					} else {
						// no need to check escaping
						if(!($num_ap%2)) {
							// we're not inside an apostrophe quote either, so we can increment safely
							$num_sp++;
						}
					}
				} else if($char == "'") {
					// or an apostrophe?
					if($num_ap%2) {
						// yup, so let's see whether or not this is escaped
						$num_ap++;
		
						// yea, it is escaped (unless above done), so ignore it
					} else {
						// no need to check escaping
						if(!($num_sp%2)) {
							// we're not inside an apostrophe quote either, so we can increment safely
							$num_ap++;
						}
					}
				} else if($char == "\\") {
					$escapenext = 1;
				} else if($char == "#" || $char == ";") {
					// starting a comment or is this a semi-colon? are we inside a quote?
					if(!($num_sp%2) && !($num_ap%2)) {
						// we're not inside a quote, most likely this is a comment or end of line so let's cut the rest of the line off
						$gen[] = substr($sql, 0, $lc);
						$sql = "";
					}
				}
			}
		}
	}

	$gen[] = $sql;
} else {
	// otherwise we're importing a CSV file

	$l = 0;

	// is the first line a header line? (sometimes it happens!)
	if($csvhasheader == "1") { $l = 1; }

	// ok, each line should contain a tuple, so let's get going
	for($l; $l<sizeof($data); ++$l) {
		$fields = array();
		$enclosed = 0;
		$infield = 0;
		$f_start = 0;

		$data[$l] = trim($data[$l]);
		if(strlen($data[$l]) == 0) {
			continue;
		}
		for($c=0; $c<strlen($data[$l]); ++$c) {
			$char = substr($data[$l], $c, 1);
			if($char == "\\") {
				$c++;
				continue;
			}
			if($infield == 0) {
				if($char == $vars["csvseperator"] || $char == " ") { continue; }
				$infield = 1;
				$f_start = $c;
				if($char == $vars["csvcontainer"]) {
					$enclosed = 1;
				}
			} else {
				if($char == $vars["csvcontainer"] && $enclosed == 1) {
					$fields[] = substr($data[$l], $f_start, $c-$f_start+1);
					$infield = 0;
					$enclosed = 0;
					$c++;
				} else if($char == $vars["csvseperator"] && $enclosed = 0) {
					$fields[] = sql(substr($data[$l], $f_start, $c-$f_start+1));
					$infield = 0;
					$enclosed = 0;
					$c++;
				}
			}
		}
		$gen[] = "INSERT INTO ".$vars["table"]." VALUES (".implode(",", $fields).")";
	}
}

for($l=0; $l<sizeof($gen); $l++){
	$sql = trim($gen[$l]);
	if($sql != "") {
		if(!@mysql_query($sql)) {
			Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(@mysql_error()." : ".@mysql_errno()."<BR>\"".$sql."\""));
			exit;
		}
	}
}

/* did a problem occur? */
Header("Location: main.php?database=".urlencode($vars["database"])."&msg=".urlencode(_IMPORTSUCCESS_." : ".sizeof($gen)));

?>
