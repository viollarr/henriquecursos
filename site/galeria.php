<?php 
include "conexao_db.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK REL="SHORTCUT ICON" HREF="http://henriquecursos.com/site/images/henrique.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="estilo.css" rel="stylesheet" type="text/css">
<title>Henrique Cursos</title>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="6" class="tab_geral">
  <tr>
    <td align="center">
	<table width="770" border="0" align="center" cellpadding="0" cellspacing="4" class="tab_geral2">
      <tr>
        <td width="160" height="20" valign="top"><? include_once "inc_topo.php"; ?></td>
        <td width="610">
	  <table width="720" border="0">
           <tr>
             <td width="570"><script src="slideshow.js" type="text/javascript"></script></td>
             <td width="140"><div align="center"><img src="images/croche.jpg"></div></td>
           </tr>
         </table></td>
      </tr>
      <tr>
        <td align="left" valign="top">
        	<span id="posicao_menu">
				<? include_once "example.php"; ?>
            </span>
			<table width="200" height="107" border="0">
<tr>
    				<td valign="top">&nbsp;</td>
  				</tr>
    			<tr>
    				<td valign="top" align="center">&nbsp;</td>
   			  </tr>
			</table>
        </td>
        <td valign="top">
		<!-- CONTEUDO -->
<table>
<tr>
<td width="570">
		<table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="3"><img src="images/curva.jpg" alt="" width="570" height="24" /></td>
         </tr>
          <tr>
            <td width="4"bgcolor="#FEFCED"></td>
            <td width="562">
			<!-- CONTEUDO GERAL -->
			<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="462" align="left"><img src="images/tit_marcador.gif" width="14" height="14" /> <span class="t_titulo">GALERIA <img src="images/camera10.gif" alt="" width="102" height="94" /></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <?php
			  $select = "SELECT *FROM galeria WHERE exibir = '1' ORDER BY id DESC";
			  $sql = mysql_query($select) or die ("Query: ".$select." : ".mysql_error());
			  while($x = mysql_fetch_array($sql)){
			  	echo "<tr>";
				echo '<td align="center"><div aling="center">';
				if (($x['foto'] == 'images/galeria_152.jpg') and ($x['id'] == 152)){
				echo "<img src='".$x['foto']."' />";
				}
				else{
				echo "<img src='".$x['foto']."' width='350'/>";
				}
				echo "</div></td>";
				echo "</tr>";
				echo "<tr><td align='center'>".$x['descricao']."</td></tr>";
				echo "<tr>";
				echo "<td>&nbsp;</td>";
				echo "</tr>";
			  }
			  ?>
            </table>
			<!-- CONTEUDO GERAL --></td>

            <td width="4"bgcolor="#FEFCED"></td>
          </tr>
          <tr>
            <td colspan="3"><img src="images/curva2.jpg" alt="" width="570" height="24" /></td>
          </tr>
		  			<tr>
		  				<td colspan="3" align="center"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','566','height','63','src','banners_horizontal_botao_baixo','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','banners_horizontal_botao_baixo' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="566" height="63">
                          <param name="movie" value="banners_horizontal_botao_baixo.swf" />
                          <param name="quality" value="high" />
                          <embed src="banners_horizontal_botao_baixo.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="566" height="63"></embed>
	  				    </object></noscript></td>
		  			</tr>
        </table></td>
</tr>
</table>
		<!-- FIM DO CONTEUDO -->		</td>
      </tr>
    </table>
	</td>
  </tr>
</table>
</body>
</html>