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
/* include the db connectivity stuff and language stuff */
require "db_routines.php";
require "lang.php";

/* unget some stuff */
unget($vars["database"]);
unget($vars["table"]);

/* connect to the database */
$db = dbconnect($vars["database"]);

/* check to make sure it connected */
if($db == false){
	Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(_ERRORDBCONNECT_." - ".@mysql_error()." : ".@mysql_errno()));
	exit();
}

if($vars["format"] == "csv") {
	// a simple dump should suffice
	//Header("Content-Description: attachment; filename=".urlencode($vars["database"].'-'.$vars["table"].'.csv'));
	//Header("Content-Disposition: attachment; filename=".urlencode($vars["database"].'-'.$vars["table"].'.csv'));
	//Header("Content-type: octet/stream");
	Header("Content-Type: text/plain");

	$q = @mysql_query("SELECT * FROM ".$vars["table"]);
	while($r = @mysql_fetch_row($q)) {
		for($l=0; $l<sizeof($r); ++$l) { $r[$l] = sql($r[$l]); }
		echo implode(", ", $r), "\n";
	}
} else {
	/* obtain a list of tables if needed */
	$tables = array();

	if(!$vars["table"]) {
		/* check to see whether there is (or has been) an error listing tables in the database */
		if(($t = mysql_list_tables($vars["database"])) == false){
			Header("Location: error.php?database=".urlencode($vars["database"])."&errmsg=".urlencode(@mysql_errno()." : ".@mysql_error()." : "._LISTFIELDSERROR_));
			exit();
		}

		/* store all the table names in an (easier) referencable array */
		for($tmp=0; $tmp<mysql_num_rows($t); $tmp++){
			$tables[] = mysql_tablename($t,$tmp);
		}
	} else {
		$tables[] = $vars["table"];
	}

	// write out a header for downloading the file, call it $vars["database"]-$vars["table"].sql if we're dumping a table, otherwise $vars["database"].sql
/*
	if($vars["table"]) {
		Header("Content-Disposition: attachment; filename=".urlencode($vars["database"].'_'.$vars["table"].'.sql'));
	} else {
		Header("Content-Disposition: attachment; filename=".urlencode($vars["database"].'.sql'));
	}
*/
	//Header("Content-type: text/html");
	//Header("Content-type: octet/stream");
	Header("Content-Type: text/plain");

	/* loop through our list of tables and display the construction and data for each one */
	for($t=0; $t<sizeof($tables); $t++){
		/* store the table name in a pointer for ease or ref. */
		$table = $tables[$t];

		/* dump table construction code? */
		if($vars["construct"]){
			/* some more info */
			echo	"\n# Dumping table construction info for '".$table."'";
			echo 	"\nDROP TABLE IF EXISTS ".$table.";";

			/* store all the fields and their types in an array (for ease of reference) */
			if(!($fi = @mysql_query("DESC ".$table))){
				//echo "\n# ERROR: Unable to obtain a list of fields for table named '".$vars["table"]."'";
				continue;
			}
			$pri = "";
			$creatinfo = array();
			while($tmp = @mysql_fetch_row($fi)){
				$con = $tmp[0]." ";
				//if($tmp[3] == "PRI") { $pri = $tmp[0]; }
				$con .= trim($tmp[1]." ".$tmp[5]);
				if($tmp[2] != "YES") { $con .= " not null"; }
				if($tmp[4]) { $con .= " default '".$tmp[4]."'"; }
				$creatinfo[] = $con;
			}

			/* implode the $creatinfo array for the table construction */
			$fieldscon = implode(",\n\t", $creatinfo);

			/* begin the construction */
			echo "\nCREATE TABLE ".$table." (";

			/* dump the creation info */
			echo "\n\t".$fieldscon;
//		}
//
// From now on keys comes in as part of "contruction"
//
//		if($vars["dumpkeys"]){
			/* handle all the keys for this table */
			//echo "\n# Showing key construction info for table '".$vars["table"]."'";

			//if($pri) { $creatinfo[] = "PRIMARY KEY (".$pri.")"; }
			$qkey = @mysql_query("SHOW INDEX FROM ".$table);

			/* retrieve the key info if it exists and use it */
			if($rkey = @mysql_fetch_array($qkey)){
				$knames = array();
				$keys = array();
				do {
					/* add the key info to the arrays */
					$keys[$rkey["Key_name"]]["nonunique"] = $rkey["Non_unique"];
					if(!$rkey["Sub_part"]){
						$keys[$rkey["Key_name"]]["order"][$rkey["Seq_in_index"]-1] = $rkey["Column_name"];
					} else {
						$keys[$rkey["Key_name"]]["order"][$rkey["Seq_in_index"]-1] = $rkey["Column_name"]."(".$rkey["Sub_part"].")";
					}

					if(!my_in_array($rkey["Key_name"], $knames)) { $knames[] = $rkey["Key_name"]; }
				} while($rkey = @mysql_fetch_array($qkey));

				/* add the key information to the $creatinfo creation variable */
				for($kl=0; $kl<sizeof($knames); $kl++){
					if($knames[$kl] == "PRIMARY") {
						echo ",\n\tPRIMARY KEY";
					} else {
						if($keys[$knames[$kl]]["nonunique"] == "0") {
							echo ",\n\tUNIQUE ", $knames[$kl];
						} else {
							echo ",\n\tKEY ", $knames[$kl];
						}
					}

					echo " (", @implode(",", $keys[$knames[$kl]]["order"]), ")";
				}
			}
			echo "\n);";
		}

		/* table info */
		if($vars["data"]){
			/* some info */
			echo "\n\n# Dumping table data from '".$table."'";

			/* grab all the data from within the table */
			$q = @mysql_query("SELECT * FROM ".$table);
			$numfields = mysql_num_fields($q);
			/* dump the data */
			if($r = mysql_fetch_row($q)){
				do {
					/* convert all the field entries into SQL 'OK' format */
					$tmp = "INSERT INTO ".$table." SET ";
					for($count = 0; $count < $numfields; $count++) {
						$r[$count] = sql($r[$count]);
						$tmp .= mysql_field_name($q,$count)."=".$r[$count].", ";
					}
					$tmp = substr($tmp, 0, strlen($tmp)-2).";";
					echo "\n$tmp";

				} while($r = mysql_fetch_row($q));
			}
		}

		echo "\n";
	}
}

?>
