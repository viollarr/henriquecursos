<?php
 	
	//	Inclui e est�ncia classe para captcha
	//define('CHECKSPAM_DIR','./checkspam/');  
	require_once( "b2evo_captcha/b2evo_captcha.config.php" );	
	require_once( "b2evo_captcha/b2evo_captcha.class.php" );
	$captcha =& new b2evo_captcha($CAPTCHA_CONFIG);
		
	//$cs->init_session();
	//$cs->exec_checkspam(); // Graphic mode verification
	//$teste = get_defined_vars();
	//print_r($teste);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="estilo.css" rel="stylesheet" type="text/css">
<title>Henrique Cursos</title>
</head>

<body>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="6" class="tab_geral">
  <tr>
    <td align="center">
	<table width="770" border="0" align="center" cellpadding="0" cellspacing="4" class="tab_geral2">
      <tr>
        <td width="160" height="20" valign="top"><? include_once "inc_topo.php"; ?></td>
        <td width="610"><script src="slideshow.js" type="text/javascript"></script></td>
      </tr>
      <tr>
        <td align="left" valign="top"><span id="posicao_menu"><? include_once "example.htm"; ?></span></td>
        <td valign="top">
		<!-- CONTEUDO -->
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
                <td width="824" align="left" colspan="2"><img src="images/tit_marcador.gif" width="14" height="14" /> <span class="t_titulo">CONTACT CENTER </span></td>
              </tr>
			  <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
			
			<tr>
				<td height="32" colspan="2"><div>&nbsp;&nbsp; <span class="t_titulo">Sempre pensando em voc&ecirc;s, nossos alunos, e com o   objetivo de facilitar e garantir a&nbsp;sua comodidade , a Equipe henriquecursos   est&aacute; dispon&iacute;vel &nbsp;para&nbsp;informar maiores detalhes sobre suas realiza&ccedil;&otilde;es   de cursos voltados ao aperfei&ccedil;oamento do profissional da &aacute;rea da   sa&uacute;de.<br />
				  <br />
				  <br />
				  </span></div>
				  <div class="t_titulo">&nbsp;&nbsp;&nbsp; Se voc&ecirc; deseja manifestar algum coment&aacute;rio, sugest&atilde;o ou   obter um contato direto utilize os tels&nbsp;(21)-25308294   ou (21) 9984 2190, que funciona de segunda &agrave; sabado, das 8:00 &agrave;s 21:00   horas ou envie uma mensagem atrav&eacute;s do formul&aacute;rio abaixo. <br />
				    <br />
				    <br />
				  </div>
				  <div class="t_titulo"></div>
				  <div class="t_titulo">&nbsp;&nbsp;&nbsp; Teremos o maior prazer em responder ! Afinal, a Equipe   henriquecursos quer estar cada vez mais perto de voc&ecirc; ! </div>
				  <br>
				  <form name="lkmail" method="post" action="envio.php">
				    <div>
				      <table width="3" border="0" align="center" cellpadding="0" cellspacing="0" class="t_titulo">
				        <tbody>
                          <tr>
                            <td colspan="4">
							  <?php 
								if ( !empty( $_SESSION['Mensagens'] ) )
								{
									echo '<p align="center"><font color="#0000CE" size="2" face="Verdana, Arial, Helvetica, sans-serif">'.$_SESSION['Mensagens'].'</font></p>';
								}
								unset($_SESSION['Mensagens']);
							  ?>								
							</td>
                          </tr>        
						  <tr>
                            <td width="87"><div><strong>*</strong> Nome:</div></td>
                            <td colspan="3"><input maxlength="40" size="55" name="txtNome" /></td>
                          </tr>
                          <tr>
                            <td colspan="4"><div>&nbsp;</div></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td colspan="3"><table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                  <tr>
                                    <td width="39%">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                </tbody>
                            </table></td>
                          </tr>
                          <tr>
                            <td colspan="4"></td>
                          </tr>
                          <tr>
                            <td><strong>*</strong> Pa&iacute;s:</td>
                            <td width="183"><select onchange="javascript: DefineEstado(this.form.cboPais.options[this.form.cboPais.selectedIndex].value);" name="cboPais">
                                <option value="1" selected="selected">Brasil</option>
                                <option value="0">Outros</option>
                            </select>                            </td>
                            <td width="113"><div id="divRotuloEstado"><strong>*</strong>&nbsp;Estado:</div></td>
                            <td width="167"><div id="divOpcoesEstado">
                              <select name="cboEstado">
                                  <option value="" selected="selected">-- Selecione --</option>
                                  <option value="AC">AC</option>
                                  <option value="AL">AL</option>
                                  <option value="AM">AM</option>
                                  <option value="AP">AP</option>
                                  <option value="BA">BA</option>
                                  <option value="CE">CE</option>
                                  <option value="DF">DF</option>
                                  <option value="ES">ES</option>
                                  <option value="GO">GO</option>
                                  <option value="MA">MA</option>
                                  <option value="MG">MG</option>
                                  <option value="MS">MS</option>
                                  <option value="MT">MT</option>
                                  <option value="PA">PA</option>
                                  <option value="PB">PB</option>
                                  <option value="PE">PE</option>
                                  <option value="PI">PI</option>
                                  <option value="PR">PR</option>
                                  <option value="RJ">RJ</option>
                                  <option value="RN">RN</option>
                                  <option value="RO">RO</option>
                                  <option value="RR">RR</option>
                                  <option value="RS">RS</option>
                                  <option value="SC">SC</option>
                                  <option value="SE">SE</option>
                                  <option value="SP">SP</option>
                                  <option value="TO">TO</option>
                              </select>
                            </div></td>
                          </tr>
                          <tr>
                            <td colspan="4">&nbsp;</td>
                          </tr>
                          <tr>
                            <td><strong>*</strong> Cidade: </td>
                            <td colspan="3"><input maxlength="40" size="55" name="txtCidade" /></td>
                          </tr>
                          <tr>
                            <td colspan="4">&nbsp;</td>
                          </tr>
                          <tr>
                            <td><strong>*</strong> E-mail:</td>
                            <td colspan="3"><input maxlength="40" size="55" name="txtEmail" /></td>
                          </tr>
                          <tr>
                            <td colspan="4">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="4"></td>
                          </tr>
                          <tr>
                            <td colspan="4"><strong>DDD e telefones de contato:</strong></td>
                          </tr>
                          <tr>
                            <td width="87" align="right"><input onkeypress="TeclaSemVirgula(this)" maxlength="3" size="1" name="txtDDDRes" /></td>
                            <td valign="bottom">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td align="right" valign="bottom">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <input onkeypress="TeclaSemVirgula(this)" maxlength="8" name="txtTelResidencial" /></td>
                          </tr>
                          <tr>
                            <td align="right"><input onkeypress="TeclaSemVirgula(this)" maxlength="3" size="1" name="txtDDDRes2" /></td>
                            <td valign="bottom"><br />                              </td>
                            <td>&nbsp;</td>
                            <td align="right" valign="bottom">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input onkeypress="TeclaSemVirgula(this)" maxlength="8" name="txtTelResidencial2" /></td></tr>
                          <tr>
                            <td colspan="4">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Universidade:</td>
                            <td colspan="3"> <input size="55" name="txtUniversidade" /></td>
                          </tr>
                          <tr>
                            <td colspan="4">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Estudante:
                                <input value="1" name="optEstudante" type="radio" />
                              Sim</td>
                            <td colspan="3" valign="bottom"><input value="0" name="optEstudante" type="radio" />
                              N&atilde;o</td>
                          </tr>
                          <tr>
                            <td colspan="4">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Graduado:
                                <input value="1" name="optGraduado" type="radio" />
                              Sim</td>
                            <td colspan="3"><input value="0" name="optGraduado" type="radio" />
                              N&atilde;o</td>
                          </tr>
                          <tr>
                            <td colspan="4"><div>&nbsp;</div>
                                <div>P&oacute;s Graduado:
                                  <input value="1" name="optPGraduado" type="radio" />
                                  Sim
                                  <input value="0" name="optPGraduado" type="radio" />
                                  N&atilde;o&nbsp;</div>
                              <div>&nbsp;</div>
                              <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         &nbsp;Qual:
                                  <input size="55" name="txtQual" />
                              </div></td>
                          </tr>
                          <tr>
                            <td>&nbsp;&nbsp; </td>
                            <td colspan="3">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="4"></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td colspan="3" valign="bottom"><img src="contact_center_spacer.gif" height="0" width="10" /></td>
                          </tr>
                          <tr>
                            <td colspan="4">Autorizo a inclus&atilde;o de meu e-mail no seu Mailing List:</td>
                          </tr>
                          <tr>
                            <td></td>
                            <td colspan="3"><table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                  <tr>
                                    <td width="42%">&nbsp;
                                        <input value="1" name="optDomailing" type="radio" />
                                      Sim</td>
                                    <td><input value="1" name="optDomailing" type="radio" />
                                      N&atilde;o</td>
                                  </tr>
                                </tbody>
                            </table></td>
                          </tr>
				          <!--  							<tr>  								<td colspan="4">&nbsp;</td>  							</tr>  							<tr>  								<td>Assunto:</td>  								<td colspan="3">  									<select name="cboAssunto" class="input_form_combo">  										<option value="1">CONSULTA/PEDIDO</option>  										<option value="2">RECLAMACAO</option>  										<option value="3">ELOGIO</option>  										<option value="4">SUGESTAO</option>  										<option value="5">DIVERSOS</option>  									</select>  								</td>  							</tr>-->
                          <tr>
                            <td colspan="4">&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top"><strong>*</strong> Mensagem:</td>
                            <td colspan="3"><textarea name="txtMensagem"></textarea></td>
                          </tr>
                          <tr>
                            <td colspan="4">&nbsp;</td>
                          </tr> 
                          <tr>
                            <td valign="top"><strong>*</strong> C�digo de verifica��o:</td>
                            <td colspan="3">
<?php 									
									if (isset($_POST['image'])) {
		switch($captcha->validate_submit($_POST['image'],$_POST['attempt']))
		{
	
			// form was submitted with incorrect key
			case 0:
				echo '<p><br>Sorry. Your code was incorrect.';
				echo '<br><br><a href="'.$_SERVER['PHP_SELF'].'">Try AGAIN</a></p>';
				break;

			// form was submitted and has valid key
			case 1:
				echo '<p><br>Congratulations. You will get the resource now.';
				echo '<br><br><a href="'.$_SERVER['PHP_SELF'].'">New DEMO</a></p>';
				break;			
		}
	}
	else {
	$imgLoc = $captcha->get_b2evo_captcha();
	echo '<img src="'.$imgLoc.'" alt="This is a captcha-picture. It is used to prevent mass-access by robots." title=""><br>'."\n";
	echo '<form name="captcha" action="'.$_SERVER['PHP_SELF'].'" method="POST">'."\n";
	echo '<input type="hidden" name="image" value="'.$imgLoc.'">'."\n";
	echo '<input type="text" name="attempt" value="" size="10">&nbsp;&nbsp;';
	//echo '<input type="submit" value="Submit">'."<br>\n";
	echo '</form>'."\n";
	}
 ?>							<?php /*
								<?php $cs->print_imagetext(); ?><br />
								<?php $cs->print_input('name="Validacao"'); ?>  */ ?>
	 						</td>
                          </tr>
                          <tr>
                            <td colspan="4"><div align="right"><img src="images/sapo.gif" alt="" width="48" height="32" border="0" /></div></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><input id="Button1" onclick="return valida(this.form);" value="Enviar" name="btnenviar" type="submit" /></td>
                          </tr>
				          </tbody>
				        </table>
				      </div>
				    <div>&nbsp;</div>
				  </form>			  </td>
			  </tr>
              <tr>
                <td align="right" class="t_texto">&nbsp;</td>
              </tr>
            </table>
			<!-- CONTEUDO GERAL --></td>
            <td width="4"bgcolor="#FEFCED"></td>
          </tr>
          <tr>
            <td colspan="3"><img src="images/curva2.jpg" alt="" width="570" height="24" /></td>
          </tr>
		  <tr>
		  	<td>&nbsp;</td>
		  </tr>
        </table>
		<!-- FIM DO CONTEUDO -->
		</td>
      </tr>
    </table>
	</td>
  </tr>
</table>
</body>
</html>
