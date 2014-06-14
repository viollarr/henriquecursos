<?
include_once('includes/tbs_class.php') ;



$TBS = new clsTinyButStrong ;
$TBS->LoadTemplate('site/index.html');

// Regras de Validação...a

if (!isset($_POST)) $_POST=&$HTTP_POST_VARS ;

if (!isset($_POST['x_name']))
 {
  $x_name = '' ;
  $msg_text = '' ;
  $msg_color = '#0099CC' ; //blue
 }
else 
 {
  $msg_text = '' ;
  $x_name = strtolower($_POST['x_name']);
  $ip_name = getenv("REMOTE_ADDR");

  if (eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-z]{2,3}$", $x_name))
    // (ereg("^([0-9,a-z,A-Z]+)([.,_]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$", $x_name))
   {
    $msg_text = '';
   }
  else
   {
    $msg_text = 'e-mail inválido...';
   }

 if ($msg_text=='') 
  {
   // Grava o email e manda para o banco de newsleter do site n_emails
include("conexao_db.php");
   $email = $x_name;
   $codigo = md5($email);
   $codigo = sha1($codigo);

    mysql_query("INSERT INTO n_emails(id,email,codigo,ativo) VALUES
		 ('','$email','$codigo','s')") or die(mysql_error());
		 $cabecalho  = "From: $a_email";
		 $cabecalho .= "\nContent-Type: Text/HTML";
		 $msg = "<font face=Arial size=2>";
		 $msg .= "Olá <b>$email</b>,";
		 $msg .= "<br><br>";
		 $msg .= "Você está recebendo esta mensagem porque você se cadastrou";
		 $msg .= " na lista do site <a href='$url' target=_blank><b>$titulo</b></a><br><br>";
		 $msg .= "</font>";
		 mail($email,$confirm_assunto,$msg,$cabecalho);

   // Grava o e-mail de quem tá acessando o site em uma base de dados.

    include "includes/bd.php";  
   
   $wb_sql = mysql_query("INSERT INTO henrique_mail(henrique_0001, henrique_0002, henrique_0003)
                                     VALUES ('$x_name', now(), '$ip_name')", $wb_id)
                                     or die ("Erro no comando SQL:".mysql_error());
  
   
   

   // Envia e-mail com o e-mail de quem tá acessasndo o site
   
   //$html = "Content-Type: text/html; charset=iso-8859-1\n";
   //$html.= "From: Henrique <linfoterapeutamaia@yahoo.com.br>\r\n";
   $html.= "$x_name";
   
   //$email_site = "narcizo@wbhost.com.br";
   //$email_site = "henriquecursos@cybernet.com.br";
   $email_site = "profa.isis.maia@gmail.com";
   $assunto = "Acessou o site www.henriquecursos.com no dia: ".date("j\/n\/Y")." às ".date("H:i:s")." pelo IP: ".$ip_name;

   //mail($email_site, $assunto, "Assunto: $assunto", "E-mail: $x_name", $html);
 mail ("$email_site",                       //email aonde o php vai enviar os dados do form
      "Acesso ao site www.henriquecursos.com",
      "\n $x_name\n$assunto",
      "From: $html"
     );
   // Fim do Envio do e-mail
   
   // Redireciona a pessoa para próxima página..

   header("Location: http://www.henriquecursos.com/site/home.php");

  }
 else
  {
   $msg_color = '#990000' ; //red
  }
}

$TBS->Show() ;

?>

