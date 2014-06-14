<?

$tipo_curso = $_POST['radio'];
$nome 		= $_POST['nome'];
$email 		= $_POST['email'];

$email_spa = "henrique@cybernet.com.br";

#e-mail do site############################## Não mexa nestas variaveis ##############################
$html = "Content-Type: text/html; charset=iso-8859-1\n";
$html.="From: $nome <isis@henriquecursos.com>\r\n";
##################################### $mem = Mensagem de agradecimento ################################

	
			if ($email == "" || $nome == "") 
		 
			  echo ("<script> alert('Por Favor Preencha todos os campos');
					location.href='javascript:window.history.go(-1)'; </script>");
		
					
     else {	 	if(ereg("@",$email)) 
	 {
			mail($email_spa, "Reserva - Curso de Técnicas de SPA", "	<table width='100%' border='0' cellpadding='5' cellspacing='2' bgcolor='#FFFF00'>
	 	<tr>
			<td>
				<div align='left' bgcolor='#0000CC'><b>Contato pelo site</b> www.henriquecursos.com</div>
			</td>
		</tr>
		<tr>
			<td>
				<div align='left' bgcolor='#0000CC'><b>Modelo de curso:</b> $tipo_curso</div> 
			</td>
		</td>	
		<tr>
			<td>
				<div align='left' bgcolor='#0000CC'><b>Nome:</b> $nome</div>	
			</td>
		</tr>
		<tr>
			<td>
				<div align='left' bgcolor='#0000CC'><b>E-mail:</b> $email</div>
			</td>
		</tr>
	</table>", $html);
	

echo ("<script> alert('Mensagem enviada com Sucesso'); window.location.href = 'http://www.henriquecursos.com/site/home.php'; </script>");

}

else{echo ("<script> alert ('Preencha um e-mail correto'); location.href='javascript:window.history.go(-1)'; </script>");

}

}

?>	