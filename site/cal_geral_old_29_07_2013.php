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

		<?php require('include_menu.php'); ?>

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

			<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">

              <tr>

              <?

              

			  if(isset($_GET)){

			  	$id= $_GET['id'];

			  }

              elseif(isset($_POST)){

			  	$id= $_POST['id'];

			  }

              include('includes/bd.php');

              $sql = "select nome from cursos where id='$id'";

              $resultado = mysql_query($sql);

              $output = mysql_fetch_row($resultado);

                            

              ?>

              <?php

				if ($id == '1'){

					$programa = 'crochetagem.php';

				}

				elseif ($id == '2'){

					$programa = 'dermato_facial.php';

				}

				elseif ($id == '3'){

					$programa = 'mobilizacao_neural.php';

				}

				elseif ($id == '4'){

					$programa = 'manipulacao_articular.php';

				}

				elseif ($id == '5'){

					$programa = 'bandagem_funcional.php';

				}

				elseif ($id == '6'){

					$programa = 'drenagem_linfatica.php';

				}

				elseif ($id == '7'){

					$programa = 'anatomia_palpatoria.php';

				}

				elseif ($id == '8'){

					$programa = 'dietetica.php';

				}

				elseif ($id == '9'){

					$programa = 'massoterapia.php';

				}

				elseif ($id == '10'){

					$programa = 'auriculoterapia.php';

				}

				elseif ($id == '11'){

					$programa = 'eletrolipolise.php';

				}

				elseif ($id == '12'){

					$programa = 'pilates.php';

				}

				elseif ($id == '13'){

					$programa = 'estetica_facial_chinesa.php';

				}

				elseif ($id == '14'){

					$programa = 'peeling.php';

				}

				elseif ($id == '15'){

					$programa = 'kinesio_taping.php';

				}

				elseif ($id == '16'){

					$programa = 'dermato_corporal.php';

					$espera	 = '<br />Lista de Espera';

				}

				elseif ($id == '17'){

					$programa = 'linfotaping.php';

				}

				elseif ($id == '18'){

					$programa = 'shiatsu.php';

				}

				elseif ($id == '19'){

					$programa = 'ergo_empres.php';

				}

				elseif ($id == '20'){

					$programa = 'terapias_alternativas.php';

				}

				elseif ($id == '21'){

					$programa = 'ergonomica_basica.php';

				}

				elseif ($id == '22'){

					$programa = 'ergonomica_avancada.php';

				}

				elseif ($id == '23'){

					$programa = 'carboxiterapia.php';

				}

				elseif ($id == '24'){

					$programa = 'gatilho.php';

				}

				elseif ($id == '25'){

					$programa = 'inelastoterapia.php';

				}

				elseif ($id == '26'){

					$programa = 'fisioterapoia_obstetricia.php';

				}

				elseif ($id == '27'){

					$programa = 'power_plat.php';

				}

				elseif ($id == '33'){

					$programa = 'massagem_bambu.php';

				}

				elseif ($id == '28'){

					$programa = 'craniopuntura.php';

				}

				//elseif ($id == '29'){

					//$programa = '#';

				//}

				elseif ($id == '31'){

					$programa = 'tecnicas_spa.php';

				}

				elseif ($id == '32'){

					$programa = 'tecnicas_spa.php';

				}

				elseif ($id == '34'){

					$programa = 'tecnicas_spa.php';

				}

				elseif ($id == '35'){

					$programa = 'tecnicas_spa.php';

				}

				elseif ($id == '36'){

					$programa = 'tecnicas_spa.php';

				}

				elseif ($id == '37'){

					$programa = 'atm.php';

				}

				elseif ($id == '38'){

					$programa = 'massagem_turbinada.php';

				}

				elseif ($id == '39'){

					$programa = 'pedras_quentes.php';

				}

				elseif ($id == '40'){

					$programa = 'shantala-massagem-para-bebes.php';

				}

				elseif ($id == '41'){

					$programa = 'ventosaterapia.php';

				}

				elseif ($id == '45'){

					$programa = 'quick_massagem.php';

				}

				elseif ($id == '44'){

					$programa = 'dietetica-chinesa.php';

				}

				elseif ($id == '46'){

					$programa = 'dermaroller.php';

				}

				elseif ($id == '47'){

					$programa = 'plastica.php';

				}

				elseif ($id == '49'){

					$programa = 'mat-pilates.php';

				}

				elseif ($id == '50'){

					$programa = 'antropometria.php';

				}

				elseif ($id == '51'){

					$programa = 'metodo-elastos.php';

				}

				elseif ($id == '52'){

					$programa = 'cross-tape.php';

				}

				elseif ($id == '53'){

					$programa = 'crochetagem-pos-cirurgias-plasticas.php';

				}

				elseif ($id == '55'){

					$programa = 'avaliacao-estetica.php';

				}

				elseif ($id == '56'){

					$programa = 'eletroterapia-nas-lesoes-do-esporte.php';

				}

				elseif ($id == '57'){

					$programa = 'estetica_facial_avancada.php';

				}

				elseif ($id == '58'){

					$programa = 'primeiros-socorros.php';

				}
				elseif ($id == '63'){

					$programa = 'podoposturologia.php';

				}
								else{

					$programa = '#';

				}



			  ?>

			<tr>

            	<td><div align="right"><a href="<?=$programa;?>" class="t_titulo_p1"><font color="#0000CC">PROGRAMA DE CURSO</font></a>&nbsp;&nbsp;</div></td>

            </tr>

                <td align="left"><img src="images/tit_marcador.gif" width="14" height="14" /> <span class="t_titulo">CALENDÁRIO - <?=$output[0]?> <img src="images/marca_reg.gif" width="12" height="12"> - <a href="newslater.php?id=<?=$id?>"><span class="style3">(Avise-me da Pr&oacute;xima turma)</span></a></span></td>

              </tr>

			  <tr>

                <td>&nbsp;</td>

              </tr>

              <tr>

                <td align="center">

				<table width="500" border="0" cellpadding="2" cellspacing="1" class="txt_calendario">

                  <tr bgcolor="#CCCC00">

                    <td width="150" align="center"><b>Local</b></td>

                    <td width="100" align="center"><b>Dia</b></td>

                    <td width="90" align="center"><b>M&ecirc;s</b></td>

                    <td width="60" align="center"><b>Ano</b></td>

                    <td width="100" align="center"><b>Inscri&ccedil;&otilde;es</b></td>

                    <td width="100" align="center"><b>Ficha</b></td>

                  </tr>

                 <?                                                                      

                   $sql = "select * from calendario where tipo_id='$id' order by inscricoes desc, `ano` desc";

                   $result=mysql_query($sql);

                   while($obj= mysql_fetch_object($result))

                   {   $val = $obj->inscricoes;

                   

                   		if($val==0)

                   		{

                   		  

                   	    echo '<tr bgcolor="#F7F7D4">

                  		       <td>'.$obj->local.'</td>

                  			    <td>'.$obj->dia.'</td>

                 			       <td>'.$obj->mes.'</td>

                 			       <td>'.$obj->ano.'</td>

                 			       <td>Encerradas</td>

								   <td>Encerradas</td>

               			       </tr>';

                  	 	}else

                  	 	{

                  	 	     ?>

                 	 	     <tr bgcolor="#F7F7D4">

                 				  <td><a href=<?=$obj->link?> onFocus="this.blur()" onClick="NewWindow(this.href,'calendario','483','550','no','center');return false"><span class="style3"><?=$obj->local?></span></a></td>

                  			  <td><a href=<?=$obj->link?> onFocus="this.blur()" onClick="NewWindow(this.href,'calendario','483','550','no','center');return false"><span class="style3"><?=$obj->dia?></span></a></td>

                 				  <td><a href=<?=$obj->link?> onFocus="this.blur()" onClick="NewWindow(this.href,'calendario','483','550','no','center');return false"><span class="style3"><?=$obj->mes?></span></a></td>

                  			  <td><a href=<?=$obj->link?> onFocus="this.blur()" onClick="NewWindow(this.href,'calendario','483','550','no','center');return false"><span class="style3"><?=$obj->ano?></span></a></td>

                  			  <td><a href=<?=$obj->link?> onFocus="this.blur()" onClick="NewWindow(this.href,'calendario','483','550','no','center');return false"><img src="images/insc_abert.gif" width="52" height="8" border="0" /><br />

                   			  <span class="txt_calendario style3">[leia mais]<?php if($obj->ano == '2010'){echo $espera;}?></span></a></td>

                  			  <td><a href="inscricao.php?curso=<?=$obj->id?>"><span class="style3"><blink>Me inscrever</blink></span></a></td>

                              </tr>

                				  <?

                  	 	}

						  }              

                  ?>                             

                 <tr>

                    <td bgcolor="#CCCC00" colspan="6">&nbsp;</td>

                  </tr>

                </table></td>

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

