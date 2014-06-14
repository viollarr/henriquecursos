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

/* include some funcs */
require "db_routines.php";
require "lang.php";

/* unget some stuff */
unget($vars["database"]);
unget($vars["table"]);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>MPanel: <?php echo _IMPORTDATA_; ?></title>
<link rel="stylesheet" href="style.css"><script language="javascript" src="function.js"></script>
</head>
<body>
<table width="780" class="tmain">
<tr><td align="center" colspan="2"><a href="http://www.mattsscripts.co.uk/mpanel.htm"><img src="logo.gif" width="241" height="79" alt="Matt's MySQL Panel"></a></td></tr>
<tr><td align="center" colspan="2"><h4><?php echo _CURDATABASE_; ?> : '<?php echo $vars["database"]; ?>'</h4></td></tr>
<tr><td align="center" colspan="2"><h4><?php echo _IMPORTDBDATA_; ?></h4></td></tr>
<tr><td valign="top">
<table width="150" cellspacing="2">
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='main.php?database=<?php echo urlencode($vars["database"]); ?>';"><a class="a_nav" href="main.php?database=<?php echo urlencode($vars["database"]); ?>"><?php echo _BACKTOMAINPAGE_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='help.php';"><a class="a_nav" href="help.php"><?php echo _HELPPAGE_; ?></a></td></tr>
</table>
</td>
<form enctype="multipart/form-data" action="import.php" method="post">
<input type="hidden" name="database" value=<?php echo tag($vars["database"]); ?>>
<td align="center">
<table width="630" cellspacing="2"
<tr><td><?php echo _IMPORTDATAINSTRUCT_; ?></td></tr>
<?php
if($vars["table"] != "") {
?>
<tr><td>&nbsp;</td></tr>
<tr><td align="center"><?php echo _IMPORTTYPE_; ?>&nbsp;<select name="filetype"><option value="sql">SQL</option><option value="csv">CSV</option></select></td></tr>
<tr><td>&nbsp;</td></tr>
<input type="hidden" name="table" value=<?php echo tag($vars["table"]); ?>>
<tr><td align="center"><?php echo _CSVHEADER_; ?>&nbsp;-&nbsp;<input type="checkbox" name="csvhasheader" value ="1" checked></td></tr>
<tr><td align="center"><?php echo _CSVCONTAINER_; ?>&nbsp;-&nbsp;<input type="text" name="csvcontainer" value='"' size="5"></td></tr>
<tr><td align="center"><?php echo _CSVSEPERATOR_; ?>&nbsp;-&nbsp;<input type="text" name="csvseperator" value="," size="5"></td></tr>
<tr><td>&nbsp;</td></tr>
<?php
} else {
?>
<input type="hidden" name="filetype" value="sql">
<?php
}
?>
<tr><td align="center">
<?php echo _IMPORTFILE_; ?>:&nbsp;<INPUT NAME="userfile" TYPE="file">
<input type="submit" value=<?php echo tag(_OK_); ?>>
</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td align="center"><input type="submit" value=<?php echo tag(_OK_); ?></td></tr>
<tr><td>&nbsp;</td></tr>
</table>
</td>
</form>
</tr>
</table>
</body>
</html>
