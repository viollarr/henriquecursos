<?php
       header('Cache-Control: no-cache,no-store');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK REL="SHORTCUT ICON" HREF="http://henriquecursos.com/site/images/henrique.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="estilo.css" rel="stylesheet" type="text/css">
<title>Henrique Cursos</title>
<script language="JavaScript" type="text/JavaScript">
function mob_vitoria()
{ 
window.open('popup_cal_crochevitoria.html','minhajanela61','width=483,height=550,status=no,menubar=no,scrollbars=no,resizable=no,top=100,left=100'); 
}
function mob_bh()
{ 
window.open('popup_cal_croche10.html','minhajanela61','width=483,height=550,status=no,menubar=no,scrollbars=no,resizable=no,top=100,left=100'); 
}
function mob_manaus()
{ 
window.open('popup_cal_crocheagosto.html','minhajanela61','width=483,height=550,status=no,menubar=no,scrollbars=no,resizable=no,top=100,left=100'); 
}
var win=null;
function NewWindow(mypage,myname,w,h,scroll,pos){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
win=window.open(mypage,myname,settings);}
// -->
</script>
<script language="javascript" type="text/javascript">
<!--
var win=null;
function NewWindow(mypage,myname,w,h,scroll,pos){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
win=window.open(mypage,myname,settings);}
// -->
</script>
<style type="text/css">
<!--
.style3 {color: #FF0000}
-->
</style>
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
        <td align="left" valign="top"><span id="posicao_menu"><? include_once "example.php"; ?></span>
        </td>
        <td valign="top">
		<!-- CONTEUDO -->
<table>
<tr>
<td width="570" valign="top">
		<table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="3"><img src="images/curva.jpg" alt="" width="570" height="24" /></td>
          </tr>
          <tr>
            <td width="5"bgcolor="#FEFCED"></td>
            <td width="559">
			<!-- CONTEUDO GERAL -->
			<table width="556" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
              <?php
              
              $id= $_GET['id'];
              include('includes/bd.php');
              $sql = "select nome from cursos where id='$id'";
              $resultado = mysql_query($sql);
              $output = mysql_fetch_row($resultado);
			  ?>
              <?php
			  ###################################################
			  $procura = "SELECT * FROM cursos";
			  $sql2 = mysql_query($procura);
			  $linhas = mysql_num_rows($sql2);
			  while($result = mysql_fetch_array($sql2)){
			  	if(($result['nome'] == 'SPA FACIAL')){
					$id1 = $result['id'];
				}
				elseif(($result['nome'] == 'SPA CORPORAL')){
					$id2 = $result['id'];
				}
				elseif(($result['nome'] == 'SPA GESTANTE')){
					$id3 = $result['id'];
				}
				elseif(($result['nome'] == 'SPA RELAXAMENTO')){
					$id4 = $result['id'];
				}
				elseif(($result['nome'] == 'SPA DOS PÉS')){
					$id5 = $result['id'];
				}				
			  }
                            
              ?>
                  <td align="left"><img src="images/tit_marcador.gif" width="14" height="14" /> <span class="t_titulo">ESCOLHA O TIPO DO CURSO - <?=$output[0]?> <img src="images/marca_reg.gif" width="12" height="12"></span></td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="center">
				<table width="500" border="0" cellpadding="2" cellspacing="1" class="txt_calendario">
                  <tr>
                    <td colspan="2">
                    	<form method="GET" action="cal_geral.php">
                        	<input type="hidden" value="<?=$id1?>" name="id" />
                    		<input type="submit" value="SPA FACIAL"  />
                        </form>
                    </td>
                    <td colspan="3">
                    	<form method="GET" action="cal_geral.php">
                        	<input type="hidden" value="<?=$id2?>" name="id" />
                        	<input type="submit" value="SPA CORPORAL"  />
                        </form>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                    	<form method="GET" action="cal_geral.php">
                        	<input type="hidden" value="<?=$id3?>" name="id" />
                    		<input type="submit" value="SPA GESTANTE"  />
                        </form>
                    </td>
                    <td colspan="3">
                    	<form method="GET" action="cal_geral.php">
                        	<input type="hidden" value="<?=$id4?>" name="id" />
                        	<input type="submit" value="SPA RELAXAMENTO"  />
                        </form>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="5" align="center">
                    	<form method="GET" action="cal_geral.php">
                        	<input type="hidden" value="<?=$id5?>" name="id" />
                    		<input type="submit" value="SPA DOS PÉS"  />
                        </form>
                    </td>
                  </tr>
                  <tr >
                    <td width="150" align="center">&nbsp;</td>
                    <td width="100" align="center">&nbsp;</td>
                    <td width="90" align="center">&nbsp;</td>
                    <td width="60" align="center">&nbsp;</td>
                    <td width="100" align="center">&nbsp;</td>
                  </tr>
                </table>
                </td>
		      </tr>
              <tr>
                <td align="left" class="t_texto">&nbsp;</td>
              </tr>
            </table>
			<!-- CONTEUDO GERAL --></td>
            <td width="6"bgcolor="#FEFCED"></td>
          </tr>
          <tr>
            <td colspan="3"><img src="images/curva2.jpg" alt="" width="570" height="24" /></td>
          </tr>
		  			<tr>
		  				<td colspan="3" align="center"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','562','height','63','src','banners_horizontal_botao_baixo','quality','high','wmode','transparent','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','banners_horizontal_botao_baixo' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="562" height="63">
                          <param name="movie" value="banners_horizontal_botao_baixo.swf" />
                          <param name="quality" value="high" />
                      	  <param name="wmode" value="transparent" />
                          <embed src="banners_horizontal_botao_baixo.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="562" height="63"></embed>
	  				    </object></noscript></td>
		  			</tr>
        </table>
<td valign="top">
<table width="130" height="104" border="0">
    <tr>
      <th width="130" height="100" scope="col">&nbsp;</th>
    </tr>
  </table> 
</td>
</tr>
</table>
		<!-- FIM DO CONTEUDO -->
		</td>
      </tr>
    </table>
	</td>
  </tr>
</table>
<p class="style3">&nbsp;</p>
</body>
</html>
