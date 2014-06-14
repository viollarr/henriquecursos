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
require "db_routines.php";

/* unget some bits */
unget($vars["database"]);
unget($vars["table"]);

$db = dbconnect($vars["database"]);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> 
<html>
<head>
<title>MPanel: <?php echo _ADDNEWFIELD_; ?></title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<script language="javascript">
//<!-- HIDE FROM NON-JAVASCRIPT BROWSERS
function alter_size()
{
	if(document.main.ftype.value == "FLOAT") { return '10,2'; }
	if(document.main.ftype.value == "DOUBLE") { return '10,2'; }
	if(document.main.ftype.value == "DECIMAL") { return '10,2'; }
	if(document.main.ftype.value == "CHAR") { return '255'; }
	if(document.main.ftype.value == "VARCHAR") { return '255'; }
	if(document.main.ftype.value == "TINYTEXT") { return '255'; }
	if(document.main.ftype.value == "TINYBLOB") { return '255'; }
	if(document.main.ftype.value == "ENUM") { return '"A","B","C"'; }
	if(document.main.ftype.value == "TIMESTAMP"){ return '14'; }
	
	return '';
}
// END HIDE FROM NON-JAVASCRIPT BROWSERS -->
</script>
<link rel="stylesheet" href="style.css"><script language="javascript" src="function.js"></script>
</head>
<body>
<table width="780" class="tmain">
<tr><td colspan="2" align="center"><a href="http://www.mattsscripts.co.uk/mpanel.htm"><img src="logo.gif" width="241" height="79" alt="MPanel"></a></td></tr>
<tr><td colspan="2" align="center"><h4><?php echo _ADDNEWFIELD_; ?></h4></td></tr>
<tr>
<td valign="top">
<table width="150">
<tr><td align="center" class="td_nav" onClick="javascript:my_back();"><a class="a_nav" href="javascript:my_back();"><?php echo _BACK_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='main.php?database=<?php echo urlencode($vars["database"]); ?>';"><a class="a_nav" href="main.php?database=<?php echo urlencode($vars["database"]); ?>"><?php echo _BACKTOMAINPAGE_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='help.php';"><a class="a_nav" href="help.php"><?php echo _HELPPAGE_; ?></a></td></tr>
</table>
</td>
<td valign="top" align="center">
<form action="addfield_.php" method="post" name="main">
<table width="630">
<tr><td align="center"><?php echo _ADDFIELDINFO_; ?></td></tr>
<tr><td align="center">
<table align="center">
<tr><td><?php echo _FIELDNAME_; ?></td><td><input type="text" name="name" size="30"></td></tr>
<tr><td><?php echo _FIELDTYPE_; ?></td><td><select name="ftype" OnChange="javascript:document.main.fsize.value=alter_size();">
<option value="TINYINT"><?php echo _TINYINT_; ?></option>
<option value="SMALLINT"><?php echo _SMALLINT_; ?></option>
<option value="MEDIUMINT"><?php echo _MEDIUMINT_; ?></option>
<option value="INT"><?php echo _INT_; ?></option>
<option value="BIGINT"><?php echo _BIGINT_; ?></option>
<option value="FLOAT"><?php echo _FLOAT_; ?> (M, D)</option>
<option value="DOUBLE"><?php echo _DOUBLE_; ?> (M, D)</option>
<option value="DECIMAL"><?php echo _DECIMAL_; ?> (M, D)</option>
<option value="CHAR"><?php echo _CHAR_; ?></option>
<option value="VARCHAR"><?php echo _VARCHAR_; ?></option>
<option value="TINYTEXT"><?php echo _TINYTEXT_; ?></option>
<option value="TINYBLOB"><?php echo _TINYBLOB_; ?></option>
<option value="ENUM"><?php echo _ENUM_; ?></option>
<option value="TEXT"><?php echo _TEXT_; ?></option>
<option value="BLOB"><?php echo _BLOB_; ?></option>
<option value="MEDIUMTEXT"><?php echo _MEDIUMTEXT_; ?></option>
<option value="MEDIUMBLOB"><?php echo _MEDIUMBLOB_; ?></option>
<option value="LONGTEXT"><?php echo _LONGTEXT_; ?></option>
<option value="LONGBLOB"><?php echo _LONGBLOB_; ?></option>
<option value="DATETIME"><?php echo _DATETIME_; ?></option>
<option value="DATE"><?php echo _DATE_; ?></option>
<option value="TIME"><?php echo _TIME_; ?></option>
<option value="YEAR"><?php echo _YEAR_; ?></option>
<option value="TIMESTAMP"><?php echo _TIMESTAMP_; ?></option>
</select>&nbsp;(<input type="text" name="fsize" value="1" size="10">)</td></tr>
<tr><td valign="top"><?php echo _MODIFIERS_; ?></td><td>
<input type="checkbox" name="isauto_increment" value="1">AUTO_INCREMENT (All INT types)<br>
<input type="checkbox" name="isbinary" value="1">BINARY (CHAR, VARCHAR)<br>
<input type="checkbox" name="isnot_null" value="1">NOT NULL (All types)<br>
<input type="checkbox" name="isprimary_key" value="1">PRIMARY KEY (All types)<br>
<input type="checkbox" name="isunsigned" value="1">UNSIGNED (Numeric types)<br>
<input type="checkbox" name="iszerofill" value="1">ZERO FILL (Numeric types)<br>
<input type="text" name="isdefault" value="" size="10">DEFAULT (All, except BLOB, TEXT)
<input type="hidden" name="database" value=<?php echo tag($vars["database"]); ?>>
<input type="hidden" name="table" value=<?php echo tag($vars["table"]); ?>></td></tr>
<?php
        $q = @mysql_query("DESC ".$vars["table"]);
        if(@mysql_num_rows($q) > 1) {
?>
<tr><td valign="top"><?php echo _ADDFIELDAFTER_; ?></td><td><select name="putafter"><option value=""><?php echo _TABLEEND_; ?></option><?php
		while(list($tablename) = @mysql_fetch_row($q)) {
			echo "<option value=", tag($tablename), ">", $tablename, "</option>\n";
		}
?></select></td></tr>
<?php
	} else {
		echo "<input type=\"hidden\" name=\"putafter\" value=\"\">\n";
	}
?>
<tr><td colspan="2" align="center"><input type="submit" value=<?php echo tag(_OK_); ?>></td></tr>
</table>
</form>
</td>
</tr>
</table>
</body>
</html>
