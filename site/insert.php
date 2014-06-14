<?php
include "conexao_db.php";

$foto = $_FILES['foto']['name'];
$descricao = $_POST['descricao'];

if ($foto != ""){
	if($descricao != ""){
		$caminho_dir = "images/$foto";
		$status = move_uploaded_file($_FILES['foto']['tmp_name'],"images/$foto");
		$alter = "INSERT INTO galeria (foto, descricao, exibir) VALUES ('$caminho_dir','$descricao', 1)";
		$sql = mysql_query($alter) or die (mysql_error());
		echo "<center>";
		echo "Foto cadastrada com sucesso!<br>";
		echo "<a href='home.php'>HOME</a><br>";
		echo "<a href='galeria.php'>GALERIA</a>";
		echo "</center>";
	}
	else {
	echo "<script> alert('Preencha com o texto da foto!');location.href='javascript:window.history.go(-1)'; </script>";
	}
}
else{
echo "<script> alert('Escolha a foto a ser enviada!');location.href='javascript:window.history.go(-1)'; </script>";
}
?>