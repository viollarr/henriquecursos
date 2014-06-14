<?
/*
   $host = 'localhost';
   $user = 'root';
   $pass = '';
   $db = 'test'; 
  */
  
  $host = "localhost";  // Endereço do servidor MySQL 
  $user = "henrique_henriqu";  // Seu Login no mySQL 
  $pass = "1q2w3e";  // Senha do MySql
  $db = "henrique_henrique";  // Nome do Banco de Dados 
    
   $cnx_id = mysql_connect($host, $user, $pass);
   mysql_select_db($db, $cnx_id);

$HOST_LOCAL=`hostname`;
$HOST_LOCAL=rtrim($HOST_LOCAL);

if (!$cnx_id)
{
 $ERRO="Erro constatado no BD:\n" . mysql_error($cnx_id) . "\n";
 
 $output=array();
 
 $return_var=0;
 
 print  "<br>Check por tabelas corruptas na '$db'<br>\n";
 
 exec  ("mysqlcheck -h $host -u $user  -p $pass $db");
 
 $assunto='Erro no BD '.$db;
 
 $mensagem_bd= $assunto . ":\n\n" . "Maquina : $HOST_LOCAL\n" . "Banco de dados em: $host\n" . "Arquivo: " . __FILE__ . "\nLinha: " . __LINE__ . "\n" . "$ERRO\n" . implode("\n",$output) . "\n\nreturn_var: $return_var";
 
 $sender="From: info@wb.com.br";
 
 $destinatario="universo@wb.com.br";
 
 mail($destinatario, $assunto, $mensagem_bd, $sender);
 
 die("<br>Connection failed<br>");

}


$a_nome          = "www.henriquecursos.com"; //nome que aparecerá como rementente
$a_email         = "isis@henriquecursos.com"; //e-mail que aparecerá como rementente
//$formato_msg     = "Content-type: text/html; charset=iso-8859-1\r\n"; //defina aqui o formato das mensagens enviadas
$formato_msg     = "text/html"; //defina aqui o formato das mensagens enviadas
$titulo          = "www.henriquecursos.com"; //titulo do seu site
$confirm_assunto = "Cadastro Newsletter em $titulo!"; //assunto da mensagem de confirmação para assinar/remover e-mails.
$url             = "http://www.henriquecursos.com"; //url do site
   

?>