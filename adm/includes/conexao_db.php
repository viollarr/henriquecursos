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
   mysql_select_db($db);


   

?>