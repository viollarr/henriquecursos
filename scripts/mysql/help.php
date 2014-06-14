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

require "lang.php";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>MPanel: <?php echo _HELPPAGE_; ?></title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
</head>
<link rel="stylesheet" href="style.css"><script language="javascript" src="function.js"></script>
<body>
<table width="780" class="tmain">
<tr><td colspan="2" align="center"><a href="http://www.mattsscripts.co.uk/mpanel.htm"><img src="logo.gif" width="241" height="79" alt="Matt's MySQL Panel"></a></td></tr>
<tr><td valign="top">
<table width="150">
<tr><td align="center" class="td_nav" onClick="javascript:my_back();"><a class="a_nav" href="javascript:my_back();"><?php echo _BACK_; ?></a></td></tr>
</table>
</td><td valign="top">

<h4><?php echo _INTRO_; ?></h4>
<?php echo _HELPINTRO_; ?>
<br><br>
<ul>
<li><?php echo _HELPCREATEDELETETABLE_; ?></li>
<li><?php echo _HELPDELETEDB_; ?></li>
<li><?php echo _HELPADDDELETEFIELDS_; ?></li>
<li><?php echo _HELPALTERFIELDS_; ?></li>
<li><?php echo _HELPINSERTRECORDS_; ?></li>
<li><?php echo _HELPDELETERECORDS_; ?></li>
<li><?php echo _HELPMODIFYRECORDS_; ?></li>
<li><?php echo _HELPEXECUTESQL_; ?></li>
<li><?php echo _ETC_, " ", _ETC_, " ", _ETC_; ?></li>
</ul>
<h4><?php echo _HELPTOC_; ?></h4>
<ol>
<li><a href="#login"><?php echo _HELPLOGIN_; ?></a></li>
<li><a href="#createtable"><?php echo _HELPCREATETABLE_; ?></a></li>
<li><a href="#addfield"><?php echo _HELPADDFIELD_; ?></a></li>
<li><a href="#editfield"><?php echo _HELPEDITFIELD_; ?></a></li>
<li><a href="#insertrecord"><?php echo _HELPINSERTRECORD_; ?></a></li>
<li><a href="#querydata"><?php echo _HELPQUERYTABLE_; ?></a></li>
<li><a href="#delmodrecord"><?php echo _HELPDELETEMODIFYRECORD_; ?></a></li>
<li><a href="#delfield"><?php echo _HELPDELETEFIELD_; ?></a></li>
<li><a href="#deltable"><?php echo _HELPDELETETABLE_; ?></a></li>
<li><a href="#deldatabase"><?php echo _HELPDELETEDB_; ?></a></li>
<li><a href="#execmysql"><?php echo _HELPEXECUTINGSQL_; ?></a></li>
<li><a href="#export"><?php echo _HELPEXPORTING_; ?></a></li>
<li><a href="#import"><?php echo _HELPIMPORTING_; ?></a></li>
</ol>
<br>
<a name="login"><h4>1. <?php echo _HELPLOGIN_; ?></h4></a>
<?php echo _HELPLOGININFO_; ?>
<a name="createtable"><h4>2. <?php echo _HELPCREATETABLE_; ?></h4></a>
<?php echo _HELPCREATETABLEINFO_; ?>
<a name="addfield"><h4>3. <?php echo _HELPADDFIELD_; ?></h4></a>
<?php echo _HELPADDFIELDINFO_; ?>
<a name="editfield"><h4>4. <?php echo _HELPEDITFIELD_; ?></h4></a>
<?php echo _HELPEDITFIELDINFO_; ?>
<a name="insertrecord"><h4>5. <?php echo _HELPINSERTRECORD_; ?></h4></a>
<?php echo _HELPINSERTRECORDINFO_; ?>
<a name="querydata"><h4>6. <?php echo _HELPQUERYTABLE_; ?></h4></a>
<?php echo _HELPQUERYTABLEINFO_; ?>
<a name="delmodrecord"><h4>7. <?php echo _HELPDELETEMODIFYRECORD_; ?></h4></a>
<?php echo _HELPDELETEMODIFYRECORDINFO_; ?>
<a name="delfield"><h4>8. <?php echo _HELPDELETEFIELD_; ?></h4></a>
<?php echo _HELPDELETEFIELDINFO_; ?>
<a name="deltable"><h4>9. <?php echo _HELPDELETETABLE_; ?></h4></a>
<?php echo _HELPDELETETABLEINFO_; ?>
<a name="deldatabase"><h4>10. <?php echo _HELPDELETEDB_; ?></h4></a>
<?php echo _HELPDELETEDBINFO_; ?>
<a name="execmysql"><h4>11. <?php echo _HELPEXECUTINGSQL_; ?></h4></a>
<?php echo _HELPEXECUTINGSQLINFO_; ?>
<a name="export"><h4>12. <?php echo _HELPEXPORTING_; ?></h4></a>
<?php echo _HELPEXPORTINGINFO_; ?>
<a name="import"><h4>13. <?php echo _HELPIMPORTING_; ?></h4></a>
<?php echo _HELPIMPORTINGINFO_; ?>
</td>
</tr>
</table>
</body>
</html>
