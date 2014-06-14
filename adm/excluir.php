<?
include_once('includes/conexao_db.php');


$id = $_GET['id'];
$tipo_id = $_GET['tipo_id'];



$sql = "DELETE FROM calendario WHERE id='$id' LIMIT 1";

mysql_query($sql);




header("location:lista_calendario.php?id=$tipo_id");






?>