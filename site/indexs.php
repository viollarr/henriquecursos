<?
include_once('includes/tbs_class.php') ;

$TBS = new clsTinyButStrong ;
$TBS->LoadTemplate('templates/index.html');

// Regras de Valida��o...a

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
    $msg_text = 'e-mail inv�lido...';
   }

 if ($msg_text=='') 
  {
   // Grava o e-mail de quem t� acessando o site em uma base de dados.
   
   include "includes/bd.php";
   
   $wb_sql = mysql_query("INSERT INTO henrique_mail(henrique_0001, henrique_0002, henrique_0003)
                                     VALUES ('$x_name', now(), '$ip_name')", $wb_id)
                                     or die ("Erro no comando SQL:".mysql_error());
  
   
   

   // Envia e-mail com o e-mail de quem t� acessasndo o site
   
   $html = "Content-Type: text/html; charset=iso-8859-1\n";
   $html.= "From: victor <viollarr@hotmail.com\r\n";
   $email_site = "viollarr@gmail.com";
   $assunto = "Acesso em: ".date("j\/n\/Y")." �s ".date("H:i:s")." pelo IP: ".$ip_name;

   mail($email_site, $assunto, "E-mail: $x_name", $html);
 
   // Fim do Envio do e-mail
   
   // Redireciona a pessoa para pr�xima p�gina..

   header("Location: http://www.henriquecursos.com/templates/pg_home.html");

  }
 else
  {
   $msg_color = '#990000' ; //red
  }
}

$TBS->Show() ;

?>

