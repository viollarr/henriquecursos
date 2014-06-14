<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="estilo.css" rel="stylesheet" type="text/css">
<title>Henrique Cursos</title>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
	function getEndereco() {
			if($.trim($("#cep").val()) != ""){
				$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
			  		if(resultadoCEP["resultado"]){
						$("#rua").val(unescape(resultadoCEP["tipo_logradouro"])+": "+unescape(resultadoCEP["logradouro"]));
						$("#bairro").val(unescape(resultadoCEP["bairro"]));
						$("#cidade").val(unescape(resultadoCEP["cidade"]));
						$("#estado").val(unescape(resultadoCEP["uf"]));
					}else{
						alert("Endereço não encontrado");
					}
				});				
			}			
	}
function barra(objeto){
		if (objeto.value.length == 2 || objeto.value.length == 5 ){
		objeto.value = objeto.value+"/";
		}
	}
function telefone(objeto){
		if (objeto.value.length == 4 || objeto.value.length == 5 ){
		objeto.value = objeto.value+"-";
		}
	}
function cep(objeto){
		if (objeto.value.length == 5 || objeto.value.length == 5 ){
		objeto.value = objeto.value+"-";
		}
	}
function validar(obj) { // recebe um objeto
    var s = (obj.value).replace(/\D/g,'');
    var tam=(s).length; // removendo os caracteres no numricos
    if (!(tam==11)){ // validando o tamanho
        alert("'"+s+"' Não é um CPF válido!" ); // tamanho invlido
        return false;
    }

// se for CPF
    if (tam==11 ){
        if (!validaCPF(s)){ // chama a funo que valida o CPF
            alert("'"+s+"' Não é um CPF válido!" ); // se quiser mostrar o erro
            obj.select();  // se quiser selecionar o campo em questo
            return false;
        }

        obj.value=maskCPF(s);    // se validou o CPF mascaramos corretamente
        return true;
    }
}
// fim da funcao validar()

// funo que valida CPF
// O algortimo de validao de CPF  baseado em clculos
// para o dgito verificador (os dois ltimos)
// No entrarei em detalhes de como funciona
function validaCPF(s) {
    var c = s.substr(0,9);
    var dv = s.substr(9,2);
    var d1 = 0;
    for (var i=0; i<9; i++) {
        d1 += c.charAt(i)*(10-i);
     }
    if (d1 == 0) return false;
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(0) != d1){
        return false;
    }
    d1 *= 2;
    for (var i = 0; i < 9; i++)    {
         d1 += c.charAt(i)*(11-i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(1) != d1){
        return false;
    }
    return true;
}

    // Funo que permite apenas teclas numricas
    // Deve ser chamada no evento onKeyPress desta forma
    // return (soNums(event));
function soNums(e)
{
    if (document.all){var evt=event.keyCode;}
    else{var evt = e.charCode;}
    if (evt <20 || (evt >47 && evt<58)){return true;}
    return false;
}

//    funo que mascara o CPF
function maskCPF(CPF){
    return CPF.substring(0,3)+"."+CPF.substring(3,6)+"."+CPF.substring(6,9)+"-"+CPF.substring(9,11);
}1

function ValidaEmail()
{
  var obj = eval("document.forms[0].email");
  var txt = obj.value;
  if ((txt.length != 0) && ((txt.indexOf("@") < 1) || (txt.indexOf('.') < 4)))
  {
    alert('Email incorreto');
	obj.focus();
  }
}
</script>
</head>
<body oncontextmenu="return false;">
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
            <td colspan="3" valign="top">
<img src="images/curva.jpg" alt="" width="570" height="24" /></td>
          </tr>
          <tr>
			<td width="4"bgcolor="#FEFCED"></td>
			<td width="562">
			<!-- CONTEUDO GERAL -->
			<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
               <td class="t_titulo_popup">FICHA DE INSCRIÇÃO NOS CURSOS DE EXTENSÃO E APERFEIÇOAMENTO</td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
			  </tr>
			  <tr>
                <td class="t_titulo_popup"><span class="t_titulo_texto">Dados Pessoais</span></td>
			  </tr>
			  <tr>
                <td>&nbsp;</td>
			  </tr>
			  <tr>
                <td align="left" class="t_titulo_p1">
                <form action="cadastro.php" method="post">
                <table width="560" border="0" align="center">
                	<tr>
                    	<td width="254">
                          <label>Nome:</label>
                          <input name="nome" type="text" size="30" maxlength="50" />                        </td>
                        <td colspan="2">
                          <label>Data Nascimento:</label>
                          <input type="text" name="nasc" id="nasc" size="10" maxlength="10" onKeyUp="barra(this)" />                        </td>
                    </tr>
                    <tr>
                    	<td>                        
                          <label>Identidade:</label>
                          <input type="text" id="rg" size="11" maxlength="11" name="rg" />                        </td>
                        <td width="153">
                          <label>Orgão emissor:</label>
                          <input type="text" name="org" id="org" size="5" maxlength="10" />                        </td>
                        <td width="148">
                          <label>CEP:</label>
                          <input name="cep" id="cep" size="9" maxlength="8" onBlur="getEndereco()"/>                        </td>
                    </tr>
                    <tr>
                    	<td>
                          <label for="rua">Logradouro:</label>
                          <input name="rua" id="rua" size="25"/>                        </td>
                        <td> 
                          <label>Nº:</label>
                          <input type="text" name="numero" id="numero" size="5" />                        </td>
                        <td>  
                          <label>Comp.:</label> 
                          <input type="text" name="comp" id="comp" size="10" />                        </td>
                      </tr>
                      <tr>
                      	<td>    
                          <label for="bairro">Bairro:</label>
                          <input name="bairro" id="bairro" size="20"/>                        </td>
                        <td>  
                          <label for="cidade">Cidade:</label>
                          <input name="cidade" id="cidade" size="13"/>                        </td>
                        <td>  
                          <label for="estado">Estado</label>
                          <input name="estado" id="estado" size="2" maxlength="2"/>                        </td>
                      </tr>
                      <tr>
                      	<td>  
                          <label>Telefone: res. (
                          <input name="codigo" type="text" id="codigo" size="1" maxlength="3" />
                          )</label>
                          <input type="text" name="res" id="res" size="7" maxlength="9" onKeyUp="telefone(this)"/>                        </td>
                        <td>  
                          <label>Cel.:</label>
                          (
                          <label>
                          <input name="codigo2" type="text" id="codigo2" size="1" maxlength="3" />
                          </label>
                          )
                          <input type="text" name="cel" id="cel" size="7" maxlength="9" onKeyUp="telefone(this)"/>                        </td>
                        <td>
                          <label>Email:</label>
                          <input type="text" name="email" id="email" size="13" maxlength="50" onBlur="ValidaEmail();"/>                        </td>
                      </tr>
                      	<td>
                          <label>CPF:</label>
                          <input name="cpf" type="text" id="cpf" onblur="validar(this)" maxlength="14" size="14"/>                        </td>
                        <td colspan="2">
                          <label>Nº CREFITO:</label>
                          <input type="text" name="crefito" id="crefito" size="30" maxlength="40" />                        </td>
                      </tr>
                      <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="t_titulo_texto">Dados Acadêmicos</td>
                        </tr>
                      <tr>
                            <td colspan="3">1) GRADUA&Ccedil;&Atilde;O</td>
                        </tr>
                        <tr>
                            <td><label>Faculdade:</label>
                                <input name="facul" type="text" id="facul" size="25" maxlength="50" />                            </td>
                            <td colspan="2"><label>Curso:</label>
                                <input name="curso" type="text" id="curso" size="25" />                            </td>
                        </tr>
                        <tr>
                            <td><label>Completo: Sim </label>
                              <input type="radio" name="radio" id="sim" value="sim" />
                              <label>ano:</label>
                              <input name="ano" type="text" id="ano" size="4" maxlength="4" />                            </td>
                            <td colspan="2"><label>Não </label>
                              <input type="radio" name="radio" id="nao" value="nao" />
                              <label>Período</label>
                              <input name="periodo" type="text" id="periodo" size="15" maxlength="15" />                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>2) P&Oacute;S-GRADUA&Ccedil;&Atilde;O</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><label>Faculdade:</label>
                                <input name="facul2" type="text" id="facul2" size="25" maxlength="50" />                            </td>
                            <td colspan="2"><label>Curso:</label>
                                <input name="curso2" type="text" id="curso2" size="25" />                            </td>
                        </tr>
                        <tr>
                            <td><label>Completo: Sim </label>
                              <input type="radio" name="radio2" id="sim" value="sim" />
                              <label>ano:</label>
                              <input name="ano2" type="text" id="ano2" size="4" maxlength="4" />                            </td>
                            <td colspan="2"><label>Não </label>
                              <input type="radio" name="radio2" id="nao" value="nao" />
                              <label>Período</label>
                              <input name="periodo2" type="text" id="periodo2" size="15" maxlength="15" />                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="t_titulo_texto">Curso de Interesse</td>
                        </tr>
                        <?php
							$curso = $_GET['curso'];
							if(isset($curso)){
								$select = "SELECT ca.dia, ca.mes, ca.ano, ca.local, cur.nome FROM calendario ca, cursos cur WHERE ca.id = '$curso' AND ca.tipo_id = cur.id";
								$query = mysql_query($select);
								$a = mysql_fetch_array($query);
								
								$array_mes_string = array("Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez");
								$array_mes_num = array("01","02","03","04","05","06","07","08","09","10","11","12");
								
								
								$dia = substr(preg_replace("/[^0-9]/","",$a['dia']),0,2);
								$mes = str_replace($array_mes_string,$array_mes_num,substr($a['mes'],0,3));
								$ano = $a['ano'];
								if($dia == ""){$data_certa = $mes.'/'.$ano;}
								else{$data_certa = $dia.'/'.$mes.'/'.$ano;}
								$internet = 'checked="checked"';
								
							}
						?>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3"><label>Nome do Curso:</label>
                                <input name="nome_curso" type="text" id="nome_curso" value="<?=$a['nome']?>" size="30" maxlength="50" />                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><label>Local do Curso: </label>
                              <input name="local" type="text" id="local" value="<?=$a['local']?>" size="30" maxlength="50" />                        </td>
                        </tr>
                        <tr>
                            <td colspan="3"><label>Data de Inscrição: </label>
                                <input name="data2" type="text" id="data2" value="<?=$data_certa?>" onkeyup="barra(this)" size="10" maxlength="10" />                            </td>
                        </tr>
                        <tr>
                        	<td>Conheceu o curso atrav&eacute;s de:</td>
                            <td colspan="2"><label>Pesquisa na Internet:</label>
                                <input type="checkbox" name="pesquisa" <?=$internet?> id="pesquisa" value="internet" />                            </td>
                        </tr>
                        <tr>
                        	<td>&nbsp;</td>
                            <td colspan="2"><label>Indicação de ex-aluno:</label>
                                <input type="checkbox" name="indicacao" id="indicacao" value="indicação" />                            </td>
                        </tr>
                        <tr>
                        	<td>&nbsp;</td>
                            <td colspan="2"><label>Folder Informativo:</label>
                                <input type="checkbox" name="informativo" id="informativo" value="informativo" />                            </td>
                        </tr>
                        <tr>
                        	<td>&nbsp;</td>
                            <td colspan="2"><label>Mala Direta: </label>
                                <input type="checkbox" name="maladireta" id="maladireta" value="mala-direta" />                            </td>
                        </tr>
                        <tr>
                        	<td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                        	<td colspan="3"><u>Aten&ccedil;&atilde;o!</u><br />
                        	  <strong>O preenchimento dessa Ficha  de Inscri&ccedil;&atilde;o n&atilde;o garante  sua vaga. <br />
Aguarde uma confirma&ccedil;&atilde;o  via e-mail do Contact Center do Henriquecursos.</strong></td>
                        </tr>   
                        <tr>
                        	<td colspan="3">&nbsp;</td>
                        </tr>                                                                     
                        <tr>
                        	<td colspan="3" class="t_titulo_popup"><label>
                        	  <input type="submit" name="enviar" id="enviar" value="Enviar" />
                        	  <input type="reset" name="limpar" id="limpar" value="limpar" />
                        	</label></td>
                        </tr>
                      </table>
                </form>                </td>
			  </tr>
            </table>
			<!-- CONTEUDO GERAL --></td>
            <td width="4"bgcolor="#FEFCED"></td>
          </tr>
          <tr>
            <td colspan="3">
<img src="images/curva2.jpg" alt="" width="570" height="24" /></td>
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
<td valign="top">
<table width="130" height="104" border="0">
    <tr>
      <th width="130" height="100" scope="col">&nbsp;</th>
    </tr>
  </table> 
  </td>
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