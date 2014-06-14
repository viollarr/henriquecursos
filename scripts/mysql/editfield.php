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

/* language stuff */
require "lang.php";
require "db_routines.php";

/* unget various variables */
unget($vars["field"]);
unget($vars["database"]);
unget($vars["table"]);
unget($vars["fieldtype"]);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> 
<html>
<head>
<title>MPanel: <?php echo _EDITFIELD_; ?></title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<script language="javascript">
//<!-- BEGIN HIDE FROM NON-JAVASCRIPT BROWSERS
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
<tr><td colspan="2" align="center"><a href="http://www.mattsscripts.co.uk/mpanel.htm"><img src="logo.gif" width="241" height="79" alt="Matt's MySQL Panel"></a></td></tr>
<tr><td colspan="2" align="center"><h4><?php echo _EDITFIELD_; ?></h4></td></tr>
<tr><td valign="top">
<table width="150" cellspacing="2">
<tr><td align="center" class="td_nav" onClick="javascript:my_back();"><a class="a_nav" href="javascript:my_back();"><?php echo _BACK_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='main.php?database=<?php echo urlencode($vars["database"]); ?>';"><a class="a_nav" href="main.php?database=<?php echo urlencode($vars["database"]); ?>"><?php echo _BACKTOMAINPAGE_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='help.php';"><a class="a_nav" href="help.php"><?php echo _HELPPAGE_; ?></a></td></tr>
</table>
</td><td valign="top" align="left">
<form action="editfield_.php" method="post" name="main">
<table>
<tr><td align="center" colspan="2"><?php echo _CHANGEFIELDTYPE_; ?><BR><?php echo _FIELDNAME_; ?> : <?php echo $vars["field"]; ?><BR><?php echo _FIELDTYPE_; ?> : <?php echo $vars["fieldtype"]; ?></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td align="right"><?php echo _NEWFIELDTYPE_; ?></td><td>
<select name="ftype" OnChange="javascript:document.main.fsize.value=alter_size();">
<option value="TINYINT"<?php if(eregi("^tinyint",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _TINYINT_; ?></option>
<option value="SMALLINT"<?php if(eregi("^smallint",$vars["fieldtype"] )) { echo " SELECTED"; } ?>><?php echo _SMALLINT_; ?></option>
<option value="MEDIUMINT"<?php if(eregi("^mediumint",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _MEDIUMINT_; ?></option>
<option value="INT"<?php if(eregi("^int",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _INT_; ?></option>
<option value="BIGINT"<?php if(eregi("^bigint",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _BIGINT_; ?></option>
<option value="FLOAT"<?php if(eregi("^float",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _FLOAT_; ?> (M, D)</option>
<option value="DOUBLE"<?php if(eregi("^double",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _DOUBLE_; ?> (M, D)</option>
<option value="DECIMAL"<?php if(eregi("^decimal",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _DECIMAL_; ?> (M, D)</option>
<option value="CHAR"<?php if(eregi("^char",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _CHAR_; ?></option>
<option value="VARCHAR"<?php if(eregi("^varchar",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _VARCHAR_; ?></option>
<option value="TINYTEXT"<?php if(eregi("^tinytext",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _TINYTEXT_; ?></option>
<option value="TINYBLOB"<?php if(eregi("^tinyblob",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _TINYBLOB_; ?></option>
<option value="ENUM"<?php if(eregi("^enum",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _ENUM_; ?></option>
<option value="TEXT"<?php if(eregi("^text",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _TEXT_; ?></option>
<option value="BLOB"<?php if(eregi("^blob",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _BLOB_; ?></option>
<option value="MEDIUMTEXT"<?php if(eregi("^mediumtext",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _MEDIUMTEXT_; ?></option>
<option value="MEDIUMBLOB"<?php if(eregi("^mediumblob",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _MEDIUMBLOB_; ?></option>
<option value="LONGTEXT"<?php if(eregi("^longtext",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _LONGTEXT_; ?></option>
<option value="LONGBLOB"<?php if(eregi("^longblob",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _LONGBLOB_; ?></option>
<option value="DATETIME"<?php if(eregi("^datetime",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _DATETIME_; ?></option>
<option value="DATE"<?php if(eregi("^date",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _DATE_; ?></option>
<option value="TIME"<?php if(eregi("^time",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _TIME_; ?></option>
<option value="YEAR"<?php if(eregi("^year",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _YEAR_; ?></option>
<option value="TIMESTAMP"<?php if(eregi("^timestamp",$vars["fieldtype"])) { echo " SELECTED"; } ?>><?php echo _TIMESTAMP_; ?></option>
</select>&nbsp;(<input type="text" size="5" name="fsize" value=<?php $p = strpos($vars["fieldtype"], "("); if($p) { echo tag(substr($vars["fieldtype"], $p+1, strpos($vars["fieldtype"], ")", $p)-$p-1)); } else { echo 1; } ?>>)</td></tr>
<tr><td valign="top" align="right"><?php echo _MODIFIERS_; ?></td><td><input type="checkbox" name="isauto_increment" value="1"<?php if(strpos($vars["fieldtype"], "auto_increment")) { echo " CHECKED"; } ?>><?php echo _AUTO_INCREMENT_FM_; ?></td></tr>
<tr><td>&nbsp;</td><td><input type="checkbox" name="isbinary" value="1"<?php if(strpos($vars["fieldtype"], "binary")) { echo " CHECKED"; } ?>><?php echo _BINARY_FM_; ?></td></tr>
<tr><td>&nbsp;</td><td><input type="checkbox" name="isnot_null" value="1"<?php if(strpos($vars["fieldtype"], "not null")) { echo " CHECKED"; } ?>><?php echo _NOT_NULL_FM_; ?></td></tr>
<tr><td>&nbsp;</td><td><input type="checkbox" name="isunsigned" value="1"<?php if(strpos($vars["fieldtype"], "unsigned")) { echo " CHECKED"; } ?>><?php echo _UNSIGNED_FM_; ?></td></tr>
<tr><td>&nbsp;</td><td><input type="checkbox" name="iszerofill" value="1"<?php if(strpos($vars["fieldtype"], "zerofill")) { echo " CHECKED"; } ?>><?php echo _ZERO_FILL_FM_; ?></td></tr>
<tr><td>&nbsp;</td><td><input type="text" name="isdefault"<?php $p = strpos($vars["fieldtype"], "default"); if($p) { echo " value='", substr($vars["fieldtype"], $p+9, -1), "'"; }?> size=10><?php echo _DEFAULT_FM_; ?></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value=<?php echo tag(_OK_); ?>></td></tr>
<input type="hidden" name="database" value=<?php echo tag($vars["database"]); ?>>
<input type="hidden" name="table" value=<?php echo tag($vars["table"]); ?>>
<input type="hidden" name="field" value=<?php echo tag($vars["field"]); ?>>
</table>
</form>
</td>
</tr>
</table>
</body>
</html>
