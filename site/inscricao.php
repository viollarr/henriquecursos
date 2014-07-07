<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="estilo.css" rel="stylesheet" type="text/css">
<title>Henrique Cursos</title>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery1.js"></script>
<script type="text/javascript" src="js/dist/jquery.validate.js"></script>
<style>
* { font-family: Verdana; font-size: 96%; }
label { display: block; margin-top: 10px; }
label.error { float: none; color: red; margin: 0 .5em 0 0; vertical-align: top; font-size: 10px }
p { clear: both; }
.submit { margin-top: 1em; }
em { font-weight: bold; padding-right: 1em; vertical-align: top; }
</style>
<script type="text/javascript">

$(document).ready( function() {
	$("#formulario").validate({
		// Define as regras
		rules:{
			nome:{
				required: true, 
				minlength: 3
			},
			cpf:{
				required: true,
				digits: true
			},
			rg:{
				required: true, 
				digits: true
			},
			email:{
				required: true, 
				email: true
			},
			rua:{
				required: true, 
				minlength: 3
			},
			bairro:{
				required: true, 
				minlength: 5
			},
			res:{
				required: true, 
				digits: true, 
				maxlength: 9
			},
			cel:{
				required: false, 
				digits: true, 
				maxlength: 9
			},
			curso:{
				required: false, 
				minlength: 5
			},
			facul:{
				required: false, 
				maxlength: 50
			},
			nome_curso:{
				required: true,
				maxlength: 50
			},
			local:{
				required: true, 
				maxlength: 50
			},
			data:{
				required: true, 
				maxlength: 10
			}
			
		},
		// Define as mensagens de erro para cada regra
		messages:{
			nome:{
				required: "Digite o seu nome",
				minLength: "O seu nome deve conter, no mínimo, 3 caracteres"
			},
			cpf:{
				required: "Digite um cpf válido",
				digits: "Informe somente números"
			},
			rg:{
				required: "Digite o nome do bairro",
				digits: "Informe somente números"
			},
			email:{
				required: "Digite o seu e-mail para contato",
				email: "Digite um e-mail válido"
			},
			rua:{
				required: "Digite o nome da rua",
				minLength: "A sua mensagem deve conter, no mínimo, 3 caracteres"
			},
			bairro:{
				required: "Digite o nome do bairro",
				minLength: "A sua mensagem deve conter, no mínimo, 5 caracteres"
			},
			res:{
				required: "Digite o telefone",
				digits: "Apenas números",
				maxlength: "Informe seu telefone corretamente"
			},
			cel:{
				digits: "Apenas números",
				maxlength: "Informe seu telefone corretamente"
			},
			curso:{
				minlength: "Digite pelo menos 5 caracteres"
			},
			facul:{
				maxlength: "Não ultrapassar 50 caracteres"
			},
			nome_curso:{
				required: "Digite o nome do curso",
				maxlength: "Não ultrapassar 50 caracteres"
			},
			local:{
				required: "Informe o local do curso",
				maxlength: "Não ultrapassar 50 caracteres"
			},
			data:{
				required: "Informe a data do curso",
				maxlength: "Não ultrapassar 10 caracteres"
			}
		}
	});
});

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
		objeto.value = objeto.value+"";
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
    return CPF.substring(0,3)+CPF.substring(3,6)+CPF.substring(6,9)+CPF.substring(9,11);
}1

function ValidaEmail()
{
  var obj = eval("document.forms[0].email");
  var txt = obj.value;
  if ((txt.length != 0) && ((txt.indexOf("@") < 1)))
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
					<td class="t_titulo_popup">
						<p align="center">
							Ficha de Inscri&ccedil;&atilde;o  nos cursos oferecidos pela<br />
							&nbsp;Associa&ccedil;&atilde;o Brasileira de Crochetagem
						</p>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td align="left" class="t_titulo_p1">
						<form action="cadastro.php" id='formulario' method="post">
							<table width="560" border="0" align="center">
								<tr>
									<td colspan="3">
										<label for='nome'>Nome:<br /></label>
										<input name="nome" id='nome' style=" width: 525px; " maxlength="50" />
									</td>
								</tr>
								<tr>
									<td width="254">
										<label for='cpf'>CPF:<br /></label>
										<input name="cpf" type="text" id="cpf" onblur="validar(this)" maxlength="14" style=" width: 250px; "/>
									</td>
									<td colspan="2">
										<label for='rg'>Identidade:<br /></label>
										<input type="text" id="rg" style=" width: 263px; " maxlength="11" name="rg" />
									</td>
								</tr>
								<tr>
									<td colspan="3">
										<label for='email'>Email:<br /></label>
										<input type="text" name="email" id="email" size="13" style=" width: 525px; "/>
									</td>
								</tr>
								<tr>
									<td>
										<label for="rua">Endere&ccedil;o:<br /></label>
										<input name="rua" id="rua" style=" width: 245px; " />
									</td>
									<td width="153">
										<label for="bairro">Bairro:<br /></label>
										<input name="bairro" id="bairro" size="15" style=" width: 130px; "/>
									</td>
									<td width="148">
										<label for='cep'>CEP:<br /></label>									
										<input name="cep" id="cep" maxlength="8" onblur="getEndereco()"/>
									</td>
								</tr>
								<tr>
									<td>
										<label for='codigo'>Telefone residencial<br /></label>
										(<input name="codigo" type="text" id="codigo" style=" width: 20px; " maxlength="3" />)
										<input type="text" name="res" id="res" style=" width: 200px; " maxlength="9" onkeyup="telefone(this)"/>
									</td>
									<td colspan="2">
										<label for='codigo2'>Celular:<br /></label>									
										(<input name="codigo2" type="text" id="codigo2" style=" width: 20px; " maxlength="3" />)
										<input type="text" name="cel" id="cel" style=" width: 226px; " maxlength="9" onkeyup="telefone(this)"/>
									</td>
								</tr>
								<tr>
									<td colspan="3" class="t_titulo_texto">&nbsp;</td>
								</tr>
								<tr>
									<td colspan="3">
										<label for='curso'>Tem forma&ccedil;&atilde;o em:<br /></label>
										<input name="curso" type="text" id="curso" style=" width: 525px; " />
									</td>
								</tr>
								<tr>
									<td colspan="3">
										<label for='facul'>Faculdade:<br /></label>
										<input name="facul" type="text" id="facul" style=" width: 525px; " maxlength="50" />
									</td>
								</tr>

								<?php
									$curso = $_GET['curso'];
									if(isset($curso)) {
										$select = "SELECT ca.dia, ca.mes, ca.ano, ca.local, cur.nome FROM calendario ca, cursos cur WHERE ca.id = '$curso' AND ca.tipo_id = cur.id";
										$query = mysql_query($select);
										$a = mysql_fetch_array($query);

										$array_mes_string = array("Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez");
										$array_mes_num = array("01","02","03","04","05","06","07","08","09","10","11","12");


										$dia = substr(preg_replace("/[^0-9]/","",$a['dia']),0,2);
										$mes = str_replace($array_mes_string,$array_mes_num,substr($a['mes'],0,3));
										$ano = $a['ano'];
										
										if($dia == "") {
											$data_certa = $mes.'/'.$ano;
										} else {
											$data_certa = $dia.'/'.$mes.'/'.$ano;
										}
										
										$internet = 'checked="checked"';

									}
								?>
								<tr>
									<td colspan="3">
										<label for='nome_curso'>Curso de Interesse:<br /></label>									
										<input name="nome_curso" type="text" id="nome_curso" value="<?=$a['nome']?>" style=" width: 525px; " maxlength="50" />
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<label for='local'>Local do Curso:<br /></label>
										<input name="local" type="text" id="local" value="<?=$a['local']?>" style=" width: 240px; " maxlength="50" />
									</td>
									<td>
										<label for='data'>Data do Curso:<br /></label>
										<input name="data" type="text" id="data" value="<?=$data_certa?>" onkeyup="barra(this)" maxlength="10" />
									</td>
								</tr>
								<tr>
									<td colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td colspan="3"><center>
										<p>Para efetivar sua inscri&ccedil;&atilde;o no  curso desejado por favor preencha e envie a Ficha de Inscri&ccedil;&atilde;o. Aguarde um  retorno da Equipe Henriquecursos. Voc&ecirc; ser&aacute; informado para realizar o dep&oacute;sito referente  ao curso desejado na conta da CROCHETAGEM. Ap&oacute;s dep&oacute;sito informar via email o  comprovante de dep&oacute;sito escaneado para o email <a href="mailto:isis@henriquecursos.com">isis@henriquecursos.com</a> . <br />
										</p>
										<p>Desta maneira sua inscri&ccedil;&atilde;o  estar&aacute; confirmada. Caso ocorra a desist&ecirc;ncia do curso, e avisando com  anteced&ecirc;ncia de 3 dias&nbsp; do in&iacute;cio do  curso , este valor da inscri&ccedil;&atilde;o ser&aacute; restitu&iacute;do. O restante do pagamento dever&aacute;  ser entregue no dia de in&iacute;cio do curso , e poder&aacute; ser efetuado em cheques pr&eacute; datados,  ou &agrave; vista com desconto de 10%, ou cart&atilde;o de cr&eacute;dito pela Redecard.</p></center>
										<p>A disposi&ccedil;&atilde;o</p>
										<p>Equipe Henriquecursos.</p>
									</td>
								</tr>   
								<tr>
									<td colspan="3">&nbsp;</td>
								</tr>                                                                     
								<tr>
									<td colspan="3" class="t_titulo_popup">
										<input type="submit" name="enviar" id="enviar" class="submit" value="Enviar" />
										<input type="reset" name="limpar" id="limpar" value="limpar" />
									</td>
								</tr>	
							</table>
						</form>                
					</td>
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