<?php
	
	session_start();
	

	//Verifica se há dados ativos na sessão
	if(empty($_SESSION["sativo"]))
	{ 		
		header("Location:index.php");
		
	}else
	{
		echo '<a href="sair.php">Sair</a>';
	}
?>