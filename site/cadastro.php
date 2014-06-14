<?
##################################
####Programador: Victor Narcizo###
####	data: 04/08/2008	   ###
##################################

include_once "conexao_db.php";

// Recebendo as variáveis do formulário //
	//Dados Pessoais
$nome			=$_POST['nome'];
$nasc			=$_POST['nasc'];
$rg				=$_POST['rg'];
//$org			=$_POST['org'];
$cep			=$_POST['cep'];
$logradouro		=$_POST['rua'];
$numero			=$_POST['numero'];
$compl			=$_POST['comp'];
$bairro			=$_POST['bairro'];
$cidade			=$_POST['cidade'];
$estado			=$_POST['estado'];
$tel			=$_POST['codigo'];
$residencial	.="(".$tel.")";
$residencial	.=$_POST['res'];
$celu			=$_POST['codigo2'];
$celular		.="(".$celu.")";
$celular		.=$_POST['cel'];
$email			=$_POST['email'];
$cpf			=$_POST['cpf'];
$crefito		=$_POST['crefito'];
$ip_cliente		= getenv("REMOTE_ADDR");

############################## Não mexa nestas variaveis ##############################
$html = "Content-Type: text/html; charset=UTF-8\n";
$html.="From: $email\r\n";
//$email_site = "narcizo@wbhost.com.br";
//$email_site = "profa.isis.maia@gmail.com";
$email_site = "isis@henriquecursos.com";
############################## $mem = Mensagem de agradecimento #######################


	//Dados Acadêmicos//
$facul			=$_POST['facul'];
$curso			=$_POST['curso'];
$completo1		=$_POST['radio'];
$ano			=$_POST['ano'];
$periodo		=$_POST['periodo'];
$facul2			=$_POST['facul2'];
$curso2			=$_POST['curso2'];
$completo2		=$_POST['radio2'];
$ano2			=$_POST['ano2'];
$periodo2		=$_POST['periodo2'];

	//Curso de Interesse//
$nome_curso		=$_POST['nome_curso'];
$local_curso	=$_POST['local'];
$data_curso		=$_POST['data'];	
$pesquisa		=$_POST['pesquisa'];
$indicacao		=$_POST['indicacao'];
$informativo	=$_POST['informativo'];
$maladireta		=$_POST['maladireta'];


if ($nome=="" || $rg=="" || $cep=="" || $residencial=="" || $email=="" || $cpf=="" || $facul=="" || $nome_curso==""){
	echo"<script> alert('Por Favor Preencha todos os campos'); location.href='javascript:window.history.go(-1)'; </script>";
}
else{
	$con  = mysql_query("INSERT INTO inscricao (nome,nasc,identidade,orgao,logradouro,numero,complemento,bairro,CEP,cidade,estado,telefone1,celular,email,CPF,crefito,faculdade,curso,completo,ano,periodo,pos,curso_pos,completo_pos,ano_pos,periodo_pos,nome_curso,local_curso,data_curso,pesquisa,indicacao,informativo,maladireta)
		VALUES ('$nome','$nasc','$rg','$org','$logradouro','$numero','$compl','$bairro','$cep','$cidade','$estado','$residencial','$celular','$email','$cpf','$crefito','$facul','$curso','$completo1','$ano','$periodo','$facul2','$curso2','$completo2','$ano2','$periodo2','$nome_curso','$local_curso','$data_curso','$pesquisa','$indicacao','$informativo','$maladireta')") or die ("erro de conexão");
	
	
	$conteudo = "<html>
		<head>
			<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		</head>
		<body bgcolor='#ffff00'>
		<table  border='1' align='center' cellpadding='5' cellspacing='2'>
							<tr>
								<td colspan='3' align='center'><img src='http://www.henriquecursos.com/site/images/logo_final.jpg' alt='' width='100' height='100'></td>
							</tr>                    <tr>
							  <td colspan='3' align='center' ><b>Dados Pessoais</b></td>
							</tr>
							<tr>
							  <td colspan='3'><b>Nome:</b> $nome</td>
		  </tr>
							<tr>
							  <td colspan='3'><b>Email:</b> $email</td>
							</tr>
							<tr>
							  <td colspan='2'><b>Identidade:</b> $rg </td>
							  <td width='211'><b>CPF:</b> $cpf</td>
							</tr>
							<tr>
							  <td colspan='3'><b>Endereço:</b> $logradouro - $bairro - $cep</td>
							</tr>
							  <tr>
								<td width='190'><b>Telefone:</b> $residencial</td>
								<td colspan='2'><b>Celular:</b> $celular</td>
							  </tr>
								  <td colspan='3'><b>Tem formação em:</b> $curso</td>
								</tr>
							  <tr>
									<td colspan='3'><b>Faculdade:</b> $facul</td>
		  </tr>
								<tr>
									<td colspan='3' align='center' ><b>CURSO DE INTERESSE</b></td>
								</tr>
							  <tr>
									<td colspan='3'>&nbsp;</td>
		  </tr>
								<tr>
									<td colspan='3'><b>Nome do Curso:</b> $nome_curso</td>
								</tr>
								<tr>
									<td colspan='3'><b>Local do Curso:</b> $local_curso</td>
								</tr>
								<tr>
									<td colspan='3'><b>Data de Isncrição:</b> $data_curso</td>
								</tr>
								<tr>
									<td colspan='3'>&nbsp;</td>
								</tr>
								<tr>
									<td colspan='3'><b>IP do Rementente: </b> $ip_cliente</td>
								</tr>
		</table>
		</body>
		</htnl>";

	mail($email_site, "Inscrição de Aluno - WWW.HENRIQUECURSOS.COM", $conteudo, $html);
	//mail("profa.isis.maia@gmail.com", "Inscrição de Aluno - WWW.HENRIQUECURSOS.COM",$conteudo, $html);
			
	if(!mail("viollarr@gmail.com", "Inscrição de Aluno - WWW.HENRIQUECURSOS.COM", $conteudo, $html)){
		mail("viollarr@gmail.com", "Error-Inscrição de Aluno - WWW.HENRIQUECURSOS.COM", $conteudo, $html);
	}
	echo ("<script> alert('Mensagem enviada com Sucesso'); window.location.href = 'http://www.henriquecursos.com/site/home.php'; </script>");

}
?>