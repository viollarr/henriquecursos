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

/* un get some stuff */
unget($vars["table"]);
unget($vars["database"]);
unget($vars["field"]);
unget($vars["fieldtype"]);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>MPanel: <?php echo _RENAMEFIELD_; ?></title>
<link rel="stylesheet" href="style.css"><script language="javascript" src="function.js"></script>
</head>
<body>
<table width="780" class="tmain">
<tr><td align="center" colspan="2"><a href="http://www.mattsscripts.co.uk/mpanel.htm"><img src="logo.gif" width="241" height="79" alt="Matt's MySQL Panel"></a></td></tr>
<tr><td align="center" colspan="2"><h4><?php echo _FIELDNEWNAME_; ?></h4></td></tr>
<tr><td align="center" valign="top">
<table width="150" cellspacing="2">
<tr><td align="center" class="td_nav" onClick="javascript:my_back();"><a class="a_nav" href="javascript:my_back();"><?php echo _BACK_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='main.php?database=<?php echo urlencode($vars["database"]); ?>';"><a class="a_nav" href="main.php?database=<?php echo urlencode($vars["database"]); ?>"><?php echo _BACKTOMAINPAGE_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='help.php';"><a class="a_nav" href="help.php"><?php echo _HELPPAGE_; ?></a></td></tr>
</table>
</td><td align="center">
<table align="center" width="630">
<form action="renamefield_.php" method="post">
<tr><td align="center" colspan="2"><?php echo _FIELDNEWNAMEINFO_; ?></td></tr>
<tr><td><?php echo _FIELDNAME_; ?></td><td><input type="text" name="newfield" value=<?php echo tag($vars["field"]); ?> size="40"></td></tr>
<tr><td><?php echo _FIELDTYPE_; ?></td><td><input type="text" name="fieldtype" value=<?php echo tag($vars["fieldtype"]); ?> size="40"></td></tr>
<tr><td align="center" colspan="2"><input type="submit" value=<?php echo tag(_OK_); ?>></td></tr>
<input type="hidden" name="database" value=<?php echo tag($vars["database"]); ?>>
<input type="hidden" name="oldfield" value=<?php echo tag($vars["field"]); ?>>
<input type="hidden" name="table" value=<?php echo tag($vars["table"]); ?>>
</form>
</table>
</td></tr></table>
</body>
</html>
