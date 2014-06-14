<?
include_once('includes/tbs_class.php') ;
include "includes/bd.php";


$select = "SELECT * FROM henrique_mail WHERE henrique_0003 = '".$_SERVER['REMOTE_ADDR']."'";
$sql = mysql_query($select) or die ("Query: ".$select." : ".mysql_error());
$rows = mysql_num_rows($sql);

if ($rows > 0 ){

$up = "UPDATE henrique_mail SET henrique_0002 = now() WHERE henrique_0003 = '".$_SERVER['REMOTE_ADDR']."' ";
$update = mysql_query($up);
echo "<script>alert('HD identificado e IP identificado!');";
echo "location.href='http://www.henriquecursos.com/site/home.php'</script>";
}
else{

$TBS = new clsTinyButStrong ;
$TBS->LoadTemplate('site/index.html');

// Regras de Validação...a
	
	$msg_atualiza = 'Clique a tecla F5 do seu teclado para visualizar as atualizações';
	  $x_AC = "AC";
	  $x_AL = "AL";
	  $x_AM = "AM";
	  $x_AP = "AP";
	  $x_BA = "BA";
	  $x_CE = "CE";
	  $x_DF = "DF";
	  $x_ES = "ES";
	  $x_GO = "GO";
	  $x_MA = "MA";
	  $x_MG = "MG";
	  $x_MS = "MS";
	  $x_MT = "MT";
	  $x_PA = "PA";
	  $x_PB = "PB";
	  $x_PE = "PE";
	  $x_PI = "PI";
	  $x_PR = "PR";
	  $x_RJ = "RJ";
	  $x_RN = "RN";
	  $x_RO = "RO";
	  $x_RR = "RR";
	  $x_RS = "RS";
	  $x_SC = "SC";
	  $x_SE = "SE";
	  $x_SP = "SP";
	  $x_TO = "TO";
	$fumante = "AMBIENTE 100% NÃO FUMANTE";

	
if (!isset($_POST)) $_POST=&$HTTP_POST_VARS ;

if (!isset($_POST['x_name']) and !isset($_POST['x_uf']))
 {
  $x_name = '' ;
  $msg_text = '' ;
  $x_uf = '';
  $msg_color = '#0099CC' ; //blue
 }
else 
 {
  $msg_text = '' ;
  $x_name = strtolower($_POST['x_name']);
  $x_uf = $_POST['x_uf'];
  $ip_name = getenv("REMOTE_ADDR");

	
  if (eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-z]{2,3}$", $x_name) and ($x_uf != '' and $x_uf != 'UF'))
    // (ereg("^([0-9,a-z,A-Z]+)([.,_]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$", $x_name))
   {
    $msg_text = '';
   }
  else
   {
    $msg_text = 'E-mail inválido ou Estado não selecionado ...';
   }

 if ($msg_text=='') 
  {
  
   // Grava o e-mail de quem tá acessando o site em uma base de dados.

    include "includes/bd.php";  
   
   $wb_sql = mysql_query("INSERT INTO henrique_mail(henrique_0001, henrique_0002, henrique_0003, henrique_0004)
                                     VALUES ('$x_name', now(), '$ip_name', '$x_uf')", $wb_id)
                                     or die ("Erro no comando SQL:".mysql_error());
  
   
   

   // Envia e-mail com o e-mail de quem tá acessasndo o site
   
   //$html = "Content-Type: text/html; charset=iso-8859-1\n";
   //$html.= "From: Henrique <linfoterapeutamaia@yahoo.com.br>\r\n";
   $html = "From: <$x_name>\n";
   $html.= "Reply-To: $x_name\n";
   $html.= "Return-Path: $x_name\n";
   $html.= "MIME-Version: 1.0\n";
   $html.= "X-Priority: 1\n";
   $html.= "Content-type: text/html; charset=iso-8859-1\n";	
   
   //$email_site = "narcizo@wbhost.com.br";
   $email_site = "isis@henriquecursos.com";
   $assunto = "Acessou o site www.henriquecursos.com no dia: ".date("j\/n\/Y")." às ".date("H:i:s")." pelo IP: ".$ip_name.", situado no estado do ".$x_uf;

   //mail($email_site, $assunto, "Assunto: $assunto", "E-mail: $x_name", $html);
 mail ("$email_site",                       //email aonde o php vai enviar os dados do form
      "Acesso ao site www.henriquecursos.com",
      "\r\n $x_name\r\n$assunto",
      $html,"-f$x_name"
     );
   // Fim do Envio do e-mail
  
   // Grava o email e manda para o banco de newsleter do site n_emails
include("site/conexao_db.php");
   $email = $x_name;
   $codigo = md5($email);

if($email == ""){
echo "<script>alert('Preencha corretamente o campo de e-mail!');";
echo "location.href='http://www.henriquecursos.com/index.php'</script>";
}
else {
$sql = mysql_query("SELECT * FROM n_emails WHERE email = '$email'");
 if(mysql_num_rows($sql)==1){
echo "<script>alert('HD identificado e IP identificado!');";
echo "location.href='http://www.henriquecursos.com/site/home.php'</script>";
 } 
 else{
 	if (ereg("@",$email)){
 $codigo = sha1($codigo);
 mysql_query("INSERT INTO n_emails(id,email,codigo,ativo) VALUES
 ('','$email','$codigo','s')") or die(mysql_error());
 $cabecalho  = "From: <$email_site>\n\r";
 $cabecalho .= "Reply-To: $email_site\n\r";
 $cabecalho .= "Return-Path: $email_site\n\r";
 $cabecalho .= "MIME-Version: 1.0\n\r";
 $cabecalho .= "X-Priority: 1\n\r";
 $cabecalho .= "Content-type: text/html; charset=iso-8859-1\n\r";	
 $msg = "<font face=Arial size=2>";
 $msg .= "Olá <b>$email</b>,";
 $msg .= "<br><br>";
 $msg .= "Você está recebendo esta mensagem porque você se cadastrou";
 $msg .= " na lista do site <a href='$url' target=_blank><b>$titulo</b></a><br><br>";
 $msg .= "</font>";
 mail($email,$confirm_assunto,$msg,$cabecalho,"-f$email_site");
 }
}
}
 
   // Redireciona a pessoa para próxima página..

   header("Location: http://www.henriquecursos.com/site/home.php");

  }
 else
  {
   $msg_color = '#990000' ; //red
  }
}
$TBS->Show() ;
}

?>

