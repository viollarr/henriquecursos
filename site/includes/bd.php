<? 
// Conexão a base de dados
// Por: Romulo Cordeiro - WB Internet

  $wb_db_host = "localhost";  // Endereço do servidor MySQL 
  $wb_db_user = "henrique_henriqu";  // Seu Login no mySQL 
  $wb_db_pass = "1q2w3e";  // Senha do MySql
  $wb_db_name = "henrique_henrique";  // Nome do Banco de Dados


  $wb_db_err1 = "Não foi possível estabelecer uma conexão com o gerenciador MySQL.<br>Favor aguarde alguns instantes e tente novamente.";
  $wb_db_err2 = "Não foi possível selecionar a Base de Dados.";

  // Conectando ao servidor MySQL
     if(!($wb_id = mysql_connect($wb_db_host, $wb_db_user, $wb_db_pass))) 
      {
       echo $wb_db_err1;
       exit;
      }

  // Selecionando o Banco de Dados
     if(!($wb_con=mysql_select_db($wb_db_name,$wb_id))) 
      {
       echo $wb_db_err2;
       exit;
      }
?>