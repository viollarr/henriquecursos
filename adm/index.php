<?php

session_start();

if ( !isset( $_POST['submit'] ) )
	{
		if(empty($_SESSION["sativo"]))
		{
		echo '<form action="index.php" method="post">';
		echo 'Login: <input type="text" name="login" size="10" maxlength="10"><br>';
		echo 'Senha: <input type="password" name="senha" size="10" maxlength="10"><br><br>';
		echo '<input type="submit" name="submit">';
		echo '</form>';
		}
	}else
	{
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		
		if($login=="hemz1x2c3" && $senha=="henrique")
		{
				session_start();
				$_SESSION["sativo"] = true;
				
				
		}else
		{
		   header("Location:index.php");
		}
	}
	
if($_SESSION["sativo"]){

include_once('includes/tbs_class.php') ;
include_once('includes/conexao_db.php') ;

$TBS = new clsTinyButStrong ;
$TBS->LoadTemplate('html/index.htm') ;
$TBS->MergeBlock('bloco1',$cnx_id,'SELECT * FROM cursos ORDER BY nome ASC') ; 
$TBS->Show() ; 
}

?> 
