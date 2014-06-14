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

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> 
<html>
<head>
<title>MPanel: <?php echo _ADDKEY_; ?></title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" href="style.css"><script language="javascript" src="function.js"></script>
<script language="javascript" src="function.js">
</script>
</head>
<body>
<table width="780" class="tmain">
<tr><td colspan="2" align="center"><a href="http://www.mattsscripts.co.uk/mpanel.htm"><img src="logo.gif" width="241" height="79" alt="Matt's MySQL Panel"></a></td></tr>
<tr><td colspan="2" align="center"><h4><?php echo _ADDKEYTOTABLE_; ?> : <?php echo $table; ?></h4></td></tr>
<tr><td align="center" valign="top">
<table width="150" cellspacing="2">
<tr><td align="center" class="td_nav" onClick="javascript:my_back();"><a class="a_nav" href="javascript:my_back();"><?php echo _BACK_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='main.php?database=<?php echo urlencode($vars["database"]); ?>';"><a class="a_nav" href="main.php?database=<?php echo urlencode($vars["database"]); ?>"><?php echo _BACKTOMAINPAGE_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='help.php';"><a class="a_nav" href="help.php"><?php echo _HELPPAGE_; ?></a></td></tr>
</table>
</td><td>
<form action="addkey_.php" method="post">
<table width="630">
<tr><td align="center"><?php echo _ADDKEYINFO_; ?><br><?php echo _ADDKEYWARNING_; ?></td></tr>
<tr><td>
<input type="hidden" name="database" value=<?php echo tag($vars["database"]); ?>>
<input type="hidden" name="table" value=<?php echo tag($vars["table"]); ?>>
<input type="hidden" name="referer" value=<?php echo tag($vars["referer"]); ?>>
<table align="center" width="100%">
<tr><td><?php echo _KEYNAME_; ?></td><td><input type="text" name="name" size="40"></td></tr>
<tr><td><?php echo _KEYTYPE_; ?></td><td><select name="ktype">
<option value="PRIMARY"><?php echo _PRIMARYKEY_; ?></option>
<option value="UNIQUE"><?php echo _UNIQUEKEY_; ?></option>
<option value="KEY"><?php echo _NORMALKEY_; ?></option>
</select></td></tr>
<tr><td><?php echo _KEYFIELDS_; ?></td><td><input type="text" name="kfields" size="60"></td></tr>
<tr><td align="center" colspan="2">E.g. id(10), name(5), postcode(3), telephone(6)</td></tr>
<tr><td><input type="submit" value=<?php echo tag(_ADDKEY_); ?>></td><td><input type="reset" value=<?php echo tag(_RESET_); ?>></td></tr>
</table>
</form>
</td>
</tr>
</table>
</body>
</html>
