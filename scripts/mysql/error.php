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

/* include language stuff */
require "lang.php";
require "db_routines.php";

/* unget some stuff */
unget($vars["errmsg"]);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>MPanel: <?php echo _ERROR_; ?></title>
<link rel="stylesheet" href="style.css"><script language="javascript" src="function.js"></script>
</head>
<body>
<table width="780" class="tmain">
<tr><td colspan="2" align="center"><a href="http://www.mattsscripts.co.uk/mpanel.htm"><img src="logo.gif" width="241" height="79" alt="Matt's MySQL Panel"></a></td></tr>
<tr><td valign="top">
<table width="150">
<tr><td align="center" class="td_nav" onClick="javascript:my_back();"><a class="a_nav" href="javascript:my_back();"><?php echo _BACK_; ?></a></td></tr>
<?php
if(isset($vars["database"])) {
?>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='main.php?database=<?php echo urlencode($vars["database"]); ?>';"><a class="a_nav" href="main.php?database=<?php echo urlencode($vars["database"]); ?>"><?php echo _BACKTOMAINPAGE_; ?></a></td></tr>
<?php
}
?>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='dbmanager.php';"><a class="a_nav" href="dbmanager.php"><?php echo _DBMANAGER_; ?></a></td></tr>
<tr><td class="td_nav" align="center" onClick="javascript:top.location.href='help.php';"><a class="a_nav" href="help.php"><?php echo _HELPPAGE_; ?></a></td></tr>
</table>
</td><td align="center" valign="top">
<table width="630">
<tr><td><?php echo _ERRORINFO_; ?></td></tr>
<tr><td align="center"><?php echo _ERRORMSG_; ?>: "<?php echo $vars["errmsg"]; ?>"</td></tr>
</table>
</td></tr></table>
</body>
</html>
